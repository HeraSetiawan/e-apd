<x-template-app>
    @if (session('pesan'))
        <x-alert :warna="session('warna')" :pesan="session('pesan')" />
    @endif
    <x-card judul='Stok Barang Area'>
    <x-slot name="tombol">
        <a
            class="btn btn-primary"
            href="{{ url('permintaan/kru/create') }}"
            ><i class="bi-pen"></i> Pemberian APD</a
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
                        {{-- <th>Tanggal Masuk</th> --}}
                        <th>Nama Barang</th>
                        <th>Qty</th>
                        <th>Lokasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stok_area as $item)
                        <tr class="text-capitalize">
                            <td>{{ $loop->iteration }}.</td>
                            {{-- <td>{{ $item->tanggal }}</td> --}}
                            <td>{{ $item->nama_barang }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ $item->lokasi}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </x-card>
</x-template-app>