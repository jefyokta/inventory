<x-container class="flex flex-col justify-center items-center">
    <div class="mb-5">
        <x-page-title>Input Barang</x-page-title>
    </div>
    <form class="w-10/12 mx-auto space-y-6" wire:submit="save">
        <div class="">
            <x-input-label value="Nama Barang" />
            <x-text-input class="w-full block" wire:model='name'/>
            <x-input-error :messages="$errors->get('name')"  />
        </div>
        <div class="">
            <x-input-label value="Kode Barang" />
            <x-text-input class="block w-full"  wire:model='code' />
            <x-input-error :messages="$errors->get('code')" />
        </div>
        <div class="">
            <x-input-label value="Stock " />
            <x-text-input class="block w-full" type='number' wire:model='stock' />
            <x-input-error :messages="$errors->get('stock')" />
        </div>
        <div>
            <x-input-label value="Kategori" />
            <select class="select select-bordered w-full " wire:model='category'>
                <option selected>Pilih Kategori</option>
                <option value="bricks">Bricks</option>
                <option value="nano block">Nano Block</option>

            </select>
            <x-input-error :messages="$errors->get('category')" />

        </div>
        <div>
            <x-primary-button>Buat <span class="loading loading-spinner loading-xs" wire:loading></span></x-primary-button>
        </div>
        <x-action-message on="barang-created">Permintaan Berhasil dibuat</x-action-message>
        <x-error-message on="barang-error" />


    </form>
</x-container>
