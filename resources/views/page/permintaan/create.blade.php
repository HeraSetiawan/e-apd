<x-template-app>
    <x-card judul="Form Permintaan Barang">
        <div class="text-end">
            <a href="{{ asset('assets/dokumen/permintaan_apd.jpeg') }}" download class="btn btn-outline-success rounded-pill"><i class="bi-download"></i> Form Permintaan</a>
        </div>
        <form method="post" action="{{ url('permintaan') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="nomor" class="form-label">Nomor</label>
                        <input type="text" class="form-control" id="nomor" name="nomor">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="diminta_oleh" class="form-label">Diminta oleh</label>
                        <x-input name="asal_rig" type="text" :value="Auth::user()->asal_rig" attribute="readonly" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="file_permintaan" class="form-label">File Permintaan APD</label>
                        <input type="file" class="form-control" id="file_permintaan" name="file_permintaan">
                        <small class="text-info">upload form permintaan APD yang telah di isi disini</small>
                    </div>
                </div>
            </div>
            <div class="border-top border-3 my-4 position-relative">
                <h6 class="position-absolute top-0 start-50 translate-middle text-bg-secondary rounded-2 px-2 py-1">Data Barang</h6>
            </div>
            <livewire:tambah-barang>
                {{--    <button type="submit" class="btn btn-primary">Kirim</button> --}}
            <button data-bs-toggle="modal" data-bs-target="#exampleModal"  type="button" class="btn btn-primary float-end"><i class="bi-send"></i> Submit</button>
            <x-modal>
                <p class="fw-bold">pastikan data di isi dengan benar sebelum mengirim</p>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </x-modal>
            </form>
    </x-card>
</x-template-app>