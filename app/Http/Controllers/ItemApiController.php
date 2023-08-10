<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemApiController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::when(request()->has("keyword"), function ($query) {
            $keyword = request()->keyword;
            $query->where("name", "like", "%$keyword%");
            $query->orWhere("price", "like", "%$keyword%");
            $query->orWhere("stock", "like", "%$keyword%");
        })->when(request()->has("sort"), function ($query) {
            $sort = request()->sort ?? "asc";
            $query->orderBy("name", $sort);
        })->paginate(7)->withQueryString();
        return ItemResource::collection($items);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "price" => "required",
            "stock" => "required"
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(),422);
        }
        $item = Item::create([
            "name" => $request->name,
            "price" => $request->price,
            "stock" => $request->stock
        ]);
        return new ItemResource($item);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Item::find($id);
        if (is_null($item)) {
            return response()->json(["message" => "Item Not Found"], 404);
        }
        return new ItemResource($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "price" => "required",
            "stock" => "required"
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(),422);
        }
        $item = Item::find($id);
        if (is_null($item)) {
            return response()->json(["message" => "Item Not Found"], 404);
        }
        $item->update([
            "name" => $request->name,
            "price" => $request->price,
            "stock" => $request->stock
        ]);
        return new ItemResource($item);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Item::find($id);
        if (is_null($item)) {
            return response()->json(["message" => "Item Not Found"], 404);
        }
        $item->delete();
        return response()->json(["message" => "Item Deleted Successfully"],204);
    }
}
