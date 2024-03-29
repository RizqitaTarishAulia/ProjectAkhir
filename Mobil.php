<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelMobil;
use Validator;

class Mobil extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ModelMobil::all();

        return view('mobil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mobil_create');
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
            'plat_mobil' => 'required',
            'nama_mobil' => 'required',
            'jml' => 'required',
        ]);

        $data = new ModelMobil();
        $data->kode_mobil = $request->kode_mobil;
        $data->plat_mobil = $request->plat_mobil;
        $data->nama_mobil = $request->nama_mobil;
        $data->jml = $request->jml;
        $data->save();

        return redirect()->route('mobil.index')->with('alert_message', 'Berhasil menambah data!');
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
        $data = ModelMobil::where('id', $id)->get();
        return view('mobil_edit', compact('data'));
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
            'plat_mobil' => 'required',
            'nama_mobil' => 'required',
            'jml' => 'required',
        ]);

        $data = ModelMobil::where('id', $id)->first();
        $data->kode_mobil = $request->kode_mobil;
        $data->plat_mobil = $request->plat_mobil;
        $data->nama_mobil = $request->nama_mobil;
        $data->jml = $request->jml;
        $data->save();

        return redirect()->route('mobil.index')->with('alert_message', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ModelMobil::where('id', $id)->first();
        $data->delete();

        return redirect()->route('mobil.index')->with('alert_message', 'Berhasil menghapus data!');
    }
}
