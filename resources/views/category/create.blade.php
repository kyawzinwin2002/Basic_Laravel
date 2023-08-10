@extends("layouts.master")

@section('title')
Create Category

@endsection

@section('content')

<h4 class="">Create Category</h4>

<form action="{{route("category.store")}}" method="POST">

    @csrf

    <div class=" mb-3">
        <label for="" class=" form-label" >Category Title</label>
        <input  type="text" name="title" class=" form-control @error("title")
         is-invalid
        @enderror">
        @error('title')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
    </div>
    <div class=" mb-3">
        <label for="" class=" form-label" >Description</label>
        <textarea name="description" id="" class=" form-control @error("description")
         is-invalid
        @enderror"  rows="5"></textarea>
        @error('description')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
    </div>

    <button class=" btn btn-primary">Save Category</button>
</form>

@endsection
