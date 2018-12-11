<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResourses;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use DB;

class loginController extends BaseController
{
    public function login(Request $req){
    	$username = $req->input('username');
    	$password = $req->input('password');

    	$checklogin = DB::select('SELECT * FROM usuario WHERE nom_us=:nombre and pass=:password',['nombre'=>$username,'password'=>$password]);
    	if(count($checklogin)>0){
    		foreach ($checklogin as $o) {
    			Session::put('user',$o->nom_us);
    			Session::put('id', $o->id_us);
                Session::put('level',$o->nivel);
    		}
            $data = DB::select('SELECT id_alu FROM alumno WHERE nom_alu=:nombre',['nombre'=>Session::get('user')]);
            if(count($data)>0){
                foreach ($data as $o) {
                    echo $o->id_alu;
                    Session::put('rut',$o->id_alu);
                }
            }
            else{
                echo "error";
            }
    		return redirect('/');
    	}
    	else{
    		return redirect('/');
    	}
    	
    }
    public function logout(Request $req){
    	Session::forget('user');
    	Session::forget('id');
        Session::forget('level');
        Session::forget('rut');
    	return redirect('/');
    }
}

?>