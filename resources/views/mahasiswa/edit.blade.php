@extends('layout.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="py-3 text-center">Edit Data Mahasiswa</h3>
    <form action="/mahasiswa/{{$mahasiswas->id}}" method="POST">
    @method('PUT')    
    @csrf
        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" placeholder="Input nim" value="{{old('nim',$mahasiswas->nim)}}">
            @error('nim')
                {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama mahasiswa</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Input nama" value="{{old('nama',$mahasiswas->nama)}}">
            @error('nama')
                {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis kelamin</label> <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="L" {{old('jenis_kelamin',$mahasiswas->jenis_kelamin)=='L' ? 'checked' : ''}} checked>
                <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="P" {{old('jenis_kelamin',$mahasiswas->jenis_kelamin)=='P' ? 'checked' : ''}}>
                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
              </div>
        </div>
        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <select class="form-select" name="jurusan_id" aria-label="Default select example">
                @foreach ($jurusans as $jurusan)
                @if(old('jurusan_id',$mahasiswas->jurusan_id)==$jurusan->id)
                <option value="{{$jurusan->id}}" selected="selected">{{$jurusan->nama}}</option>
                @else
                    <option value="{{$jurusan->id}}">{{$jurusan->nama}}</option>
                    @endif
                @endforeach
              </select>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="" rows="3" class="form-control">{{old('alamat',$mahasiswas->alamat)}}</textarea>
            @error('alamat')
                {{$message}}
            @enderror
        </div>
        <button class="btn btn-success" type="submit">Update</button>
    </div>
    </form>
        </div>
    </div>
@endsection