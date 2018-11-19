<?php
include_once 'includes/user.php';
include_once 'includes/user_session.php';
$userSession = new UserSession();
$user = new User();
if(isset($_SESSION['user'])){                                   //Si Hay sesion
    $_SESSION["username"]=$userSession->getCurrentUser();
    if((time()-$_SESSION["time"])>1800){                        //Cuantos segundos dura la sesión (30min)
        echo "<script>alert('LA SESIÓN EXPIRÓ');</script>";
        $userSession->closeSession();
        header("location: index.php");
    }
    else{
        $_SESSION["time"]=time();
        $userForm=$_SESSION["user"];
        include_once 'vistas/home.php';
    }
}else if(isset($_POST['username']) && isset($_POST['password'])){ //Si ingreso el usuario y la contraseña
    $userForm = $_POST['username'];
    $passForm = $_POST['password'];
    $user = new User();
    if($user->userExists($userForm, $passForm)){
        //echo "Existe el usuario";
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);
        $_SESSION["username"]=$userSession->getCurrentUser();
        include_once 'vistas/home.php';
    }else{
        $errorLogin = "Nombre de usuario y/o password incorrecto";
        include_once 'vistas/login.php';
    }
}else{
    include_once 'vistas/login.php';
}
?>