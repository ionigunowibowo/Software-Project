@extends('layouts.dashboard')

@section('content')
<div class="flex-wrap flex-md-nowrap mt-3 pt-3 pb-2 mb-3 text-center">
    <h1 class="">Dashboard</h1>
</div>

<div class="">
    <h4>Hai, {{ Auth::user()->name }}</h4>

    <div class="row justify-content-center">
        <div class="col-md-2"><a href="/admin/riwayat"><span data-feather="clock" class="align-text-bottom"></span>Riwayat</a> </div>
        <div class="col-md-2"><a href="{{ route('gejala.index') }}"><span data-feather="file" class="align-text-bottom"></span>Data Gejala</a> </div>
        <div class="col-md-2"><a href="{{ route('kerusakan.index') }}"><span data-feather="file" class="align-text-bottom"></span>Data Kerusakan</a> </div>
    </div>
</div>
@endsection