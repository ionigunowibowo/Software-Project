@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading my-4 pb-4 text-center judul">{{ __('Gejala') }}</div>
        <div class="panel-body mt-5 px-5">
            <form method="POST" action="">
                @csrf
                <input type="hidden" name="pasien_id" value="{{ $pasien_id }}">
                <div class="form-group">
                    <label>Gejala-gejala yang dialami pada motor anda :</label>
                    <div class="">
                        @foreach ($gejala as $gejala)
                        <div class="checkbox">
                            <label><input class="check" type="checkbox" name="gejala[]" value="{{ $gejala->id }}">{{ $gejala->nama }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary pull-right">Cek Hasil Diagnonsa</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection