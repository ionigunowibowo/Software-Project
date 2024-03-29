@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col col-lg-6 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Kerusakan</h3>
                    <div class="card-tools">
                        <a href="{{ route('kerusakan.index') }}" class="btn btn-sm btn-danger">
                            Tutup
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                    <div class="alert alert-warning">{{ $error }}</div>
                    @endforeach
                    @endif
                    @if ($message = Session::get('error'))
                    <div class="alert alert-warning">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <form action="{{ route('kerusakan.store') }}" method='POST'>
                        @csrf
                        <!-- <div class="form-group">
                            <label for="kode_kerusakan">Kode Kerusakan</label>
                            <input type="text" name="kode_kerusakan" id="kode_kerusakan" class="form-control">
                        </div> -->
                        <div class="form-group">
                            <label for="nama">Nama Kerusakan</label>
                            <input type="text" name="nama" id="nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="penyebab">Penyebab</label>
                            <input type="text" name="penyebab" id="penyebab" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="solusi">Solusi</label>
                            <input type="text" name="solusi" id="solusi" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection