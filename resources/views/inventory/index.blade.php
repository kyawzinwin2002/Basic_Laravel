@extends('layouts.master')

@section('title')
    Item List
@endsection

@section('content')
    <h4 class="">Item List
    </h4>
    <div class="row justify-content-between my-3">
        <div class=" col-3">
            <a href="{{ route('item.create') }}" class=" btn btn-outline-primary">Create</a>
        </div>
        <div class="col-5">
            <form action="{{ route('item.index') }}" method="GET">
                <div class=" input-group">
                    <input value="@if (request()->has('keyword')) {{ request()->keyword }} @endif" type="text"
                        name="keyword" class=" form-control">
                    @if (request()->has('keyword'))
                        <a href="{{ route('item.index') }}" class=" btn btn-danger">Clear</a>
                    @endif
                    <button class=" btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div>
    @if (session('status'))
        <div class=" alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <table class=" table table-bordered">
        <thead>
            <tr>
                <th>
                    #
                </th>
                <th>Name
                    <div class="">
                        <a href="{{route("item.index",["sort" => "asc"])}}" class=" btn btn-sm btn-outline-primary">ASC</a>
                        <a href="{{route("item.index",["sort" => "desc"])}}" class=" btn btn-sm btn-outline-primary">DESC</a>
                        <a href="{{route("item.index")}}" class=" btn btn-sm btn-outline-danger">Clear</a>
                    </div>
                </th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>
                        <a href="{{ route('item.show', $item->id) }}" class=" btn btn-warning">Detail</a>
                        <form class=" d-inline-block" action="{{ route('item.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class=" btn btn-danger">Del</button>
                        </form>
                        <a href="{{ route('item.edit', $item->id) }}" class=" btn btn-primary">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class=" text-center">
                        There is no record <br>
                        <a href="{{ route('item.create') }}" class=" btn btn-primary">Create</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $items->onEachSide(2)->links() }}
@endsection
