<?php
namespace App\Repositories;
use GuzzleHttp\Client;
class GuzzleHttpRequest
{

    /* Construccion del objeto cliente que trae la libreria. */
    protected $client;
    
    public function __construct(Client $client)
    {
        $this->client = $client;
    }
    
    protected function get($url)
    {
        $response = $this->client->request('GET',$url);
        return json_decode( $response->getBody()->getContents() );
    }
    
    protected function del($url)
    {
        $response = $this->client->request('DELETE',$url);
        return  $response;
    }
    protected function post($url, $data)
    {
        $response = $this->client->request('POST',$url, [ 'json' => $data ]);
        return json_decode( $response->getBody()->getContents() );
    } 
    protected function put($url, $data)
    {
        $response = $this->client->request('PUT',$url, [ 'json' => $data ]);
        return json_decode( $response->getBody()->getContents() );
    } 

}
    
?>
    
