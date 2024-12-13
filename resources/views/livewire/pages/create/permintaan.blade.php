<x-container class="flex flex-col justify-center items-center">
    <div class="mb-5">

        <x-page-title>Buat Permintaan</x-page-title>
    </div>
    <form class="w-10/12 mx-auto space-y-6" wire:submit="save">
        <div class="">
            <x-input-label value="Nama Barang" />
            <select class="select select-bordered w-full " wire:model='barang_id'>
                <option selected>Pilih Barang</option>
                @foreach ($barang as $b)
                    <option value="{{ $b->id }}">{{ $b->name . ' [' . $b->code . "] Sisa $b->stock" }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('barang_id')" />

        </div>
        <div class="">
            <x-input-label value="Jumlah" />
            <x-text-input type="number" class="block w-full" wire:model='jumlah' />
            <x-input-error :messages="$errors->get('jumlah')" />
        </div>
        <div>
            <x-primary-button>Minta <span class="loading loading-spinner loading-xs" wire:loading></span></x-primary-button>
        </div>
        <x-action-message on="permintaan-created">Permintaan Berhasil dibuat</x-action-message>
        <x-error-message on="permintaan-error" />


    </form>
</x-container>
