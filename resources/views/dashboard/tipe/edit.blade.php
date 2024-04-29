@extends('dashboard.layout.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="py-3 text-center">Edit Data Tipe</h3>
    <form action="/tipe-dashboard/{{$tipes->id}}" method="POST">
    @method('PUT')    
    @csrf
        <div class="mb-3">
            <label for="nim" class="form-label">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Input nama" value="{{old('nama',$tipes->nama)}}">
            @error('nama')
                {{$message}}
            @enderror
            </div>
            <div class="mb-3">
            <label for="deksripsi" class="form-label">Deksripsi</label>
            <textarea name="deskripsi" id="deksripsi" rows="2" width="500x" class="form-control" required>{{old('deksripsi',$tipes->deskripsi)}} </textarea>
            @error('deksripsi')
                {{$message}}
            @enderror
        </div>
            
        <button class="btn btn-success" type="submit">Submit</button>
    </form>
        </div>
    </div>
@endsection