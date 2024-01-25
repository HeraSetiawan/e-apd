<x-template-app>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Form Pemberian APD</h4>
            <small class="card-text text-muted">isi sesuai apd yang diberikan</small>
            <hr>
            <form action="{{ route('pemberian apd kru') }}" method="post" enctype="multipart/form-data">
                @csrf
                <x-select name="karyawan_id" label="Pilih Kru penerima">
                    @foreach ($list_kru as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_lengkap }}</option>
                    @endforeach
                </x-select>
                <table class="table table-striped">
                    <tbody>
                        @foreach ($stok_area as $item)
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-8 mb-3 text-capitalize">
                                            <label for="" class="form-label">{{ $loop->iteration }}. {{ $item->nama_barang  }}</label>
                                            <input type="hidden" value="{{ $item->id }}" name="id_barang[]">
                                            <input max="{{ $item->qty }}" type="text" class="form-control" name="qty[]" value="0" required/>
                                        </div>
                                        <div class="col-lg-4">
                                            <b>Qty yang tersedia : </b>
                                            <h3 class="badge bg-success">{{ $item->qty }}</h3>
                                        </div>
                                    </div>
                                    <br>
                                </td>
                            </tr>
        
                        @endforeach
                    </tbody>
                </table>
                <div class="mb-3">
                    <label for="file_permintaan_apd" class="form-label">Upload formulir tanda terima</label>
                    <input
                    required
                        type="file"
                        class="form-control"
                        name="file_permintaan_apd"
                        id="file_permintaan_apd"
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    <small id="helpId" class="form-text text-muted">upload file tanda terima yang telah di isi disini</small>
                </div>
                
                <button type="submit" class="btn btn-primary float-end">
                    Kirim 
                </button>
            </form>
            
        </div>
    </div>
    
</x-template-app>