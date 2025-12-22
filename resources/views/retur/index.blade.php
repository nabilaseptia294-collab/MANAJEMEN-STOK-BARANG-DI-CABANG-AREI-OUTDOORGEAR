@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('retur.create') }}" class="btn btn-primary">Tambah Retur</a>

    <table class="table mt-3">
        <tr>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Alasan</th>
        </tr>
        @foreach($retur as $r)
        <tr>
            <td>{{ $r->tanggal_retur }}</td>
            <td>{{ $r->jumlah_retur }}</td>
            <td>{{ $r->alasan_retur }}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
