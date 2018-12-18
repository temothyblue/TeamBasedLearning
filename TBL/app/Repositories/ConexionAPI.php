<?php
namespace App\Repositories;
class ConexionAPI extends GuzzleHttpRequest
{

    public function add($url,$data)
    {
        try{return $this->post($url,$data);}
        catch(\Exception $ex){/*dd($ex);*/\Log::error($ex); }
    }    
    
    public function all($url)
    {
        try{return $this->get($url);}
        catch(\Exception $ex){/*dd($ex);*/\Log::error($ex); }
    }
    
    public function find($url,$id)
    {
        $url = $url."/".$id;
        try{return $this->get($url);}
        catch(\Exception $ex){/*dd($ex);*/;\Log::error($ex); }
    }
    
    public function delete($url,$id)
    {
        $url = $url."/".$id;
        try{return $this->del($url);}
        catch(\Exception $ex){/*dd($ex);*/\Log::error($ex); }
    }
    
    public function update($url,$id, $data)
    {
        $url = $url."/".$id;
        try{return $this->put($url,$data);}
        catch(\Exception $ex){/*dd($ex);*/\Log::error($ex); }
    }  
}
?>

