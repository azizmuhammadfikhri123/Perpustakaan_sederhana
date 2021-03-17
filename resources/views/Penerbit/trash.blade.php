@extends('layout.main')
@section('title', 'Halaman Riwayat')

@section('container')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Kumpulan Data Penerbit</h6>
                <a href="/dashboard" class="btn btn-primary float-right">Kembali</a>
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
                                <th>ID PENERBIT</th>
                                <th>NAMA PENERBIT</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sampah as $item)
                            <tr class="text-center">
                                <td>{{$item->penerbitID}}</td>
                                <td>{{$item->nama}}</td>
                                <td>
                                    <a href="/penerbit/trash/{{$item->id}}" class="btn btn-warning">Restore</a>
                                    {{-- <a href="/penerbit/trash/delete/{{$item->id}}" class="btn btn-danger d-inline">Hapus Permanen</a> --}}

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

