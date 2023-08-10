@extends("layouts.master")

@section('title')
Item Detail

@endsection

@section('content')

<h4 class="">Item Detail
</h4>

<table class=" table table-bordered">
    <tr>
        <td>Name</td>
        <td>{{$item->name}}</td>
    </tr>
    <tr>
        <td>Price</td>
        <td>{{$item->price}}</td>
    </tr>
    <tr>
        <td>Stock</td>
        <td>{{$item->stock}}</td>
    </tr>
    <tr>
        <td>Created_at</td>
        <td>{{$item->created_at}}</td>
    </tr>
    <tr>
        <td>Updated_at</td>
        <td>{{$item->updated_at}}</td>
    </tr>
</table>




@endsection
