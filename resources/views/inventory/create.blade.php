@extends('layouts.master')

@section('title')
    Create Item
@endsection

@section('content')
    <h4 class="">Create Item</h4>

    {{-- @if ($errors->any())
        <ul class=" text-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif --}}

    <form action="{{ route('item.store') }}" method="POST">

        @csrf

        <div class=" mb-3">
            <label for="" class=" form-label">Item Name</label>
            <input value="{{old("name")}}" type="text" name="name"
                class=" form-control @error('name')
            is-invalid
            @enderror">
            @error('name')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class=" mb-3">
            <label for="" class=" form-label">Item Price</label>
            <input value="{{old("price")}}" type="number" name="price"
                class=" form-control @error('price')
            is-invalid
            @enderror">
            @error('price')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class=" mb-3">
            <label for="" class=" form-label">Stock</label>
            <input value="{{old("stock")}}" type="number" name="stock"
                class=" form-control @error('stock')
            is-invalid
            @enderror">
            @error('stock')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button class=" btn btn-primary">Save Item</button>
    </form>
@endsection
