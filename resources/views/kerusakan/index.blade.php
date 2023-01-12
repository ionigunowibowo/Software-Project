@extends('layouts.dashboard')

@section('content')
<div class="flex-wrap flex-md-nowrap mt-3 pt-3 pb-2 mb-3 border-bottom text-center">
    <h1 class="">Data Kerusakan</h1>
</div>
<a href="{{ route('kerusakan.create') }}" class="btn btn-sm btn-danger my-3">tambah kerusakan</a>
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
                <th>Penyebab</th>
                <th>Solusi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($itemkerusakan as $kerusakan)
            <tr>
                <td>
                    {{ $kerusakan->id }}
                </td>
                <td>
                    {{ $kerusakan->nama }}
                </td>
                <td>
                    {{ $kerusakan->penyebab }}
                </td>
                <td>{{ $kerusakan->solusi }}</td>
                <td>
                    <a href="{{ route('kerusakan.edit', $kerusakan->id) }}" class="btn btn-sm btn-primary mr-2 mb-2">
                        Edit
                    </a>
                    <form action="{{ route('kerusakan.destroy', $kerusakan->id) }}" method="post" style="display:inline;">
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
    {{ $itemkerusakan->links() }}
</div>
@endsection