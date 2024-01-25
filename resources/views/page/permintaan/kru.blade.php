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
</x-template-app>