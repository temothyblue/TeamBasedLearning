<?php
    namespace App\Http\Controllers;
    use App\Repositories\ConexionAPI;
    use Illuminate\Http\Request;
    use GuzzleHttp\Client;

    class UsuarioController extends Controller
    {
        protected $usuario;
        
        public function __construct(ConexionAPI $usuario)
        {
            $this->usuario = $usuario;
        }

        public function showall()
        {
            $usuario = $this->usuario->all("usuario");
            dd($usuario);
            //return($tecnicas);
        }
            
        public function show($id)
        {
            $usuario = $this->usuario->find("usuario",$id);
            dd($usuario);
            //return($tecnicas);
        }
        

        public function delete($id)
        {
            $usuario = $this->usuario->delete("usuario",$id);
            dd($usuario);
            //return($tecnicas);
        }

        public function login(Request $req)
        {
            $usuario = $this->usuario->all("usuario");
            //echo var_dump($usuario[0]);
            $i=0;
            $aux=1;
            while($aux){
                if($usuario[$i]!=null){
                    foreach ($usuario[$i] as $us) {
                        echo $us->puntos_actividad;
                    }
                    $i=$i+1;
                }
                else{
                    $aux=0;
                }

            }
            //$username = $req->input('username');
            //$password = $req->input('password');
            //foreach ($usuario as $us) {
            //    $a=dd($us->puntos_actividad);
            //    echo $a;            
            //}
        }
    }
?>