<x-container>
    <div class="my-2 mb-8 flex justify-between items-center">

        <h1 class="text-primary font-semibold text-2xl">Buat Peminjaman</h1>
    </div>
    <div class="flex justify-center p-5">
        <form class="form w-full flex flex-col items-center space-y-5 justify-center" wire:submit='save'>
            <div class="w-10/12">
                <x-input-label>Nama Karyawan</x-input-label>
                <select class="select select-bordered  w-full" wire:model='user_id'>
                    <option>
                        Pilih karyawan
                    </option>
                    @foreach ($employees as $e)
                        <option value="{{ $e->id }}">{{ $e->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('user_id')" />
            </div>
            <div class="w-10/12">
                <x-input-label>Nama Barang</x-input-label>
                <select class="select select-bordered w-full" wire:model='barang_id'>
                    <option>
                        Pilih Barang
                    </option>
                    @foreach ($barang as $e)
                        <option value="{{ $e->id }}">{{ "$e->name [$e->code] Sisa $e->stock" }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('barang_id')" />
            </div>
            <div class="w-10/12">
                <x-input-label>Jumlah</x-input-label>
                <x-text-input type="number" class="w-full" wire:model='jumlah' />
                <x-input-error :messages="$errors->get('jumlah')" />
            </div>
            <div class="w-10/12">
                <x-primary-button>Simpan</x-primary-button>
            </div>
            <x-action-message on="peminjaman-created">Peminjaman Berhasil dibuat</x-action-message>
            <x-error-message on="peminjaman-error" />

        </form>
    </div>

</x-container>
