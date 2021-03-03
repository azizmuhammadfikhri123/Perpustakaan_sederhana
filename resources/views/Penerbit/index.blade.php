@extends('layout.main')
@section('title', 'Halaman Penerbit')

@section('container')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Kumpulan Data Penerbit</h6>
                <a href="/create" class="btn btn-primary float-right">New Penerbit</a>
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
                            @foreach ($data as $item)
                            <tr class="text-center">
                                <td>{{$item->penerbitID}}</td>
                                <td>{{$item->nama}}</td>
                                <td>
                                    <a href="/penerbit/edit/{{$item->id}}" class="btn btn-warning">Edit</a>
                                    <form action="/penerbit/{{$item->id}}/delete" method="post" class="d-inline">
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
    
