@extends('dashboard.layout.main')
@section('container')
<br/>
<center><h1>Data Mahasiswa</h1></center>
@if (session()->has('pesan'))
<div class="alert alert-success" role="alert">
 {{session('pesan')}}
</div>

@endif
<a href="/mahasiswa-dashboard/create" class="btn btn-primary">Tambah Data</a>
<table class="table">
    <thead>
    <tr>
        <th scope="col">No</th>
        <th scope="col">NIM</th>
        <th scope="col">Nama</th>
        <th scope="col">JK</th>
        <th scope="col">Jurusan</th>
        <th scope="col">Alamat</th>
        <th scope="col">Aksi</th>
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
        <td>
            <a href="/mahasiswa-dashboard/{{ $mahasiswa->id }}/edit" class="btn btn-warning">Edit</a>
            <form action="/mahasiswa-dashboard/{{ $mahasiswa->id }}" method="POST" class="d-inline">
                @method('DELETE')
                @csrf
                
                <button class="btn btn-danger" type="submit" onclick="return confirm
                ('Yakin akan menghapus data ?')">Delete</button>
</form>
        

        </td>
       </tr>
    @endforeach
</tbody>
</table>
{{ $mahasiswas->links()}}
@endsection
