@extends('layout.main')
@section('container')
<br/>
<center><h1>Data Jurusan</h1></center>
<a href="/mahasiswa/create" class="btn btn-primary">Tambah Data</a>
<table class="table">
    <thead>
    <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Jurusan</th>
        <!-- <th scope="col">Aksi</th> -->
    </tr>
</thead>
    @foreach ($jurusans as $jurusan)
    <tbody>
    <tr>
        <td scope="row">{{ $loop->iteration }}</td>
        <td>{{ $jurusan->nama }}</td>
        <!-- <td>
            <a href="" class="btn btn-warning">Edit</a>
            <a href="" class="btn btn-danger">Delete</a>

        </td> -->
       </tr>
    @endforeach
</tbody>
</table>
@endsection
