@extends('member.layout.main')
@section('container')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="py-3 text-center">Produk baru</h3>
    <form action="/produk-member" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="image" class="form-label">Thumbnail</label>
            <input type="file" id="image" name="image" class=" form-control @error('image') is-invalid @enderror" accepts="image/*" value="{{old('image')}}">
        </div>
        @error('image')
                {{$message}}
            @enderror
        <div class="mb-3">
            <label for="title" class="form-label">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Input nama" value="{{old('nama')}}">
            @error('nama')
                {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat dan Deskripsi </label>
            <textarea name="alamat" id="alamat" rows="2" width="500x" class="form-control" required>{{old('alamat')}} </textarea>
            @error('alamat')
                {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label for="tipe" class="form-label">Tipe</label>
            <select class="form-select" name="tipe_id" aria-label="Default select example">
                @foreach ($tipes as $tipe)
                    <option value="{{$tipe->id}}">{{$tipe->nama}}</option>
                @endforeach
              </select>
        </div>
        <div class="alert alert-success" role="alert">
        {{$tipe->deskripsi}}
        </div>
        <div class="mb-3">
            <label for="tipe" class="form-label">Gender</label>
            <select class="form-select" name="gender_id" aria-label="Default select example">
                @foreach ($genders as $gender)
                    <option value="{{$gender->id}}">{{$gender->nama}}</option>
                @endforeach
              </select>
        </div>
        <div class="mb-3">
            <label for="provinsi" class="form-label">Provinsi</label>
            <select class="form-select" name="provinsi_id" aria-label="Default select example">
                @foreach ($provinsis as $provinsi)
                    <option value="{{$provinsi->id}}">{{$provinsi->nama}}</option>
                @endforeach
              </select>
        </div>
        <div class="mb-3">
            <label for="kota" class="form-label">Kota</label>
            <select class="form-select" name="kota_id" aria-label="Default select example">
                @foreach ($kotas as $kota)
                    <option value="{{$kota->id}}">{{$kota->nama}}</option>
                @endforeach
              </select>
        </div>
        <div class="mb-3">
            <label for="tipe" class="form-label">kecamatan</label>
            <select class="form-select" name="kecamatan_id" aria-label="Default select example">
                @foreach ($kecamatans as $kecamatan)
                    <option value="{{$kecamatan->id}}">{{$kecamatan->nama}}</option>
                @endforeach
              </select>
        </div>
        <div class="mb-3">
            <label for="tipe" class="form-label">Daerah</label>
            <select class="form-select" name="daerah_id" aria-label="Default select example">
                @foreach ($daerahs as $daerah)
                    <option value="{{$daerah->id}}">{{$daerah->nama}}</option>
                @endforeach
              </select>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga per bulan</label>
            <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" placeholder="Input harga" value="{{old('harga')}}">
            @error('harga')
                {{$message}}
            @enderror
        </div>
        <button class="btn btn-success" type="submit">Submit</button>
    </div>
    </form>
        </div>
    </div>
    <script src="/js/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#alamat' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection