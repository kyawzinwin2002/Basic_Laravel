@extends("layouts.master")

@section('title')
New Password

@endsection

@section('content')

<h4 class="">New Password</h4>

<form action="{{route("auth.resetPassword")}}" method="POST">
    @csrf
    <input type="hidden" name="user_token" value="{{$user_token}}" id="">
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
        <button class=" btn btn-primary">Reset Password</button>
    </div>
</form>

@endsection
