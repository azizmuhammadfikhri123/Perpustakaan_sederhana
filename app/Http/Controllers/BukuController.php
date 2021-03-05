<?php

namespace App\Http\Controllers;

use App\buku;
use App\penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = buku::all();
        return view('buku.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penerbit = penerbit::all();
        return view('buku.create', compact('penerbit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'bukuID' => 'required',
            'judul' => 'required',
            'penerbitID' => 'required',
            'pengarang' => 'required'
        ]);

        $buku = new buku();
        $buku->bukuID = $request->bukuID;
        $buku->judul = $request->judul;
        $buku->penerbitID = $request->penerbitID;
        $buku->pengarang = $request->pengarang;
        $buku->save();

        return redirect('/buku')->with('status', 'Data Buku Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit(buku $buku)
    {
        $penerbit = penerbit::all();
        return view('buku.edit', compact('buku', 'penerbit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, buku $buku)
    {
        $request->validate([
            'bukuID' => 'required',
            'judul' => 'required',
            'penerbitID' => 'required',
            'pengarang' => 'required'
        ]);

        buku::where('id', $buku->id)
            ->update([
                'bukuID' => $request->bukuID,
                'judul' => $request->judul,
                'penerbitID' => $request->penerbitID,
                'pengarang' => $request->pengarang
            ]);

        return redirect('/buku')->with('status', 'Data Buku Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(buku $buku)
    {
        buku::destroy($buku->id);
        return redirect('buku')->with('status', 'Data Buku Berhasil Dihapus!');
    }

    public function trash()
    {
        $sampah = buku::onlyTrashed()->get();
        return view('buku.trash', compact('sampah'));
    }

    public function restore($id)
    {
        $kembali = buku::onlyTrashed()->where('id', $id);
        $kembali->restore();
        return redirect('/buku')->with('status', 'Data Berhsil diRestore');
    }

    public function hapusPermanen($id)
    {
        $kembali = buku::onlyTrashed()->where('id', $id);
        $kembali->forceDelete();
        return redirect('/buku')->with('status', 'data telah berhasil di hapus permanen!');
    }
}
