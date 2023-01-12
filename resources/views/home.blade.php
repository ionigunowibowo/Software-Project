@extends('layouts.app')

@section('content')
<!-- bawaan auth -->
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- home -->
<div class="row home">
    <div class="col-lg-6">
        <h1 class="h1">Selamat Datang, di Aplikasi Sistem Pakar Diagnosa Kerusakan pada Motor Honda Scoopy ESP</h1>
        <a class="btn btn-dark tombol" href="{{ url('diagnosa') }}">Mulai Diagnosa</a>
    </div>
    <div class="col-lg-6">
        <img class="my-auto scoopy" src="assets/images/scoopy.png" alt="">
    </div>

</div>
@endsection