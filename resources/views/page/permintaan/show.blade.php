<x-template-app>
    <x-card judul='Detail Permintaan'>
        @if (empty($permintaan->status))
            <div class="card-body">
                <h4 class="text-capitalize text-center"><i class="bi-volume-down"></i> Anda belum mengajukan permintaan</h4>
            </div>
        @else
            <div class="row">
                <div class="col-1">
                    <div class="position-relative border-start border-5 translate-x my-5 ms-3" style="height: 300px">
                        <div class="position-absolute top-0 start-0 translate-middle">
                            <div class="btn btn-success bg-gradient rounded-circle">
                                <i class="bi bi-card-text fs-5"></i>
                            </div>
                        </div>
                    
                        <div class="position-absolute top-50 start-0 translate-middle">
                            <div class="btn btn-secondary bg-gradient rounded-circle">
                                <i class="bi bi-hourglass-split fs-5"></i>
                            </div>
                        </div>
                        
                        <div class="position-absolute top-100 start-0 translate-middle">
                            <div class="btn btn-secondary bg-gradient rounded-circle">
                                <i class="bi bi-truck fs-5"></i>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="col-10">
                    <div class="alert alert-info" role="alert">
                        
                        <strong> 
                            <i class="bi-card-text"></i>
                        </strong> 
                        Menunggu proses persetujuan pusat
                    </div>
                </div>
            </div>
        @endif
    </x-card>
</x-template-app>
