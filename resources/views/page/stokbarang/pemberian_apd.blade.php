<x-template-app>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Form Pemberian APD</h4>
            <small class="card-text text-muted">isi sesuai apd yang diberikan</small>
            <hr>
            <table class="table table-striped">
                <tbody>
                    @foreach ($stokBarang as $item)
                        <tr>
                            <td>
                                <div class="col-8 mb-3 text-capitalize">
                                    <label for="" class="form-label">{{ $loop->iteration }}. {{ $item->stokBarang->nama_barang  }}</label>
                                    <input type="text" class="form-control" name="{{ $item->id }}" value="0" required/>
                                </div>
                                <div class="col-lg-4">
                                    {{-- {{ $item-> }} --}}
                                </div>
                                <br>
                            </td>
                        </tr>
    
                    @endforeach
                </tbody>

            </table>
            <button type="submit" class="btn btn-primary">
                Kirim 
            </button>
            
        </div>
    </div>
    
</x-template-app>