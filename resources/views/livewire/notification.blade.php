<x-container>
    <div>
        <h1 class="text-primary font-bold text-2xl">Notifikasi</h1>
    </div>

    <div class="space-y-5 my-10">
        @foreach ($notifications as $n)
            <div role="alert" class="alert shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="stroke-info h-6 w-6 shrink-0">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div>
                    <h3 class="font-bold">Permintaanmu
                        {{ $n->permintaan->status === 'accepted' ? 'Diterima' : 'Ditolak' }}!</h3>
                    @if ($n->permintaan->status === 'rejected')
                        <div class="text-xs">Permintaan barang <b>{{ $n->permintaan->barang->name }}</b> Sebanyak
                            {{ $n->permintaan->jumlah }} buah ditolak karena :{{ $n->message }}</div>
                    @else
                        <div class="text-xs">Permintaan barang <b>{{ $n->permintaan->barang->name }}</b> Sebanyak
                            {{ $n->permintaan->jumlah }} buah telah masuk! cek perubahan jumlah dikantor</div>
                    @endif
                    <div class="mt-2">
                        <span class="text-xs">
                            @if (\Carbon\Carbon::parse($n->created_at)->diffInDays(now()) > 7)
                                {{ \Carbon\Carbon::parse($n->created_at)->setTimezone('Asia/Jakarta')->locale('id')->translatedFormat('d F Y, H:i') }}
                            @else
                                {{ \Carbon\Carbon::parse($n->created_at)->locale('id')->diffForHumans() }}
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-container>
