@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-header my-4 pb-4 text-center judul">{{ __('Data Diri Pengguna') }}</div>
    <div class="card ">
        <div class="card-body mt-5 px-5">
            <form method="POST" action="">
                @csrf
                <div class="">
                    <label for="nama" class="">{{ __('Nama') }}</label>

                    <div class="">
                        <input id="nama" type="nama" class="form-control" name="nama" required autofocus>
                    </div>
                </div>
                <div class="">
                    <label for="email" class="">{{ __('Email Address') }}</label>

                    <div class="">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="mt-5">
                    <button type="submit" class="btn  btn-login">
                        {{ __('Lanjut Diagnosa') }}
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection