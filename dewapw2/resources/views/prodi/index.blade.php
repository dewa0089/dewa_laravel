@extends('layout.main')
@section('title', 'Prodi')

@section('content')

    <h2>Halaman Prodi</h2>


    <table class="table table-striped">
        <tr>
            <th>Nama Prodi</th>
            <th>Nama Fakulitas</th>
        </tr>
        @foreach ($prodi as $item)
        <tr>
            <td>{{$item['nama']}}</td>
            <td>{{$item['fakulitas']['nama']}}</td>
        </tr>

        @endforeach
    </table>

@endsection
