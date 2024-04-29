@extends('dashboard.layout.main')
@section('container')
    <br />
    <center>
        <h1>Data Produk</h1>
    </center>
    @if (session()->has('pesan'))
        <div class="alert alert-success" role="alert">
            {{ session('pesan') }}
        </div>
    @endif
    <a href="/produk-dashboard/create" class="btn btn-primary">Tambah Data</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Harga</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        @foreach ($produks as $produk)
            <tbody>
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $produk->nama }}</td>
                    <td>{{ $produk->user->name }}</td>
                    <td>{!! $produk->alamat !!}</td>
                    <td>{{ is_null($produk->tipe) ? '-' : $produk->tipe->nama }}</td>
                    <td>{{ is_null($produk->gender) ? '-' : $produk->gender->nama }}</td>
                    <td>{{ is_null($produk->provinsi) ? '-' : $produk->provinsi->nama }}</td>
                    <td>{{ is_null($produk->kota) ? '-' : $produk->kota->nama }}</td>
                    <td>{{ is_null($produk->kecamatan) ? '-' : $produk->kecamatan->nama }}</td>
                    <td>{{ is_null($produk->daerah) ? '-' : $produk->daerah->nama }}</td>
                    <td>{{ $produk->harga }}</td>
                    <td>{{ $produk->created_at }}</td>
                    <td>
                        <a href="/produk-dashboard/{{ $produk->id }}/edit" class="btn btn-warning">Edit</a>
                        <form action="/produk-dashboard/{{ $produk->id }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf

                            <button class="btn btn-danger" type="submit"
                                onclick="return confirm
                ('Yakin akan menghapus data ?')
">Delete</button>
                        </form>


                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
    {{ $produks->links() }}
@endsection
