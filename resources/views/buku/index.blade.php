@extends('layout.main')
@section('title', 'Halaman Buku')

@section('container')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Kumpulan Data Buku</h6>
                <a href="/create/buku" class="btn btn-primary float-right">New Buku</a>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>   
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>BUKU ID </th>
                                <th>JUDUL</th>
                                <th>PENERBIT ID</th>
                                <th>PENGARANG</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $dt)
                            <tr class="text-center">
                                <td>{{$dt->bukuID}}</td>
                                <td>{{$dt->judul}}</td>
                                <td>{{$dt->penerbit->nama}}</td>
                                <td>{{$dt->pengarang}}</td>
                                <td>
                                    <a href="/buku/{{$dt->id}}/edit" class="btn btn-warning">Edit</a>
                                    <form action="/buku/delete/{{$dt->id}}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger ">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
    
