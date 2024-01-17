<x-template-app>
    @if (session('pesan'))
        <x-alert :warna="session('warna')" :pesan="session('pesan')" />
    @endif
    <x-card judul='Stok Barang'>
    <x-slot name="tombol">
        <a
            class="btn btn-success"
            href="{{ url('stokbarang/create') }}"
            ><i class="bi-plus"></i> Buat</a
        >
        
    </x-slot>
        <div
            class="table-responsive"
        >
            <table
                class="table"
                id="dataTable"
            >
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Masuk</th>
                        <th>Nama Barang</th>
                        <th>Qty</th>
                        <th>Nama Penerima</th>
                        <th>Lokasi</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stokbarang as $item)
                        <tr class="text-capitalize">
                            <td>{{ $loop->iteration }}.</td>
                            <td>{{ $item->format_tanggal_masuk }}</td>
                            <td>{{ $item->nama_barang }}</td>
                            <td>{{ $item->qty_barang_masuk }}</td>
                            <td>{{ $item->nama_penerima }}</td>
                            <td>
                                <span class="badge bg-info bg-gradient">
                                    {{ $item->lokasi }}
                                </span>
                            </td>
                            <td>
                                <a class="btn bg-gradient btn-primary" href='{{ url("stokbarang/$item->slug/edit") }}' ><i class="bi-pen"></i></a>
                            </td>
                            <td>
                                <button type="button" class="btn bg-gradient btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi-trash"></i></button>
                                <x-modal>
                                    <p class="fw-bold">Yakin ingin hapus data ?</p>
                                        <form action='{{ url("stokbarang/$item->slug") }}' method="post">
                                            @method('delete')
                                            @csrf
                                            <button
                                                type="submit"
                                                class="btn btn-danger float-end"
                                            >
                                                Hapus
                                            </button>
                                        </form>
                                    </x-modal>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </x-card>
</x-template-app>