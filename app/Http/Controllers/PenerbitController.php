<?php

namespace App\Http\Controllers;

use App\penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenerbitController extends Controller
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
        $data = penerbit::all();
        return view('penerbit.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penerbit.create', compact('data'));
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
            'penerbitID' => 'required',
            'nama' => 'required'
        ]);


        $pnrbt = new penerbit();
        $pnrbt->penerbitID = $request->penerbitID;
        $pnrbt->nama = $request->nama;
        $pnrbt->save();

        return redirect('/dashboard')->with('status', 'Data Penerbit Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\penerbit  $penerbit
     * @return \Illuminate\Http\Response
     */
    public function show(penerbit $penerbit)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\penerbit  $penerbit
     * @return \Illuminate\Http\Response
     */
    public function edit(penerbit $penerbit)
    {

        return view('penerbit.edit', compact('penerbit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\penerbit  $penerbit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, penerbit $penerbit)
    {
        $request->validate([
            'penerbitID' => 'required',
            'nama' => 'required'
        ]);

        penerbit::where('id', $penerbit->id)
            ->update([
                'penerbitID' => $request->penerbitID,
                'nama' => $request->nama
            ]);

        return redirect('/dashboard')->with('status', 'Data Penerbit Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\penerbit  $penerbit
     * @return \Illuminate\Http\Response
     */
    public function destroy(penerbit $penerbit)
    {
        penerbit::destroy($penerbit->id);
        return redirect('/dashboard')->with('status', 'Data Penerbit Berhasil Dihapus!');
    }

    public function trash()
    {
        $sampah = penerbit::onlyTrashed()->get();
        return view('penerbit.trash', compact('sampah'));
    }

    public function restore($id)
    {
        $kembali = penerbit::onlyTrashed()->where('id', $id);
        $kembali->restore();
        return redirect('/dashboard');
    }
}
