<?php
	require_once __DIR__.'/../config.php';
	require_once __DIR__.'/usuarioBD.php';
	
	$tituloPagina = 'Registro';
	$contenidoPrincipal=<<<EOS
	<div="contenedor">	
	EOS;	
	// recibo todos los parametros que se obtinen del servidor y los envío al mete
	//metodo correspondiente		
	$email = htmlspecialchars(trim(strip_tags($_POST["email"])));//get post
	$user= htmlspecialchars(trim(strip_tags($_POST["username"])));
	$password1 = htmlspecialchars(trim(strip_tags($_POST["password1"])));
	$password2 = htmlspecialchars(trim(strip_tags($_POST["password2"])));	
	echo $password1;	
	if(usuario::altaNuevoUsuario($email,$user,$password1,$password2)){
		$contenidoPrincipal.= "<h3>Usuario registrado con exito!</h3>";
	}
	else{
		$contenidoPrincipal.= "<h3>Error en el registro!</h3>";
	}
				
	$contenidoPrincipal.=<<<EOS
		</div>
	EOS;
		require __DIR__.'/../comun/layout.php';