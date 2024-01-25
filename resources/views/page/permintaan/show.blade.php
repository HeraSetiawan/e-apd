<x-template-app>
    <x-card judul='Detail Permintaan'>
        <x-slot name="tombolFooter">
            <a
                class="btn btn-primary float-end"
                href="{{ url('permintaan/create') }}"
                role="button"
                ><i class="bi-pen"></i> Ajukan</a
            >
        </x-slot>
        @if (empty($permintaan))
            <div class="card-body">
                <h4 class="text-capitalize text-center"><i class="bi-volume-down"></i> Anda belum mengajukan permintaan</h4>
            </div>
        @else
        @foreach ($permintaan as $item)
        <div class="row">
                <div class="col-1">
                    <div class="position-relative border-start border-5 translate-x my-5 ms-3" style="height: 300px">
                        <div class="position-absolute top-0 start-0 translate-middle">
                            <div class="btn  {{ $item->status == 0 ? 'btn-success' : 'btn-secondary' }} bg-gradient rounded-circle">
                                <i class="bi bi-card-text fs-5"></i>
                            </div>
                        </div>

                        <div class="position-absolute start-0 translate-middle" style="top: 25%">
                            <div class="btn {{ $item->status == 1 ? 'btn-success' : 'btn-secondary' }} bg-gradient rounded-circle">
                                <i class="bi bi-dropbox fs-5"></i>
                            </div>
                        </div>
                        
                        
                        <div class="position-absolute top-50 start-0 translate-middle">
                            <div class="btn {{ $item->status == 2 ? 'btn-success' : 'btn-secondary' }} bg-gradient rounded-circle">
                                <i class="bi bi-hourglass-split fs-5"></i>
                            </div>
                        </div>

                        <div class="position-absolute start-0 translate-middle" style="top: 75%">
                            <div class="btn {{ $item->status == 4 ? 'btn-warning' : 'btn-secondary' }} bg-gradient rounded-circle">
                                <i class="bi bi-x fs-5"></i>
                            </div>
                        </div>
                        
                        <div class="position-absolute top-100 start-0 translate-middle">
                            <div class="btn {{ $item->status == 3 ? 'btn-success' : 'btn-secondary' }} bg-gradient rounded-circle">
                                <i class="bi bi-truck fs-5"></i>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="col-10">
                    <div class="alert alert-info" role="alert">
                        
                        <strong> 
                            <i class="bi-card-text"></i>
                        </strong> 
                        @switch ($item->status)
                            @case('0')
                                Menunggu proses persetujuan pusat
                            @break
                            @case('1')
                                Barang Sedang dikemas
                            @break
                            @case('2')
                                Barang telah dikirim
                            @break
                            @case('3')
                                Barang telah diterima
                            @break
                            @case('4')
                                Permintaan ditolak
                            @break
                        @endswitch
                    </div>
                    <div>
                        No. Pesanan : {{ $item->nomor }} <br>
                        Tgl. Pesanan : {{ $item->format_tanggal }}
                        <ol>
                            @foreach ($item->barang_permintaan as $barang)
                                <li>{{ "Nama Barang: ". $barang->stokBarang->nama_barang ." -> Qty: ". $barang->jumlah_dikeluarkan }}</li>
                            @endforeach
                        </ol>
                    </div>
                    @if ($item->status == "2")
                        <form action="{{ route('terima permintaan') }}" method="post">
                            @csrf
                            <input type="hidden" value="{{ $item->id }}" name="id">
                            @foreach ($item->barang_permintaan as $barang)
                                <input name="nama_barang[]" type="hidden" value="{{ $barang->stokBarang->nama_barang }}">
                                <input name="qty[]" type="hidden" value="{{ $barang->jumlah_dikeluarkan }}">
                            @endforeach
                                <input type="hidden" name="lokasi" value="{{ Auth::user()->asal_rig }}">
                            <button type="submit" class="btn btn-outline-success float-end" >Terima Pesanan</button>
                        </form>
                    @endif
                </div>
            </div>
            <hr>
                @endforeach
        @endif
    </x-card>
</x-template-app>
