<x-template-app>
    <x-card judul='Tambah Admin'>
        <h3 id="judul" class="text-uppercase"> Data Akun</h3>
        <form action="{{ url('karyawan', $karyawan->id) }}" method="post" enctype="multipart/form-data">
            @method('put')
        @csrf
        <section id="part1">
                @csrf
                <input type="hidden" readonly name="old_foto" value="{{ $karyawan->foto }}">
                <livewire:upload-file :old_foto="$karyawan->foto"  />
                <div class="mb-3">
                    <label for="role" class="form-label">Role Akses</label>
                    <select class="form-select" name="role" id="role">
                        <option disabled selected>--Pilih Satu--</option>
                        <option @selected(old('role', $karyawan->role) == 'SA') value="SA">Super Admin</option>
                        <option @selected(old('role', $karyawan->role) == 'SS') value="SS">ADMIN</option>
                        <option @selected(old('role', $karyawan->role) == 'AS') value="AS">Asisten</option>
                        <option @selected(old('role', $karyawan->role) == 'KRU') value="KRU">KRU</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <x-input name='nama_lengkap' type='text' :value="old('nama_lengkap',$karyawan->nama_lengkap)" />
                    </div>
                    <div class="col-lg-6">
                        <x-input name='nik' type='text' :value="old('nik', $karyawan->nik)" />
                    </div>
                </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input value="{{ old('email',$karyawan->email) }}" type="email" class="form-control" name="email" placeholder="masukan email">
                    </div>
                    {{-- <label class="form-label">Password</label>
                    <div class="input-group mb-3">
                        <input required type="password" name="password" id="password" class="form-control" placeholder="password" aria-describedby="suffixId">
                        <span class="input-group-text border-0 bg-transparent" id="suffixId">
                            <button type="button" class="btn btn-outline-primary" onclick="ubahTipe()"><i class="bi-eye "></i></button>
                        </span>
                    </div> --}}
            </section>
            <section id="part2" class="d-none">
                <div class="row">
                    <div class="col-lg-6">
                        <x-select name='jenis_operasi' label='jenis operasi'>
                            <option @selected(old('jenis_operasi', $karyawan->jenis_operasi) == 'KANTOR/GUDANG AREA') value="KANTOR/GUDANG AREA">KANTOR/GUDANG AREA</option>
                            <option @selected(old('jenis_operasi', $karyawan->jenis_operasi) == 'ONSHORE') value="ONSHORE">ONSHORE</option>
                            <option @selected(old('jenis_operasi', $karyawan->jenis_operasi) == 'OFFSHORE') value="OFFSHORE">OFFSHORE</option>                              
                        </x-select>
                    </div>
                    <div class="col-lg-6">
                        <x-input name='jabatan' type='text' :value="old('jabatan', $karyawan->jabatan)" />                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <x-select name='asal_rig' label='asal rig'>
                            <option @selected(old('asal_rig', $karyawan->asal_rig) == 'PDSI#05.2/OW760-M') value="PDSI#05.2/OW760-M">PDSI#05.2/OW760-M</option>
                            <option @selected(old('asal_rig', $karyawan->asal_rig) == 'PDSI#20.2/EMSCOD2-M') value="PDSI#20.2/EMSCOD2-M">PDSI#20.2/EMSCOD2-M</option>
                            <option @selected(old('asal_rig', $karyawan->asal_rig) == 'PDSI#24.1/CWKT210-M') value="PDSI#24.1/CWKT210-M">PDSI#24.1/CWKT210-M</option>
                            <option @selected(old('asal_rig', $karyawan->asal_rig) == 'PDSI#26.1/H25CD-M') value="PDSI#26.1/H25CD-M">PDSI#26.1/H25CD-M</option>
                            <option @selected(old('asal_rig', $karyawan->asal_rig) == 'PDSI#29.3/D1500-E') value="PDSI#29.3/D1500-E">PDSI#29.3/D1500-E</option>
                            <option @selected(old('asal_rig', $karyawan->asal_rig) == 'PDSI#33.1/IDECO-H35-M') value="PDSI#33.1/IDECO-H35-M">PDSI#33.1/IDECO-H35-M</option>
                            <option @selected(old('asal_rig', $karyawan->asal_rig) == 'PDSI#34.1/IDECO-H35-M') value="PDSI#34.1/IDECO-H35-M">PDSI#34.1/IDECO-H35-M</option>
                            <option @selected(old('asal_rig', $karyawan->asal_rig) == 'PDSI#36.1/SKTYOP650-M') value="PDSI#36.1/SKTYOP650-M">PDSI#36.1/SKTYOP650-M</option>
                            <option @selected(old('asal_rig', $karyawan->asal_rig) == 'PML') value="PML">PML</option>
                            <option @selected(old('asal_rig', $karyawan->asal_rig) == 'HTE') value="HTE">HTE</option>
                            <option @selected(old('asal_rig', $karyawan->asal_rig) == 'KANTOR') value="KANTOR">KANTOR</option>                             
                        </x-select>
                    </div>
                    <div class="col-lg-6">
                        <x-select name='asal_base' label='asal base'>
                            <option @selected(old('asal_base', $karyawan->asal_base) == 'SBS') value="SBS">SBS</option>
                            <option @selected(old('asal_base', $karyawan->asal_base) == 'KTI') value="KTI">KTI</option>
                            <option  @selected(old('asal_base', $karyawan->asal_base) == 'JAMBI NAD') value="JAMBI NAD">JAMBI NAD</option>
                            <option  @selected(old('asal_base', $karyawan->asal_base) == 'MIDLE EAST') value="MIDLE EAST">MIDLE EAST</option>
                            <option  @selected(old('asal_base', $karyawan->asal_base) == 'JAKARTA') value="JAKARTA">JAKARTA</option>
                            <option  @selected(old('asal_base', $karyawan->asal_base) == 'ROKAN') value="ROKAN">ROKAN</option>
                            <option  @selected(old('asal_base', $karyawan->asal_base) == 'JAWA') value="JAWA">JAWA</option>
                            <option  @selected(old('asal_base', $karyawan->asal_base) == 'GEOTHERMAL') value="GEOTHERMAL">GEOTHERMAL</option>
                          </x-select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <x-select name='schedule' label='schedule'>
                            <option @selected(old('schedule', $karyawan->schedule) == '1') value="1">1</option>
                            <option  @selected(old('schedule', $karyawan->schedule) == '2') value="2">2</option>
                            <option  @selected(old('schedule', $karyawan->schedule) == '3') value="3">3</option>
                        </x-select>
                    </div>
                    <div class="col-lg-6">
                        <x-input name='telepon' type='number' :value="old('telepon', $karyawan->telepon)" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <x-select name='jenis_kelamin' label='Jenis Kelamin'>
                            <option @selected(old('jenis_kelamin', $karyawan->jenis_kelamin) == 'laki-laki') class="text-capitalize" value="laki-laki">Laki-laki</option>
                            <option @selected(old('jenis_kelamin', $karyawan->jenis_kelamin) == 'perempuan') value="perempuan">Perempuan</option>
                        </x-select>
                    </div>
                    <div class="col-lg-6">
                        <x-select name='agama' label='Agama'>
                            <option @selected(old('agama', $karyawan->agama) == 'islam') class="text-capitalize" value="islam">islam</option>
                            <option @selected(old('agama', $karyawan->agama) == 'kristen') class="text-capitalize" value="kristen">kristen</option>
                            <option @selected(old('agama', $karyawan->agama) == 'protestan') class="text-capitalize" value="protestan">protestan</option>
                            <option @selected(old('agama', $karyawan->agama) == 'katolik') class="text-capitalize" value="katolik">katolik</option>
                            <option @selected(old('agama', $karyawan->agama) == 'hindu') class="text-capitalize" value="hindu">hindu</option>
                            <option @selected(old('agama', $karyawan->agama) == 'buddha') class="text-capitalize" value="buddha">buddha</option>
                            <option @selected(old('agama', $karyawan->agama) == 'konghucu') class="text-capitalize" value="konghucu">konghucu</option>

                        </x-select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <x-input name='tempat_lahir' type='text' :value="old('tempat_lahir', $karyawan->tempat_lahir)" />
                    </div>
                    <div class="col-lg-6">
                        <x-input name='tanggal_lahir' type='date' :value="old('tanggal_lahir', $karyawan->tanggal_lahir)" />
                    </div>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="masukan alamat lengkap">{{ old('alamat', $karyawan->alamat) }}</textarea>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <x-input name='hse_passport_number' type='text' :value="old('hse_passport_number',$karyawan->hse_passport_number)" />
                    </div>
                    <div class="col-lg-6">
                        <x-input name='masa_berlaku_hse_passport' type='date' :value="old('masa_berlaku_hse_passport',$karyawan->masa_berlaku_hse_passport)" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <x-input name='tanggal_mcu_terakhir' type='date' :value="old('tanggal_mcu_terakhir',$karyawan->tanggal_mcu_terakhir)" />
                    </div>
                    <div class="col-lg-6">
                        <div class="hstack gap-2">
                            <input type="hidden" readonly value="{{ $karyawan->hasil_mcu }}" name="old_hasil_mcu">
                            <div class="mb-3">
                                <label class="form-label">Hasil MCU</label>
                                <input type="file" name="hasil_mcu" class="form-control" value="{{ old('hasil_mcu', $karyawan->hasil_mcu) }}">
                            </div>
                            {{-- <x-input name='hasil_mcu' type='file' :value="old('hasil_mcu', $karyawan->hasil_mcu)" /> --}}
                            <label class="form-label ms-auto">Hasil MCU :</label>
                            <a href="{{ asset($karyawan->hasil_mcu) }}" class="btn btn-sm btn-outline-info rounded-3">
                                Lihat file
                            </a>
                        </div>
                    </div>
                </div>
                <div class="hstack gap-2">
                    <input type="hidden" readonly value="{{ $karyawan->siml }}" name="old_siml">
                    <div class="mb-3">
                        <label class="form-label">SIML</label>
                        <input type="file" name="siml" class="form-control" value="{{ old('siml',$karyawan->siml) }}">
                    </div>
                    {{-- <x-input name='siml' type='file' :value="old('siml',$karyawan->siml)" /> --}}
                    <label class="form-label">SIML :</label>
                    <a href="{{ asset($karyawan->siml) }}" class="btn btn-sm btn-outline-info rounded-3">
                        Lihat file
                    </a>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <x-input name='keterangan_mcu' type='text' :value="old('keterangan_mcu',$karyawan->keterangan_mcu)" />
                    </div>
                    <div class="col-lg-6">
                        <x-input name='tinggi_badan' type='number' :value="old('tinggi_badan',$karyawan->tinggi_badan)" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <x-input name='berat_badan' type='number' :value="old('berat_badan',$karyawan->berat_badan)" />
                    </div>
                    <div class="col-lg-6">
                        <x-input name='golongan_darah' type='text' :value="old('golongan_darah',$karyawan->golongan_darah)" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <x-input name='tanggal_bst_terakhir' type='date' :value="old('tanggal_bst_terakhir',$karyawan->tanggal_bst_terakhir)" />
                    </div>
                    <div class="col-lg-6">
                        <div class="hstack gap-2">
                            <input type="hidden" readonly value="{{ $karyawan->hasil_bst }}" name="old_hasil_bst" class="form-control">
                            <div class="mb-3">
                                <label class="form-label">Hasil BST</label>
                                <input type="file" name="hasil_bst" class="form-control" value="{{ old('hasil_bst',$karyawan->hasil_bst) }}">
                            </div>
                            {{-- <x-input name='hasil_bst' type='file' :value="old('hasil_bst')" /> --}}
                            <label class="form-label ms-auto">Hasil Bst :</label>
                            <a href="{{ asset($karyawan->hasil_bst) }}" class="btn btn-sm btn-outline-info rounded-3">
                                Lihat file
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <x-input name='apd_wajib' type='text' :value="old('apd_wajib', $karyawan->apd_wajib)" />
                    </div>
                    <div class="col-lg-6">
                    <x-select name='ukuran_coverall' label='ukuran coverall'>
                        <option @selected(old('ukuran_coverall', $karyawan->ukuran_coverall) == 'S') value="S">S</option>
                        <option @selected(old('ukuran_coverall', $karyawan->ukuran_coverall) == 'M') value="M">M</option>
                        <option @selected(old('ukuran_coverall', $karyawan->ukuran_coverall) == 'L') value="L">L</option>
                        <option @selected(old('ukuran_coverall', $karyawan->ukuran_coverall) == 'XL') value="XL">XL</option>
                        <option @selected(old('ukuran_coverall', $karyawan->ukuran_coverall) == '2XL') value="2XL">2XL</option>
                        <option @selected(old('ukuran_coverall', $karyawan->ukuran_coverall) == '3XL') value="3XL">3XL</option>
                        <option @selected(old('ukuran_coverall', $karyawan->ukuran_coverall) == '4XL') value="4XL">4XL</option>
                        <option @selected(old('ukuran_coverall', $karyawan->ukuran_coverall) == '5XL') value="5XL">5XL</option>
                        <option @selected(old('ukuran_coverall', $karyawan->ukuran_coverall) == '6XL') value="6XL">6XL</option>
                        <option @selected(old('ukuran_coverall', $karyawan->ukuran_coverall) == '7XL') value="7XL">7XL</option>
<!-- Tambahkan opsi sesuai kebutuhan dengan format yang sama -->

                    </x-select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <x-select name='ukuran_safety_shoes' label='ukuran safety shoes'>
                            <option @selected(old('ukuran_safety_shoes', $karyawan->ukuran_safety_shoes) == '38') value="38">38</option>
                            <option @selected(old('ukuran_safety_shoes', $karyawan->ukuran_safety_shoes) == '39') value="39">39</option>
                            <option @selected(old('ukuran_safety_shoes', $karyawan->ukuran_safety_shoes) == '40') value="40">40</option>
                            <option @selected(old('ukuran_safety_shoes', $karyawan->ukuran_safety_shoes) == '41') value="41">41</option>
                            <option @selected(old('ukuran_safety_shoes', $karyawan->ukuran_safety_shoes) == '42') value="42">42</option>
                            <option @selected(old('ukuran_safety_shoes', $karyawan->ukuran_safety_shoes) == '43') value="43">43</option>
                            <option @selected(old('ukuran_safety_shoes', $karyawan->ukuran_safety_shoes) == '44') value="44">44</option>
                            <option @selected(old('ukuran_safety_shoes', $karyawan->ukuran_safety_shoes) == '45') value="45">45</option>
                            <option @selected(old('ukuran_safety_shoes', $karyawan->ukuran_safety_shoes) == '46') value="46">46</option>
                        </x-select>
                    </div>
                    <div class="col-lg-6">
                        <x-select name='ukuran_safety_gloves' label='ukuran safety gloves'>
                            <option @selected(old('ukuran_safety_gloves', $karyawan->ukuran_safety_gloves) == 'S') value="S">S</option>
                            <option @selected(old('ukuran_safety_gloves', $karyawan->ukuran_safety_gloves) == 'M') value="M">M</option>
                            <option @selected(old('ukuran_safety_gloves', $karyawan->ukuran_safety_gloves) == 'L') value="L">L</option>
                            <option @selected(old('ukuran_safety_gloves', $karyawan->ukuran_safety_gloves) == 'XL') value="XL">XL</option>
                        </x-select>
                    </div>
                </div>
                <x-select name='ukuran_raincoat' label='ukuran raincoat'>
                    <option @selected(old('ukuran_raincoat', $karyawan->ukuran_raincoat) == 'S') value="S">S</option>
                    <option @selected(old('ukuran_raincoat', $karyawan->ukuran_raincoat) == 'M') value="M">M</option>
                    <option @selected(old('ukuran_raincoat', $karyawan->ukuran_raincoat) == 'L') value="L">L</option>
                    <option @selected(old('ukuran_raincoat', $karyawan->ukuran_raincoat) == 'XL') value="XL">XL</option>
                    <option @selected(old('ukuran_raincoat', $karyawan->ukuran_raincoat) == '2XL') value="2XL">2XL</option>
                    <option @selected(old('ukuran_raincoat', $karyawan->ukuran_raincoat) == '3XL') value="3XL">3XL</option>
                    <option @selected(old('ukuran_raincoat', $karyawan->ukuran_raincoat) == '4XL') value="4XL">4XL</option>
                    <option @selected(old('ukuran_raincoat', $karyawan->ukuran_raincoat) == '5XL') value="5XL">5XL</option>
                    <option @selected(old('ukuran_raincoat', $karyawan->ukuran_raincoat) == '6XL') value="6XL">6XL</option>
                    <option @selected(old('ukuran_raincoat', $karyawan->ukuran_raincoat) == '7XL') value="7XL">7XL</option>
                </x-select>
                <div class="row">
                    <div class="col-lg-6">
                        <x-input name='nomor_relasi_darurat' type='number' :value="old('nomor_relasi_darurat', $karyawan->nomor_relasi_darurat)" />
                    </div>
                    <div class="col-lg-6">
                        <x-input name='nama_relasi_darurat' type='text' :value="old('nama_relasi_darurat', $karyawan->nama_relasi_darurat)" />
                    </div>
                </div>
            </section>
            <button type="submit" class="btn btn-success float-end d-none" id="submit">
                </i><i class="bi-send"></i> Update
            </button>
        </form>
        <x-slot name='tombolFooter'>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-dark d-none" onclick="back()" id="back">
                    <i class="bi-arrow-left"></i> Back
                </button>
                <button type="button" class="btn btn-primary" onclick="next()" id="next">
                    <i class="bi-arrow-right"></i> Next
                </button>
            </div>
        </x-slot>
    </x-card>

    @push('script')
        <script>
            // function ubahTipe(){
            //     let pass = document.querySelector('#password');
            //     if (pass.type == 'password') {
            //         pass.type = 'text'
            //     } else {
            //         pass.type = 'password'
            //     }
            // }

            var part1 = document.querySelector('#part1');
            var part2 = document.querySelector('#part2');
            var sumbit = document.querySelector('#submit');
            var tombol_next = document.querySelector('#next');
            var tombol_back = document.querySelector('#back');
            var judul = document.querySelector('#judul');

            function next(){
                part1.classList.add('d-none');
                part2.classList.remove('d-none');
                submit.classList.remove('d-none');
                tombol_back.classList.remove('d-none');
                tombol_next.classList.add('d-none');
                judul.innerHTML = 'Data Biodata';
            }
            
            function back(){
                part2.classList.add('d-none');
                part1.classList.remove('d-none');
                submit.classList.add('d-none');
                tombol_back.classList.add('d-none');
                tombol_next.classList.remove('d-none');
                judul.innerHTML = 'Data Akun';
            }
        </script>
    @endpush
</x-template-app>