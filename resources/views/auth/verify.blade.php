@extends("layouts.master")

@section('title')
Verify

@endsection

@section('content')

<h4 class="">Verify</h4>

<form action="{{route("auth.verifying")}}" method="POST">
    @csrf
    <div class=" mb-3">
        <label for="" class=" form-label">Verify Code</label>
        <input  type="number" name="verify_code"
            class=" form-control @error('verify_code')
        is-invalid
        @enderror">
        @error('verify_code')
            <div class=" invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <button class=" btn btn-primary">Account Verify</button>
    </div>
</form>

@endsection
