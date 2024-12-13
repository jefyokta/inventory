<x-container>
    <div class="my-2 mb-8 flex justify-between items-center">
        <h1 class="text-primary font-semibold text-2xl">Barang yang belum dirakit</h1>
    </div>
    <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th></th>
                    <th>Nama Barang</th>
                    <th>Kode Barang</th>
                    <th>Kategori</th>
                    <th>Stok</th>


                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->

                @foreach ($barangs as $i => $p)
                    <tr>
                        <th>{{ $i += 1 }}</th>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->code }}</td>
                        <td>{{ $p->category }}</td>
                        <td>{{ $p->stock }}</td>
                    </tr>
                @endforeach
                <!-- row 2 -->

            </tbody>
        </table>
        <x-action-message on="deleted">Berhasil menghapus barang</x-action-message>
    </div>
</x-container>

