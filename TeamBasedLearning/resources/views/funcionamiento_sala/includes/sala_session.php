<?php
class SalaSession{
    public function __construct(){
        session_start();
    }
    public function setCurrentSala($sala){
        $_SESSION['sala'] = $sala;
        $_SESSION["time-sala"] = time();
    }
    public function getCurrentSala(){
        return $_SESSION['sala'];
    }
    public function closeSession(){
        session_unset();
        session_destroy();
    }
}
?>