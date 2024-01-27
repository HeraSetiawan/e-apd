@php
function tgl($tgl) {
  return  \Carbon\Carbon::parse($tgl)->isoFormat('dddd, D MMMM Y');
}
@endphp
<x-template-app>
  <div class="row">
    <h3>Hi {{ Auth::user()->nama_lengkap }}, Selamat datang di Dashboard Admin</h3>
    <hr>
    <div class="col-lg-8">
      <x-card judul='Detail Karyawan'>
          <table class="table">
              <tr>
                  <td colspan="3">
                      <img src="{{ asset($karyawan->foto) }}" class="img-fluid mx-auto d-block rounded-circle img-thumbnail" style="aspect-ratio:1/1" width="150">
                  </td>
              </tr>
                  <tr class="text-uppercase">
                    <td>nama lengkap</td>
                    <td>:</td>
                    <td>{{ $karyawan->nama_lengkap }}</td>
                  </tr>
                  <tr class="text-uppercase">
                    <td>nik</td>
                    <td>:</td>
                    <td>{{ $karyawan->nik }}</td>
                  </tr>
                  <tr class="text-uppercase">
                    <td>email</td>
                    <td>:</td>
                    <td>{{ $karyawan->email }}</td>
                  </tr>
                  <tr class="text-uppercase">
                    <td>jabatan</td>
                    <td>:</td>
                    <td>{{ $karyawan->jabatan }}</td>
                  </tr>
                  <tr class="text-uppercase">
                    <td>jenis operasi</td>
                    <td>:</td>
                    <td>{{ $karyawan->jenis_operasi }}</td>
                  </tr>
                  <tr class="text-uppercase">
                    <td>asal rig</td>
                    <td>:</td>
                    <td>{{ $karyawan->asal_rig }}</td>
                  </tr>
                  <tr class="text-uppercase">
                    <td>asal base</td>
                    <td>:</td>
                    <td>{{ $karyawan->asal_base }}</td>
                  </tr>
                  <tr class="text-uppercase">
                    <td>schedule</td>
                    <td>:</td>
                    <td>{{ $karyawan->schedule }}</td>
                  </tr>
                  <tr class="text-uppercase">
                    <td>telepon</td>
                    <td>:</td>
                    <td>{{ $karyawan->telepon }}</td>
                  </tr>
                  <tr class="text-uppercase">
                    <td>jenis kelamin</td>
                    <td>:</td>
                    <td>{{ $karyawan->jenis_kelamin }}</td>
                  </tr>
                  <tr class="text-uppercase">
                    <td>agama</td>
                    <td>:</td>
                    <td>{{ $karyawan->agama }}</td>
                  </tr>
                  <tr class="text-uppercase">
                    <td>tempat lahir</td>
                    <td>:</td>
                    <td>{{ $karyawan->tempat_lahir }}</td>
                  </tr>
                  <tr class="text-uppercase">
                    <td>tanggal lahir</td>
                    <td>:</td>
                    <td>{{ tgl($karyawan->tanggal_lahir)  }}</td>
                  </tr>
                  <tr class="text-uppercase">
                    <td>alamat</td>
                    <td>:</td>
                    <td>{{ $karyawan->alamat }}</td>
                  </tr>
                  <tr class="text-uppercase">
                    <td>hse passport number</td>
                    <td>:</td>
                    <td>{{ $karyawan->hse_passport_number }}</td>
                  </tr>
                  <tr class="text-uppercase">
                    <td>masa berlaku hse passport</td>
                    <td>:</td>
                    <td>{{ tgl($karyawan->masa_berlaku_hse_passport) }}</td>
                  </tr>
                  <tr class="text-uppercase">
                    <td>tanggal mcu terakhir</td>
                    <td>:</td>
                    <td>{{ tgl($karyawan->tanggal_mcu_terakhir) }}</td>
                  </tr>
                  <tr class="text-uppercase">
                    <td>siml</td>
                    <td>:</td>
                      <td>
                          <a href="{{ url($karyawan->siml) }}">
                              <img src="{{ asset($karyawan->siml) }}" width="55" class="img-thumbnail border-success">
                          </a>
                      </td>
                  </tr>
                  <tr class="text-uppercase">
                    <td>keterangan mcu</td>
                    <td>:</td>
                    <td>{{ $karyawan->keterangan_mcu }}</td>
                  </tr>
                  <tr class="text-uppercase">
                    <td>hasil MCU</td>
                    <td>:</td>
                      <td>
                          <a href="{{ url($karyawan->hasil_mcu) }}">
                              <img src="{{ asset($karyawan->hasil_mcu) }}" width="55" class="img-thumbnail border-success">
                          </a>
                      </td>
                  </tr>
                  <tr class="text-uppercase">
                    <td>tinggi badan</td>
                    <td>:</td>
                    <td>{{ $karyawan->tinggi_badan }}</td>
                  </tr>
                  <tr class="text-uppercase">
                    <td>berat badan</td>
                    <td>:</td>
                    <td>{{ $karyawan->berat_badan }}</td>
                  </tr>
                  <tr class="text-uppercase">
                    <td>golongan darah</td>
                    <td>:</td>
                    <td>{{ $karyawan->golongan_darah }}</td>
                  </tr>
                  <tr class="text-uppercase">
                    <td>tanggal bst terakhir</td>
                    <td>:</td>
                    <td>{{ tgl($karyawan->tanggal_bst_terakhir) }}</td>
                  </tr>
                  <tr class="text-uppercase">
                    <td>hasil bst</td>
                    <td>:</td>
                      <td>
                          <a href="{{ url($karyawan->hasil_bst) }}">
                              <img src="{{ asset($karyawan->hasil_bst) }}" width="55" class="img-thumbnail border-success">
                          </a>
                      </td>
                  </tr>
                  <tr class="text-uppercase">
                    <td>apd wajib</td>
                    <td>:</td>
                    <td>{{ $karyawan->apd_wajib }}</td>
                  </tr>
                  <tr class="text-uppercase">
                    <td>ukuran coverall</td>
                    <td>:</td>
                    <td>{{ $karyawan->ukuran_coverall }}</td>
                  </tr>
                  <tr class="text-uppercase">
                    <td>ukuran safety shoes</td>
                    <td>:</td>
                    <td>{{ $karyawan->ukuran_safety_shoes }}</td>
                  </tr>
                  <tr class="text-uppercase">
                    <td>ukuran safety gloves</td>
                    <td>:</td>
                    <td>{{ $karyawan->ukuran_safety_gloves }}</td>
                  </tr>
                  <tr class="text-uppercase">
                    <td>ukuran raincoat</td>
                    <td>:</td>
                    <td>{{ $karyawan->ukuran_raincoat }}</td>
                  </tr>
                  <tr class="text-uppercase">
                    <td>nomor relasi darurat</td>
                    <td>:</td>
                    <td>{{ $karyawan->nomor_relasi_darurat }}</td>
                  </tr>
                  <tr class="text-uppercase">
                    <td>nama relasi darurat</td>
                    <td>:</td>
                    <td>{{ $karyawan->nama_relasi_darurat }}</td>
                  </tr>
          </table>
      </x-card>
    </div>
    <div class="col-lg-4">
      <div class="hstack ps-5" style="width: auto;height: 200px;background: linear-gradient(90deg, #e3ffe7 0%, #d9e7ff 100%); border-radius: 15px">
      <div>
        <h1 class="display-3">
          <i class="bi-person"></i>
        </h1>
      </div>
      <div>
        <h5 class="ps-3 my-0">Jumlah Total Kru</h5>
        <h2 class="ps-3 my-0">{{ $jumlah_kru }} Orang</h2>
      </div>
      </div>

      <div class="hstack ps-5 mt-3" style="width: auto;height: 200px;background: linear-gradient(90deg, #e3ffe7 0%, #d9e7ff 100%); border-radius: 15px">
      <div>
        <h1 class="display-3">
          <i class="bi-box2"></i>
        </h1>
      </div>
      <div>
        <h5 class="ps-3 my-0">Jumlah Total APD</h5>
        <h2 class="ps-3 my-0">{{ $jumlah_stok }} Item</h2>
      </div>
      </div>
    </div>
  </div>
</x-template-app>