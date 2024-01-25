<x-template-app>
    @php
    switch (auth()->user()->role) {
        case 'SS':
            $path = '/admin';
        break;
        default:
            $path = '';
        break;
    }   
    @endphp
    @if(session('pesan'))
        <x-alert :pesan="session('pesan')" :warna="session('warna')" />
    @endif
    
    <x-card judul='Data Admin'>
        <x-slot name='tombol'>
                <a href='{{ url("/karyawan$path/create") }}' class="btn btn-primary rounded-pill"><i class="bi-plus"></i> Buat</a>
        </x-slot>
        <div class="table-responsive">
            <table class="table" id="dataTable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Role</th>
                        <th>NIK</th>
                        <th>Email</th>
                        <th>Detail</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($karyawan as $key => $item)
                    <tr class="text-capitalize">
                        <td>{{ $loop->iteration }}.</td>
                        <td>
                            @if ($item->foto != null)
                            <a href="{{ url($item->foto) }}">
                                <img src="{{ Asset($item->foto) }}" width="40"></td>
                            </a>
                            @else
                            <img src="{{ url('https://placehold.co/40') }}"></td>
                            @endif
                        <td>{{ $item->nama_lengkap }}</td>
                        <td>
                            @switch($item->role)
                                @case('SA')
                                    {{ 'Super Admin' }}
                                    @break
                                @case('SS')
                                    {{ 'Admin Area' }}
                                    @break
                                @case('AS')
                                    {{ 'Asisent Gudang' }}
                                    @break
                                @default
                                    {{ 'KRU' }}
                            @endswitch
                        </td>
                        <td><span class="badge bg-primary">{{ $item->nik }}</span></td>
                        @if ($item->email != "it@gmail.com")
                            <td class="text-lowercase">{{ $item->email }}</td>
                            <td>
                                <a href='{{ url("karyawan$path", $item->id) }}' class="btn btn-warning rounded-circle"><i class="bi-eye"></i></a>
                            </td>
                            <td> 
                                <a href='{{ url("karyawan$path/".$item->id."/edit") }}' class="btn btn-success rounded-circle"><i class="bi-pen"></i></a>
                            </td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $key }}" class="btn btn-danger rounded-circle"><i class="bi-trash"></i></a>
                                <x-modal :$key >
                                    <p class="fw-bold">
                                        Apakah anda yakin ingin menghapus akun ?
                                    </p> 
                                    <form action='{{ url("karyawan$path", $item->id) }}' method="post">
                                    @csrf
                                    @method('delete')
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </div>
                                    </form>
                                </x-modal>
                            </td>
                        @else
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </x-card>
</x-template-app>