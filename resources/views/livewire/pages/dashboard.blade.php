<x-container>
    <h1 class="text-center my-5 text-3xl font-bold text-primary">Dashboard</h1>
    <div class="flex space-x-3 justify-center">
        <div class="card glass w-72">

            <div class="card-body">
                <h2 class="card-title">Jumlah Karyawan</h2>
                <p>{{ $employees }}</p>

            </div>
        </div>
        <div class="card glass w-72">
            <div class="card-body">
                <h2 class="card-title">Jumlah Barang Dikantor</h2>
                <p>{{ $total }}</p>
            </div>
        </div>
        <div class="card glass w-72">
            <div class="card-body">
                <h2 class="card-title">Peminjaman Hari Ini</h2>
                <p>{{ $peminjaman }}</p>
            </div>
        </div>
    </div>
</x-container>
