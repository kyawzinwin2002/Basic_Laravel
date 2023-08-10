<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $items = Item::where("price",">",900)->orWhere("stock","<",10)->get();
        // dd($items);
        // $items = Item::all();
        // return $items->avg("price");
        $items = Item::when(request()->has("keyword"),function($query){
            $keyword = request()->keyword;
            $query->where("name","like","%$keyword%");
            $query->orWhere("price","like","%$keyword%");
            $query->orWhere("stock","like","%$keyword%");
        })->when(request()->has("sort"),function($query){
            $sort = request()->sort ?? "asc";
            $query->orderBy("name",$sort);
        })->paginate(7)->withQueryString();

        return view("inventory.index",compact("items"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("inventory.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        $item = new Item();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;

        $item->save();
        return redirect()->route("item.index")->with("status","New Item Created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view("inventory.show",compact("item"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view("inventory.edit",compact("item"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->update();
        return redirect()->route("item.index")->with("status"," Item Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->back()->with("status"," Item Deleted Successfully");
    }
}
