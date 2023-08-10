<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function create(){
        return view("inventory.create");
    }

    public function index(){
        // $items = new Item();
        // $all = $items->all();
        // return $all;

        return view("inventory.index",["items"=> Item::all()]);
    }

    public function show($id){
        // $item = Item::findOrFail($id);

        // if(is_null($item)){
        //     return abort(404);
        // }

        return view("inventory.show",["item" => Item::findOrFail($id)]);
        // return view("inventory.show",compact("item"));
    }

    public function edit($id){
        return view("inventory.edit",["item" => Item::findOrFail($id)]);

    }

    public function update($id,Request $request)
    {
        $item = Item::findOrFail($id);
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->update();
        return redirect()->route("item.index");
    }

    public function store(Request $request){
        //First Way
        $item = new Item();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;

        $item->save();

        //Second Way
        // $item = Item::create([
        //     "name" => $request->name,
        //     "price" => $request->price,
        //     "stock" => $request->stock
        // ]);

        //Third Way
        // $item = Item::create($request->all());

        //Fourth Way
        // $item = Item::insert([
        //     "name" => $request->name,
        //     "price" => $request->price,
        //     "stock" => $request->stock
        // ]);

        // return $item;
        return redirect()->route("item.index");
    }

    public function destroy($id){
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->back();
    }




}
