<x-container>
    <div class="my-2 mb-8 flex justify-between items-center">
        <h1 class="text-primary font-semibold text-2xl">Permintaan </h1>
        @if (auth()->user()->role == 'petugas')
            <x-link href="{{ route('permintaan.create') }}" class=" btn btn-success text-neutral-content  rounded-xl">Buat
                Permintaan</x-link>
        @else
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
                    <th>Tanggal</th>


                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->

                @foreach ($barang as $i => $p)
                    <tr>
                        <th>{{ $i += 1 }}</th>
                        <td>{!! $p->barang->name ?? '<span class="text-error">barang tehapus<span>' !!}</td>
                        <td>{!! $p->barang->code ?? '<span class="text-error">barang tehapus<span>' !!}</td>
                        <td>{{ $p->user->name ?? 'user terhapus' }}</td>
                        <td>{{ $p->jumlah }}</td>
                        <td>
                            {{ \Carbon\Carbon::parse($p->accepted_at)->setTimezone('Asia/Jakarta')->locale('id')->translatedFormat('d F Y') }}
                        </td>


                    </tr>
                @endforeach
                <!-- row 2 -->

            </tbody>
        </table>

    </div>
</x-container>
