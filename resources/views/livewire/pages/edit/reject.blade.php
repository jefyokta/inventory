<x-container>
    <div class="my-2 mb-8 flex justify-between items-center">
        <h1 class="text-primary font-semibold text-2xl">Tolak permintaan:
            {{ $permintaan->jumlah . ' ' . $permintaan->barang->name }} </h1>

    </div>
    <form wire:submit='reject' class="space-y-4 w-full">
        <div>
            <x-input-label>Pesan</x-input-label>
            <x-text-input class="w-10/12" wire:model="message" />
        </div>
        <x-primary-button>Tolak <span class="loading loading-spinner loading-xs" wire:loading></span></x-primary-button>
    </form>
    <x-action-message on="rejected">Berhasil Menolak Permintaan</x-action-message>
</x-container>
