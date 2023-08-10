@extends('layouts.master')

@section('title')
    Edit Item
@endsection

@section('content')
    <h4 class="">Edit Item</h4>

    <form action="{{ route('item.update', $item->id) }}" method="POST">

        @csrf
        @method('put')

        <div class=" mb-3">
            <label for="" class=" form-label">Item Name</label>
            <input type="text" value="{{ old("name",$item->name) }}" name="name"
                class=" form-control @error('name')
            is-invalid
        @enderror">
            @error('name')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class=" mb-3">
            <label for="" class=" form-label">Item Price</label>
            <input type="number" value="{{ old("price",$item->price) }}" name="price"
                class=" form-control @error('price')
        is-invalid
    @enderror">
            @error('price')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class=" mb-3">
            <label for="" class=" form-label">Stock</label>
            <input type="number" value="{{ old("stock",$item->stock) }}" name="stock"
                class=" form-control @error('stock')
        is-invalid
    @enderror">
            @error('stock')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button class=" btn btn-primary">Update Item</button>
    </form>
@endsection
