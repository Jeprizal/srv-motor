@extends('layout.main')
@section('container')
<br/>
<center><h1>Data Mahasiswa</h1></center>
@if (session()->has('pesan'))
<div class="alert alert-success" role="alert">
 {{session('pesan')}}
</div>

@endif
<table class="table">
    <thead>
    <tr>
        <th scope="col">No</th>
        <th scope="col">NIM</th>
        <th scope="col">Nama</th>
        <th scope="col">JK</th>
        <th scope="col">Jurusan</th>
        <th scope="col">Alamat</th>
    </tr>
</thead>
    @foreach ($mahasiswas as $mahasiswa)
    <tbody>
    <tr>
        <td scope="row">{{ $loop->iteration }}</td>
        <td>{{ $mahasiswa->nim }}</td>
        <td>{{ $mahasiswa->nama }}</td>
        <td>{{ $mahasiswa->jenis_kelamin }}</td>
        <td>{{ $mahasiswa->jurusan->nama }}</td>
        <td>{{ $mahasiswa->alamat }}</td>

       </tr>
    @endforeach
</tbody>
</table>
{{ $mahasiswas->links()}}
@endsection
