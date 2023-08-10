@extends("layouts.master")

@section('title')
Category List

@endsection

@section('content')

<h4 class="">Category List
</h4>
<table class=" table table-bordered">
    <thead>
        <tr>
            <th>
                #
            </th>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->title}}</td>
                <td>{{ Str::limit($category->description, 50, '...') }}</td>
                <td>
                    <a href="{{route("category.show",$category->id)}}" class=" btn btn-warning">Detail</a>
                    <form class=" d-inline-block" action="{{route("category.destroy",$category->id )}}" method="POST">
                        @csrf
                        @method("delete")
                        <button class=" btn btn-danger">Del</button>
                    </form>
                    <a href="{{route("category.edit",$category->id)}}" class=" btn btn-primary">Edit</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class=" text-center">
                    There is no record <br>
                    <a href="{{route("category.create")}}" class=" btn btn-primary">Create</a>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection
