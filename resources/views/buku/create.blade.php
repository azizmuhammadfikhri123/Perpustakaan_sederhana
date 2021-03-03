@extends('layout.main')
@section('title', 'Halaman New Buku')

@section('container')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Halaman Tambah Data</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="/buku/create">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Buku ID</label>
                                    <input type="text" class="form-control @error('bukuID') is-invalid @enderror" id="bukuID" name="bukuID" value="{{old('bukuID')}}" placeholder="Masukan ID Buku">
                                    @error('bukuID')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror                       
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Judul</label>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{old('judul')}}" placeholder="Masukan Judul">
                                    @error('judul')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror 
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Penerbit ID</label>
                                    <select class="form-control @error('penerbitID') is-invalid @enderror" id="penerbitID" name="penerbitID">
                                    <option>Pilih Penerbit</option>
                                    @foreach ($penerbit as $item)                                
                                        <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @endforeach
                                    </select>
                                    @error('penerbitID')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror 
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Pengarang</label>
                                    <input type="text" class="form-control @error('pengarang') is-invalid @enderror" id="pengarang" name="pengarang" value="{{old('pengarang')}}" placeholder="Masukan Pengarang">
                                    @error('pengarang')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="/buku" class="btn btn-info">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
    
