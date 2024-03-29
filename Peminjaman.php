<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelPeminjaman;
use Validator;
use App\ModelMobil;

class Peminjaman extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ModelPeminjaman::all();

        return view('peminjaman', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('peminjaman_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_mobil' => 'required',
            'jml' => 'required',
        ]);

        $data = new ModelPeminjaman();
        $data->kode_mobil = $request->kode_mobil;
        $data->jml = $request->jml;
        $data->save();

        //ini merubah data dari controller barang
        $dataPinjam = ModelMobil::where('kode_mobil', $request->kode_mobil)->first();

        $dataPinjam->jml = $dataPinjam->jml - $request->jml;
        $dataPinjam->save();

        return redirect()->route('peminjaman.index')->with('alert_message', 'Berhasil menambah data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ModelPeminjaman::where('id', $id)->get();
        return view('peminjaman_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_mobil' => 'required',
            'jml' => 'required',
        ]);

        $data = ModelPeminjaman::where('id', $id)->first();
        $data->kode_mobil = $request->kode_mobil;
        $data->jml = $request->jml;
        $data->save();

        return redirect()->route('peminjaman.index')->with('alert_message', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ModelPeminjaman::where('id', $id)->first();
        $data->delete();

        return redirect()->route('peminjaman.index')->with('alert_message', 'Berhasil menghapus data!');
    }
}
