<?php
require_once __DIR__.'/usuarioBD.php';

	function estaLogado() {
		if(isset($_SESSION["login"]) && $_SESSION["login"]){
			return true;
		}
		else{
			return false;
		}
	}

	function checkLogin() {
		$username = isset($_POST["nombreUsuario"]) ? $_POST["nombreUsuario"] : null;
		$password = isset($_POST["password"]) ? $_POST["password"] : null;
		//echo $username;
		//echo $password;
		$usuario = Usuario::login($username, $password);
		//si esta logeado y está en la BD voy a crear un objeto
		// y voy a volcar por medio de getters a los atributos de la 
		//sesion
		if ($usuario) {
			$_SESSION["login"] = true;
			$_SESSION["correo"] = $usuario->idCorreo();
			$_SESSION["nombre"] = $usuario->nombre();
			$_SESSION["esPremium"] =$usuario->getPremium();
			$_SESSION["esAdmin"] = $usuario->getAdmin();
			//echo"funciona";
			return $usuario;
		}
		else{
			$_SESSION["login"] = false;
			$_SESSION["nombre"] = null;
			$_SESSION["correo"] = null;
			$_SESSION["esPremium"] = null;
			$_SESSION["esAdmin"] = null;
			//echo" no funciona";
			return false;
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
