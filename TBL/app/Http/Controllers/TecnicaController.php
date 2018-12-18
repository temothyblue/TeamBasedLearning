<?php

namespace App\Http\Controllers;
use App\Repositories\ConexionAPI;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TecnicaController extends Controller
{
    protected $tecnicas;
    
    public function __construct(ConexionAPI $tecnicas)
    {
        $this->tecnicas = $tecnicas;
    }
    
    public function showall()
    {
        $tecnicas = $this->tecnicas->all("tecnica");
        dd($tecnicas);
        //return($tecnicas);
    }
        
    public function show($id)
    {
        $tecnicas = $this->tecnicas->find("tecnica",$id);
        dd($tecnicas);
        //return($tecnicas);
    }
    

    public function delete($id)
    {
        $tecnicas = $this->tecnicas->delete("tecnica",$id);
        dd($tecnicas);
        //return($tecnicas);
    }

    public function add() //pasar por parametro archivo JSON
    {
        $jsonraw = '{"habilidades_desarrolladas":["Expresion oral"],"modalidades":["Presencial"],"etiquetas":["Ingenieria","Expresion oral","Pedagogia en matematicas","Ingenieria civil en informatica","Programacion I"],"nombre":"nueva tecnica","descripcion":"Descripcion de la tecnica nueva","instrucciones":"Dato reservado en caso de necesitarlo","nrecom_participantes":10,"nrecom_integrantes_p_grupo":3,"nrecom_grupos":3,"tutor" :false,"complejidad":"Medio"}';
        $data = json_decode($jsonraw);
        
        $tecnicas = $this->tecnicas->add("tecnica",$data);
        dd($tecnicas);
        //return($tecnicas);
    }

    public function update($id) //pasar por parametro archivo JSON
    {
        $jsonraw = '{"habilidades_desarrolladas":["pan con queso "],"modalidades":["Presencial"],"etiquetas":["Ingenieria","Expresion oral","Pedagogia en matematicas","Ingenieria civil en informatica","Programacion I"],"nombre":"nueva tecnica","descripcion":"Descripcion de la tecnica nueva","instrucciones":"Dato reservado en caso de necesitarlo","nrecom_participantes":10,"nrecom_integrantes_p_grupo":3,"nrecom_grupos":3,"tutor" :false,"complejidad":"Medio"}';
        $data = json_decode($jsonraw);
        $tecnicas = $this->tecnicas->update("tecnica",$id,$data);
        dd($tecnicas);
        //return($tecnicas);
    }
}
?>