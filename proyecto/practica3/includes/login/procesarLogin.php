<?php
	require_once __DIR__.'/../config.php';
	require_once __DIR__.'/../usuario/usuarios.php';

	logout();
	checkLogin();
	$tituloPagina = 'Login';
	$contenidoPrincipal='';
	if (!estaLogado()) {
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

require __DIR__.'/../comun/layout.php';