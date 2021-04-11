<?php
	require_once __DIR__.'/includes/config.php';
	
	$email = htmlspecialchars(trim(strip_tags($_REQUEST["email"])));
	$password = htmlspecialchars(trim(strip_tags($_REQUEST["password"])));
	
	//Conexion a la BD
	$mysqli = getConexionBD();
	//Busca el email y la password en la bd
	$query = "SELECT * FROM usuario WHERE ((Correo = '$email') AND (Contraseña = '$password'))";
	$result = $mysqli->query($query);
    if ($result->num_rows == 1){
		$fila = $result->fetch_assoc();
		$_SESSION["login"] == true;
		$_SESSION["nombre"] = $fila['Nombre'];
		$_SESSION["correo"] = $fila['Correo'];
		$_SESSION["esPremium"] = $fila['Premium'];
		$_SESSION["esAdmin"] = $fila['Admin'];
		echo"funciona";
	} else{
		$_SESSION["login"] = false;
		$_SESSION["nombre"] = null;
		$_SESSION["correo"] = null;
		$_SESSION["esPremium"] = null;
		$_SESSION["esAdmin"] = null;
		echo"no funciona";
	}

	/*
	if ($username == "user" && $password == "userpass") {
		$_SESSION["login"] = true;
		$_SESSION["nombre"] = $username;
		header("Location:contenido.php");
	}
	else if ($username == "admin" && $password == "adminpass") {
		$_SESSION["login"] = true;
		$_SESSION["nombre"] = $username;
		$_SESSION["esAdmin"] = true;
		header("Location: admin.php");
	}
	else{
		$_SESSION["login"] = null;
		$_SESSION["esAdmin"] = null;
	}
	*/
?>
<?php

$tituloPagina = 'Login';
$raizApp = RUTA_APP;
if (!isset($_SESSION['login'])) {
	$contenidoPrincipal=<<<EOS
		<h1>Error</h1>
		<p>El usuario o contraseña no son válidos.</p>
	EOS;
} else {
	$contenidoPrincipal=<<<EOS
		<h1>Bienvenido ${_SESSION['nombre']}</h1>
		<p>Usa el menú de la izquierda para navegar.</p>
	EOS;
}
require __DIR__.'/includes/comun/layout.php';
