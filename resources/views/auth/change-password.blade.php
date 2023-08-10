@extends("layouts.master")

@section('title')
Change Password

@endsection

@section('content')

<h4 class="">Change Password</h4>

<form action="{{route("auth.passwordChanging")}}" method="POST">
    @csrf
    <div class=" mb-3">
        <label for="" class=" form-label">Old Password</label>
        <input  type="password" name="current_password"
            class=" form-control @error('current_password')
        is-invalid
        @enderror">
        @error('current_password')
            <div class=" invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class=" mb-3">
        <label for="" class=" form-label">New Password</label>
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
        <button class=" btn btn-primary">Change</button>
    </div>
</form>

@endsection
