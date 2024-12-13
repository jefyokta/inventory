@extends('layouts.export')

@section('content')

            <thead>
                <tr>
                    <th></th>
                    <th>Nama Barang</th>
                    <th>Kode Barang</th>
                    <th>Nama Petugas</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Tanggal Permintaan</th>
                    <td>Tanggal Diterima</td>


                </tr>
            </thead>
            <tbody>

                @foreach ($permintaan as $i => $p)
                    <tr>
                        <th>{{ $i += 1 }}</th>
                        <td>{!! $p->barang->name ?? '<span class="text-error">barang tehapus<span>' !!}</td>
                        <td>{!! $p->barang->code ?? '<span class="text-error">barang tehapus<span>' !!}</td>
                        <td>{{ $p->user->name ?? 'user terhapus' }}</td>
                        <td>{{ $p->jumlah }}</td>



                        <td>
                            @switch($p->status)
                                @case('accepted')
                                    <div class="badge badge-success text-neutral-content">Diterima</div>
                                @break

                                @case('rejected')
                                    <div class="badge badge-error text-error-content">Ditolak</div>
                                @break

                                @default
                                    <div class="badge badge-info">Diproses</div>
                            @endswitch
                        </td>
                        <td>
                            {{ \Carbon\Carbon::parse($p->created_at)->locale('id')->translatedFormat('d F Y') ?? '-' }}

                        </td>
                        <td>
                            @if ($p->accepted_at)
                                {{ \Carbon\Carbon::parse($p->accepted_at)->locale('id')->translatedFormat('d F Y') ?? '-' }}
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @endforeach

            </tbody>
    
@endsection
