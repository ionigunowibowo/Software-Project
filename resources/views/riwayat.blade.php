@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-header my-4 pb-4 text-center judul">{{ __('Riwayat') }}</div>
    <div class="card2">
        <div class="table-responsive">
            <table class="table table-striped table-md">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Kerusakan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>ioni</td>
                        <td>ioni@mail.com</td>
                        <td>Aki</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
</div>

@endsection