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

class responseController extends BaseController
{
    public function listRom(Request $req){
    	$data = DB::select('SELECT alumno.id_sal, alumno.cod_cur, sala.time_sala,sala.nom_tema FROM alumno INNER JOIN sala on alumno.id_sal=sala.id_sal WHERE alumno.id_alu=:rut',['rut'=>Session::get('rut')]);
    	if(count($data)>0){
    		return view('alumno',compact('data'));
    	}
    	else{
            return view('alumno');
    	}
    }
}
?>