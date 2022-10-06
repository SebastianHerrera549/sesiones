<?php

class UserSession{

    public function __construct(){
        session_start();   //inicia hambiente para construccion de sessiones
    }


    // pone valor a session actual 
    public function setCurrentUser($user){
        $_SESSION['user'] = $user; //guarda valores en la session
    }
    // devuelve el valor de lassecion 
    public function getCurrentUser(){
        return $_SESSION['user'];
    }

     //cierra los hambientes de sessiones 
    public function closeSession(){
        session_unset();  // borra 
        session_destroy(); // destruye  
    }
}


?>