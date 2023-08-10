@extends("layouts.master")

@section('title')
Edit Category

@endsection

@section('content')

<h4 class="">Edit Category</h4>

<form action="{{route("category.update",$category->id)}}" method="POST">

    @csrf
    @method("put")

    <div class=" mb-3">
        <label for="" class=" form-label" >Category Title</label>
        <input type="text" value="{{$category->title}}" name="title" class=" form-control">
    </div>
    <div class=" mb-3">
        <label for="" class=" form-label" >Category Description</label>
        <textarea name="description" id="" class="form-control"  rows="5"></textarea>
    </div>

    <button class=" btn btn-primary">Update Category</button>
</form>

@endsection
