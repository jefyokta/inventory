<x-container>
    <div class="my-2 mb-8 flex justify-between items-center">
        <h1 class="text-primary font-semibold text-2xl">Permintaan </h1>
        @if (auth()->user()->role == 'petugas')
            <x-link href="{{ route('permintaan.create') }}" class=" btn btn-success text-neutral-content  rounded-xl">Buat
                Permintaan</x-link>
        @endif
    </div>
    <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th></th>
                    <th>Nama Barang</th>
                    <th>Kode Barang</th>
                    <th>Nama Petugas</th>
                    <th>Jumlah</th>

                    @if (auth()->user()->role == 'gudang' || auth()->user()->role == 'karyawan')
                        <th>Aksi</th>
                    @else
                        <th>Status</th>
                        <th>Status di kantor</th>
                    @endif

                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->

                @foreach ($permintaan as $i => $p)
                    <tr>
                        <th>{{ $i += 1 }}</th>
                        <td>{!! $p->barang->name ?? '<span class="text-error">barang tehapus<span>' !!}</td>
                        <td>{!! $p->barang->code ?? '<span class="text-error">barang tehapus<span>' !!}</td>
                        <td>{{ $p->user->name ?? 'user terhapus' }}</td>
                        <td>{{ $p->jumlah }}</td>


                        @if (auth()->user()->role == 'gudang')
                            <td>
                                @if (!$p->status)
                                    <button class="btn-primary btn-sm btn" wire:click='accept({{ $p->id }})'
                                        wire:confirm="Terima Permintaan Ini?">Accept</button>
                                    <x-link class="btn-danger btn-sm btn" :href="route('permintaan.edit', ['permintaan' => $p->id])">reject</x-link>
                                @else
                                    {{ $p->status }}
                                @endif

                            </td>
                        @elseif (auth()->user()->role == 'karyawan')
                            <td>
                                @if ($p->status)
                                    @switch($p->checked)
                                        @case(null)
                                            <button class="btn-success btn btn-xs text-success-content"
                                                wire:click="acceptReceived({{ $p->id }})">Sesuai</button>
                                            <button class="btn-error btn btn-xs text-error-content"
                                                wire:click="rejectReceived({{ $p->id }})">Tidak Sesuai</button>
                                        @break

                                        @case('accepted')
                                            diterima
                                        @break

                                        ditolak

                                        @default
                                    @endswitch
                                @else
                                    -
                                @endif
                            </td>
                        @else
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
                                @if ($p->status)
                                    @switch($p->checked)
                                        @case(null)
                                            {{ 'Belum dicek' }}
                                        @break

                                        @case('accepted')
                                            diterima
                                        @break

                                        @default
                                            ditolak
                                    @endswitch
                                @else
                                    -
                                @endif
                            </td>
                        @endif
                    </tr>
                @endforeach

            </tbody>
        </table>
        <x-action-message on='accepted'>Berhasil menerima permintaan</x-action-message>
        <x-action-message on='rejected'>Permintaan telah ditolak</x-action-message>

    </div>
</x-container>
