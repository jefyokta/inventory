@extends('layouts.export')
@section('content')
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Kode Barang</th>
            <th>Jumlah</th>
            <th>Peminjam</th>
            <th>Tanggal Dipinjam</th>
            <th>Tanggal Dikembalikan</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($peminjaman as $i => $p)
            <tr>
                <th>{{ $i += 1 }}</th>
                <td>{{ $p->barang->name }}</td>
                <td>{{ $p->barang->code }}</td>
                <td>{{ $p->jumlah }}</td>
                <td>{{ $p->user->name }}</td>
                <td>
                    {{ \Carbon\Carbon::parse($p->borrowed_at)->setTimezone('Asia/Jakarta')->locale('id')->translatedFormat('d F Y') }}
                </td>

                <td> {{ \Carbon\Carbon::parse($p->returned_at)->setTimezone('Asia/Jakarta')->locale('id')->translatedFormat('d F Y') ?? '-' }}
                </td>

            </tr>
        @endforeach
    </tbody>
@endsection
