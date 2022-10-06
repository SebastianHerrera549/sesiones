<?php

include_once 'includes/user.php';
include_once 'includes/user_session.php';

$userSession = new UserSession();
$user = new User();
//verifica si existe un usuario logado
if(isset($_SESSION['user'])){
    //echo "Hay sesión";
    $user->setUser($userSession->getCurrentUser());  //trae datos de session
    include_once 'vistas/home.php';
 //verifica si ingresa usuario y contraseña    
}else if(isset($_POST['username']) && isset($_POST['password'])){
    //echo "Validación de login";

    $userForm = $_POST['username']; //usuario
    $passForm = $_POST['password']; //contraseña

    if($user->userExists($userForm, $passForm)){ // llama a la funcion que valida el inicio de session recive falso o verdadero 
        //echo "usuario validado";
        $userSession->setCurrentUser($userForm); 
        $user->setUser($userForm);// almacena datos session

        include_once 'vistas/home.php';
    }else{
        //echo "nombre de usuario y/o password incorrecto";
        $errorLogin = "Nombre de usuario y/o password es incorrecto"; // mensaje error login 
        include_once 'vistas/login.php';  // re-direcciona a login 
    }
//lleva al usuario a logarse 
}else{
    //echo "Login";
    include_once 'vistas/login.php';
}
?>