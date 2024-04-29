@extends('layout.main')
@section('container')
<br/>
<center><h1>Data Mahasiswa</h1></center>
@if (session()->has('pesan'))
<div class="alert alert-success" role="alert">
 {{session('pesan')}}
</div>

@endif
<!-- <a href="/jurusan/create" class="btn btn-primary">Tambah Data</a> -->
<table class="table">
    <thead>
    <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <!-- <th scope="col">Aksi</th> -->
    </tr>
</thead>
    @foreach ($jurusans as $jurusan)
    <tbody>
    <tr>
        <td scope="row">{{ $loop->iteration }}</td>
        <td>{{ $jurusan->nama }}</td>
        <!-- <td>
            <a href="/jurusan/{{ $jurusan->id }}/edit" class="btn btn-warning">Edit</a>
            <form action="/jurusan/{{ $jurusan->id }}" method="POST" class="d-inline">
                @method('DELETE')
                @csrf
                
                <button class="btn btn-danger" type="submit" onclick="return confirm
                ('Yakin akan menghapus data ?')">Delete</button>
</form>
        

        </td> -->
       </tr>
    @endforeach
</tbody>
</table>
{{ $jurusans->links()}}
@endsection
