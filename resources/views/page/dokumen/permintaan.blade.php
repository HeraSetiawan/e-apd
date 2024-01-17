<x-template-app>
    <x-card judul="Form Permintaan Barang">
        <form method="POST" action="">
            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-3">
                        <label for="nomor" class="form-label">Nomor</label>
                        <input type="text" class="form-control" id="nomor" name="nomor">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mb-3">
                        <label for="dikirim_ke" class="form-label">Dikirim ke</label>
                        <input type="text" class="form-control" id="dikirim_ke" name="dikirim_ke">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="diminta_oleh" class="form-label">Diminta oleh</label>
                        <input type="text" class="form-control" id="diminta_oleh" name="diminta_oleh">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="file_permintaan" class="form-label">File Form Permintaan </label>
                        <input type="file" class="form-control" id="file_permintaan" name="file_permintaan">
                        <small>upload form permintaan APD yang telah di isi disini</small>
                    </div>
                </div>
            </div>
            <div class="border-top border-3 my-4 position-relative">
                <h4 class="position-absolute top-0 start-50 translate-middle text-bg-secondary rounded-2 px-2 py-1">Data Barang</h4>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="mb-3">
                        <label for="jumlah_diminta" class="form-label">Jumlah</label>
                        <input placeholder="jumlah diminta" type="number" class="form-control" id="jumlah_diminta" name="jumlah_diminta">
                    </div>
                </div>
                <div class="col-lg-2">
                    <x-select name='satuan'>
                        <option value="pcs">pcs</option>
                        <option value="pack">pack</option>
                    </x-select>
                </div>
                <div class="col-lg-2">
                    <button type="button" class="btn btn-dark rounded-pill mt-lg-2"><i class="bi-plus"></i> Tambah</button>  
                </div>
            </div>
            <button type="submit" class="btn btn-primary float-end"><i class="bi-send"></i> Submit</button>
            </form>
    </x-card>
</x-template-app>