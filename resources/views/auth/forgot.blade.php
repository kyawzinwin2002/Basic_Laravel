@extends("layouts.master")

@section('title')
Forgot Password

@endsection

@section('content')

<h4 class="">Forgot Password</h4>

<form action="{{route("auth.checkEmail")}}" method="POST">
    @csrf
    <div class=" mb-3">
        <label for="" class=" form-label">Enter Your Email</label>
        <input  type="email" name="email"
            class=" form-control @error('email')
        is-invalid
        @enderror">
        @error('email')
            <div class=" invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <button class=" btn btn-primary">Reset</button>
    </div>
</form>

@endsection
