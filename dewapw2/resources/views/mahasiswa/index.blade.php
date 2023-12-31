@extends('layout.main')
@section('title', 'Index')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Mahasiswa</h4>
                    <p class="card-description">
                        Ini Adalah Daftar Mahasiswa Universitas Multi Data Palembang

                    </p>
                    @can('create', App\Mahasiswa::class)
                        <a href="{{ route('mahasiswa.create') }}" class="btn btn-outline-danger btn-icon-text"><i
                                class="mdi mdi-upload btn-icon-prepend"></i> Tambah Data
                        </a>
                    @endcan
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>NPM</th>
                                    <th>Nama</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Foto</th>
                                    <th>Nama Prodi</th>
                                    <th>Nama Fakultas</th>
                                    @can('create', App\Mahasiswa::class)
                                        <th>Aksi</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mahasiswa as $item)
                                    <tr>
                                        <td>{{ $item['npm'] }}</td>
                                        <td>{{ $item['nama'] }}</td>
                                        <td>{{ $item['tmpt_lahir'] }}</td>
                                        <td>{{ $item['tgl_lahir'] }}</td>
                                        <td>{{ $item['jk'] }}</td>
                                        <td><img src="foto/{{ $item['foto'] }}" class="rounded-circle" width="70px" />
                                        </td>
                                        <td>{{ $item['prodi']['nama'] }}</td>
                                        <td>{{ $item['prodi']['fakulitas']['nama'] }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('mahasiswa.edit', $item->id) }}">
                                                    @can('update', $item)
                                                        <button class="btn btn-success btn-sm mx-3">Edit</button>
                                                    @endcan
                                                </a>
                                                <form method="POST" action="{{ route('mahasiswa.destroy', $item->id) }}">
                                                    @method('delete')
                                                    @csrf
                                                    @can('delete', $item)
                                                        <button type="submit" class="btn btn-danger btn-sm show_confirm"
                                                            data-toggle="tooltip" title='Delete'
                                                            data-nama='{{ $item->nama }}'>Hapus Data</button>
                                                    @endcan


                                                </form>
                                            </div>


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        @if (Session::get('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif
    </script>
@endsection
