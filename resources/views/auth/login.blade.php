@extends("layouts.master")

@section('title')
Login

@endsection

@section('content')

<h4 class="">Student Login</h4>
@if (session("message"))
<div class=" alert alert-success">
    {{session("message")}}
</div>
@endif
<form action="{{route("auth.check")}}" method="POST">
    @csrf

    <div class=" mb-3">
        <label for="" class=" form-label">Email</label>
        <input value="{{old("email")}}" type="email" name="email"
            class=" form-control @error('email')
        is-invalid
        @enderror">
        @error('email')
            <div class=" invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class=" mb-3">
        <label for="" class=" form-label">Password</label>
        <input value="{{old("password")}}" type="password" name="password"
            class=" form-control @error('password')
        is-invalid
        @enderror">
        @error('password')
            <div class=" invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <button class=" btn btn-primary">Login</button>
        <a href="{{route("auth.forgot")}}" class=" btn btn-link">Forgot Password?</a>
    </div>
</form>

@endsection
