<?php
include 'db.php';
class User extends DB{
    private $nombre;
    private $username;
    public function userExists($user, $pass){
        $md5pass = md5($pass);
        $query = $this->connect()->prepare('SELECT * FROM usuario WHERE nom_us = :user AND pass = :pass');
        $query->execute(['user' => $user, 'pass' => $pass]);
        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }
    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM usuario WHERE nom_us = :user');
        $query->execute(['user' => $user]);
        
        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['nom_us'];
            $this->usename = $currentUser['nom_us'];

        }
    }
    public function getNombre(){
        return $this->nombre;
    }

}
?>