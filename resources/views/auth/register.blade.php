@extends("layouts.master")

@section('title')
Register

@endsection

@section('content')

<h4 class="">Student Register</h4>
<form action="{{route("auth.store")}}" method="POST">
    @csrf
    <div class=" mb-3">
        <label for="" class=" form-label">Your Name</label>
        <input value="{{old("name")}}" type="text" name="name"
            class=" form-control @error('name')
        is-invalid
        @enderror">
        @error('name')
            <div class=" invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
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
        <input  type="password" name="password"
            class=" form-control @error('password')
        is-invalid
        @enderror">
        @error('password')
            <div class=" invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class=" mb-3">
        <label for="" class=" form-label">Confirm Password</label>
        <input  type="password" name="password_confirmation"
            class=" form-control @error('password_confirmation')
        is-invalid
        @enderror">
        @error('password_confirmation')
            <div class=" invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <button class=" btn btn-primary">Register</button>
    </div>
</form>

@endsection
