<x-container>
    <div class="my-2 mb-8 flex justify-between items-center">
        <h1 class="text-primary font-semibold text-2xl">Laporan Permintaan </h1>
        <div class="flex items-end space-x-2">
            <div>
                <x-input-label>Mulai</x-input-label>
                <input type="date" class="input input-bordered input-sm" wire:model.live='start'>
            </div>
            <div>
                <x-input-label>Selesai</x-input-label>
                <input type="date" class="input input-bordered input-sm" wire:model.live='end'>
            </div>
            <x-primary-button wire:click='export'
                class=" btn btn-success text-neutral-content  rounded-xl">cetak</x-primary-button>
        </div>
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
                <!-- row 2 -->

            </tbody>
        </table>


    </div>
</x-container>
