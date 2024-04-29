@extends('dashboard.layout.main')
@section('container')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="py-3 text-center">Entri Data Tipe</h3>
    <form action="/tipe-dashboard" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Input nama" value="{{old('nama')}}">
            @error('nama')
                {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deksripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="2" width="500x" class="form-control" required>{{old('deskripsi')}} </textarea>
            @error('deskripsi')
                {{$message}}
            @enderror
        </div>
        <button class="btn btn-success" type="submit">Submit</button>
    </form>
        </div>
    </div>
@endsection