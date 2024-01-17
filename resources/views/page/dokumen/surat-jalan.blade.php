<x-template-app>
    <div class="mx-auto">
        <div class="d-flex justify-content-between">
            <div class="vstack text-center">
                <img src="{{ asset('assets/gambar/logo.png') }}" width="75" class="img-fluid mx-auto d-block">
                <b class="fs-5">PT. PERTAMINA</b>
                <small class=" text-uppercase">driling services area</small>
                <small class=" text-uppercase">sumbagsel</small>
            </div>
            <div class="vstack">
                <h5 class="text-uppercase">
                    permintaan angkutan barang
                </h5>
                <small class="fw-bold">NO.</small>
            </div>
            <div class="vstack text-uppercase">
                <table class="table table-borderless mt-4">
                    <tr>
                        <th style="width: 10px"><b>tanggal</b></th>
                        <th>:</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th><b>eslon</b></th>
                        <th>:</th>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="vstack">
            <table>
                <tr>
                    <td style="width: 120px">Dari</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td >Untuk dikirim ke</td>
                    <td>:</td>
                    <td>di</td>
                </tr>
                <tr>
                    <td>Atas</td>
                    <td>:</td>
                    <td></td>
                </tr>
            </table>
        </div>
        <table class="table table-bordered">
            <tr>
                <td>Jumlah</td>
                <td>Satuan</td>
                <td>Keterangan</td>
                <td>M3</td>
                <td>Berat</td>
            </tr>
            <tr>
                <td>Tanggal: </td>
                <td>IU</td>
                <td>Kode Rekening</td>
                <td>D</td>
                <td>LAP</td>
                <td>ESLON</td>
                <td>PERINTAH KERJA</td>
                <td>JB</td>
                <td>PERIKSA KODE REKENING</td>
            </tr>
            <tr>
                <td>Dikirim ke:</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Diperlukan Tgl:</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="text-uppercase small fw-bold">
                <td>No. Urut</td>
                <td>Jumlah yg diminta</td>
                <td>sat</td>
                <td>keterangan/nama barang</td>
                <td>jumlah yg dikeluarkan</td>
                <td colspan="5">kimap</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="2"></td>
            </tr>
            <tr class="text-uppercase small fw-bold">
                <td colspan="2">keterangan pekerjaan</td>
                <td colspan="2">diminta oleh</td>
                <td colspan="2">dikeluarkan oleh</td>
                <td colspan="2">diterima oleh</td>
                <td colspan="2">dicatat di kr oleh</td>
            </tr>
            <tr class="text-uppercase small fw-bold">
                <td colspan="2"></td>
                <td colspan="2">nama:</td>
                <td colspan="2">nama:</td>
                <td colspan="2">nama:</td>
                <td colspan="2">nama:</td>
            </tr>
    
        </table>
    </div>
</x-template-app>