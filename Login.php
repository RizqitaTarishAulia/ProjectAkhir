<?php

namespace App\Http\Controllers;
use App\ModelAdmin;
use Illuminate\Http\Request;
use Session;

class Login extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function cek(Request $req){
        $this->validate($req,[
          'email'=>'required',
          'password'=>'required'
        ]);
        $proses=ModelAdmin::where('email',$req->email)->where('password',$req->password)->first();
        if(count($proses)>0){
          Session::put('id_admin', $proses->id_admin);
          Session::put('email', $proses->email);
          Session::put('password', $proses->password);
          Session::put('nama', $proses->nama);
          Session::put('login_status', true);
          return redirect('/dash');
        } else {
          Session::flash('alert_pesan', 'Username dan Password tidak cocok');
          return redirect('login');
        }
      }
      public function logout(){
        Session::flush();
        return redirect('login');
      }
}
