<?php

include_once 'db.php';

class User extends DB{

    private $nombre;
    private $username;
                    //validacion de login correcto 
    public function userExists($user, $pass){
        $md5pass = md5($pass); //hasea el pass a encriptacion md5 

        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE username = :user AND password = :pass');
        $query->execute(['user' => $user, 'pass' => $md5pass]);

        if($query->rowCount()){   //verifica si existen campos en la consulta 
            return true;
        }else{
            return false;
        }
    }//fin validacion login 


                    // Asignar 
    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE username = :user');
        $query->execute(['user' => $user]);

        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['nombre'];
            $this->username = $currentUser['username'];
        }
    }

    public function getNombre(){
        return $this->nombre;
    }
}

?>