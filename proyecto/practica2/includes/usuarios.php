<?php
require_once __DIR__.'/usuarioBD.php';


function checkLogin() {
    $username = isset($_POST["email"]) ? $_POST["email"] : null;
    $password = isset($_POST["password"]) ? $_POST["password"] : null;
  
    $usuario = Usuario::login($username, $password);
    //si esta logeado y está en la BD voy a crear un objeto
    // y voy a volcar por medio de getters a los atributos de la 
    //sesion
    
    if ($usuario) {
      //if ($usuario->idCorreo()==="user") {
        $_SESSION["login"] = true;
        $_SESSION["correo"] = $usuario->idCorreo();
        $_SESSION["nombre"] = $usuario->nombre();
        $_SESSION["esPremium"] =$usuario->esPremium();
		$_SESSION["esAdmin"] = $usuario->esAdmin();
		echo"funciona";
      //} 
      echo"casi pero no xd";
    }
    else{
		$_SESSION["login"] = false;
		$_SESSION["nombre"] = null;
		$_SESSION["correo"] = null;
		$_SESSION["esPremium"] = null;
		$_SESSION["esAdmin"] = null;
		echo" no funciona";
	}
  }

function logout() {
    //Doble seguridad: unset + destroy
    unset($_SESSION["login"]);
    unset($_SESSION["esAdmin"]);
    unset($_SESSION["nombre"]);
    unset($_SESSION["idUsuario"]);


    session_destroy();
    session_start();
}
