@extends('layout.main')
@section('title', 'Index')

@section('content')

@endsection
<h2>Halaman Mahasiswa MDP</h2>


<table class="table table-striped">
  <tr>
    <th>NPM</th>
    <th>Nama</th>
  </tr>
  @foreach ($mahasiswa as $item)
  <tr>
    <td>{{$item['npm']}}</td>
    <td>{{$item['nama']}}</td>
  </tr>

  @endforeach
</table>



