@extends('layout.main')
@section('title', 'Halaman Update')

@section('container')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Halaman Update data</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="/penerbit/{{$penerbit->id}}/update">
                                @method('patch')
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ID Penerbit</label>
                                    <input type="text" class="form-control @error('penerbitID') is-invalid @enderror" id="penerbitID" name="penerbitID" value="{{$penerbit->penerbitID}}" placeholder="Masukan ID Penerbit"> 
                                    @error('penerbitID')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror                       
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama Penerbit</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{$penerbit->nama}}" placeholder="Masukan Nama Penerbit">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="/dashboard" class="btn btn-info">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
    
