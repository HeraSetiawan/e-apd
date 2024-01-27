<x-template-app>
    <x-card judul="Riwayat Permintaan">
        <x-slot name='tombol'>
            <a
                class="btn btn-primary"
                href="{{ asset('assets/dokumen/penerimaan_apd.jpeg') }}"
                role="button"
                download
                >Formulir Permintaan</a
            >
        </x-slot>
        <h5>Silahkan download form, isi kemudian serahkan ke admin area anda untuk menukarkannya dengan apd <i class="bi-arrow-up"></i></h5>
    </x-card>
    <h4><i class="bi-book"></i> Riwayat Penerimaan APD Anda</h4>
    <ul class="list-group">
        @foreach ($riwayat as $item)
        {{-- <div class="hstack"> --}}
            <li class="list-group-item">Nama Penerima :<b class="text-uppercase">  {{ $item->karyawan->nama_lengkap }} </b>
                <a download class="text-decoration-none ms-5" href="{{ asset($item->file_permintaan_apd) }}">
                    <i class="bi-download"></i> Bukti penerimaan APD
                </a>
                <span class="float-end"><i class="bi-calendar"></i> {{ date('d M Y, H:i', strtotime($item->updated_at))  }}</span>
            </li>
        {{-- </div> --}}
        @endforeach
      </ul>
</x-template-app>