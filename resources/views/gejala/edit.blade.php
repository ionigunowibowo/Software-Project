@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col col-lg-6 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Edit Gejala</h3>
                    <div class="card-tools">
                        <a href="{{ route('gejala.index') }}" class="btn btn-sm btn-danger">
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
                    <form action="{{ route('gejala.update', $itemgejala->id) }}" method="post">
                        @csrf
                        {{ method_field('patch') }}
                        <div class="form-group">
                            <label for="id">Id</label>
                            <input type="text" name="id" id="id" class="form-control" value={{ $itemgejala->id }}>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Gejala</label>
                            <input type="text" name="nama" id="nama" class="form-control" value={{ $itemgejala->nama }}>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection