<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Rules\CheckPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(Request $request){
        $request->validate([
            "name" => "required|min:4",
            "email" => "required|email|unique:students,email",
            "password" => "required|min:8|confirmed",
        ]);

        $verify_code = rand(100000,999999);
        //mailing step
        logger("Your verify code is".$verify_code);

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
        $student->verify_code = $verify_code;
        $student->user_token = md5($verify_code);
        $student->api_token = md5(rand(100000,999999));
        $student->save();
        return response()->json(["message" => "Register Successfully"]);
    }

    public function login(Request $request){
        $request->validate([
            "email" => "required|email|exists:students,email",
            "password" => ["required","min:8",new CheckPassword],
        ],["email.exists" => "Email or Password is invalid"]);

        $student = Student::where("email",$request->email)->first();

        return response()->json([
            "message" => "Login Successfully",
            "info" => $student,
            "api_token" => $student->api_token]);
    }

    public function logout()
    {
        $student = Student::find(session("auth")->id);
        $student->api_token = md5(rand(100000,999999));
        $student->update();
        
        session()->forget("auth");
        return response()->json(["message" => "Logout Successfully"]);
    }
}
