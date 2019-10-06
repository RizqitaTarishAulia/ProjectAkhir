<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelAdmin;
use Validator;

class Admin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ModelAdmin::all();

        return view('admin', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_create');
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
            'nama' => 'required',
            'email' => 'required',
            'nohp' => 'required',
            'password' => 'required',
        ]);

        $data = new ModelAdmin();
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->nohp = $request->nohp;
        $data->password = $request->password;
        $data->save();

        return redirect()->route('admin.index')->with('alert_message', 'Berhasil menambah data!');
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
        $data = ModelAdmin::where('id', $id)->get();
        return view('admin_edit', compact('data'));
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
            'nama' => 'required',
            'email' => 'required',
            'nohp' => 'required',
            'password' => 'required',
        ]);

        $data = ModelAdmin::where('id', $id)->first();
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->nohp = $request->nohp;
        $data->password = $request->password;
        $data->save();

        return redirect()->route('admin.index')->with('alert_message', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ModelAdmin::where('id', $id)->first();
        $data->delete();

        return redirect()->route('admin.index')->with('alert_message', 'Berhasil menghapus data!');
    }

    public function __contruct(){
        $this->middleware('cek_login');
    }
}
