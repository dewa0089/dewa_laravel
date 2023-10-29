@extends('layout.main')
@section('title', 'Index')

@section('content')

    <h2>Halaman Mahasiswa MDP</h2>


    <table class="table table-striped">
        <tr>
            <th>NPM</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Foto</th>
            <th>Nama Prodi</th>
            <th>Nama Fakultas</th>
        </tr>
        @foreach ($mahasiswa as $item)
        <tr>
            <td>{{$item['npm']}}</td>
            <td>{{$item['nama']}}</td>
            <td>{{$item['tmpt_lahir']}}</td>
            <td>{{$item['tgl_lahir']}}</td>
            <td><img src="images/{{ $item['foto']}}" class="rounded-circle" width="70px" /></td>
            <td>{{$item['prodi']['nama']}}</td>
            <td>{{$item['prodi']['fakulitas']['nama']}}</td>
        </tr>

        @endforeach
    </table>

@endsection


