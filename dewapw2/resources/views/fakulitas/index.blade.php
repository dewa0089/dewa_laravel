@extends('layout.main')
@section('title', 'Fakulitas')

@section('content')

    <h2>Halaman Fakulitas</h2>


    <table class="table table-striped">
        <tr>
            <th>Nama</th>
        </tr>
        @foreach ($fakulitas as $item)
        <tr>
            <td>{{$item['nama']}}</td>
        </tr>

        @endforeach
    </table>

@endsection
