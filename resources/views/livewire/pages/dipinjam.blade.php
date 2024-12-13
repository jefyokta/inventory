<x-container>
    <div class="my-2 mb-8 flex justify-between items-center">
        <h1 class="text-primary font-semibold text-2xl">Barang </h1>
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
                    <th>Aksi</th>

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

                        <td> {{ $p->returned_at? \Carbon\Carbon::parse($p->returned_at)->setTimezone('Asia/Jakarta')->locale('id')->translatedFormat('d F Y'): '-' }}
                        </td>
                        <td>
                            @if (!$p->returned_at)
                                <x-info-button wire:click='confirm({{ $p->id }})' type='button'
                                    class="text-xs capitalize">dikembalikan</x-info-button>
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
    <x-action-message on='success-kembali'>Berhasil Dikembalikan</x-action-message>
    <x-error-message on='error-kembali' />
    @livewire('script.confirmation')
</x-container>
