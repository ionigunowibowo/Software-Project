@extends('layouts.dashboard')

@section('content')
<div class="flex-wrap flex-md-nowrap mt-3 pt-3 pb-2 mb-3 border-bottom text-center">
    <h1 class="">Data Gejala</h1>
</div>
<a href="{{ route('gejala.create') }}" class="btn btn-sm btn-danger my-3">tambah gejala</a>
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
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($itemgejala as $gejala)
            <tr>
                <td>
                    {{ $gejala->id }}
                </td>
                <td>
                    {{ $gejala->nama }}
                </td>
                <td><a href="{{ route('gejala.edit', $gejala->id) }}" class="btn btn-sm btn-primary mr-2 mb-2">
                        Edit
                    </a>
                    <form action="{{ route('gejala.destroy', $gejala->id) }}" method="post" style="display:inline;">
                        @csrf
                        {{ method_field('delete') }}
                        <button type="submit" class="btn btn-sm btn-danger mb-2">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $itemgejala->links() }}
</div>
@endsection