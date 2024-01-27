<x-template-app>
    <h4><i class="bi-book"></i> Riwayat Pemberian APD</h4>
    <ul class="list-group">
        @foreach ($riwayat as $item)
        {{-- <div class="hstack"> --}}
            
            <li class="list-group-item">
                <span class="badge bg-info">{{ $item->karyawan->asal_rig }}</span>
                | Nama Penerima :<b class="text-uppercase">  {{ $item->karyawan->nama_lengkap }} </b>
                <a download class="text-decoration-none ms-5" href="{{ asset($item->file_permintaan_apd) }}">
                    <i class="bi-download"></i> Bukti penerimaan APD
                </a>
                <span class="float-end"><i class="bi-calendar"></i> {{ date('d M Y, H:i', strtotime($item->updated_at))  }}</span>
            </li>
        {{-- </div> --}}
        @endforeach
      </ul>
</x-template-app>