<x-container>
    <div class="my-2 mb-8 flex justify-between items-center">
        <h1 class="text-primary font-semibold text-2xl">Barang Di Saya</h1>
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
                    <th>Jumlah</th>
                    <th>Peminjam</th>
                    <th>Tanggal Dipinjam</th>
                    <th>Tanggal Dikembalikan</th>
                    <th>Status</th>

                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                {{-- @dd($barang)s --}}
                @foreach ($barang as $i => $p)
                    <tr class="text-xs">
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
                        <td>
                            @if (!$p->returned_at)
                                Belum Dikembalikan
                            @else
                                Sudah Dikembalikan
                            @endif
                        </td>
                    </tr>
                @endforeach
                <!-- row 2 -->

            </tbody>
        </table>
    </div>

</x-container>
