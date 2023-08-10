@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <h4 class="">Dashboard</h4>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aut fugiat iste quisquam expedita deserunt, impedit
        repudiandae eum reiciendis itaque fugit pariatur rerum eius sequi autem a ad. Quibusdam, corporis necessitatibus?
    </p>
    <div class="alert alert-info">
        {{ session('auth')->name }}
    </div>

    <form action="{{ route('auth.logout') }}" method="POST">
        @csrf
        <button class=" btn btn-danger">Logout</button>
    </form>
@endsection
