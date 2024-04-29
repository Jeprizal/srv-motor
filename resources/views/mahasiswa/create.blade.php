@extends('layout.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="py-3 text-center">Entri Data Mahasiswa</h3>
    <form action="/mahasiswa" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" placeholder="Input nim" value="{{old('nim')}}">
            @error('nim')
                {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama mahasiswa</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Input nama" value="{{old('nama')}}">
            @error('nama')
                {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis kelamin</label> <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="L" {{old('jenis_kelamin')}} checked>
                <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="P">
                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
              </div>
        </div>
        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <select class="form-select" name="jurusan_id" aria-label="Default select example">
                @foreach ($jurusans as $jurusan)
                    <option value="{{$jurusan->id}}">{{$jurusan->nama}}</option>
                @endforeach
              </select>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="" rows="3" class="form-control">{{old('alamat')}}</textarea>
            @error('alamat')
                {{$message}}
            @enderror
        </div>
        <button class="btn btn-success" type="submit">Submit</button>
    </div>
    </form>
        </div>
    </div>
@endsection