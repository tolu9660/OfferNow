<?php

	require_once __DIR__.'/../usuario/usuarios.php';
	require_once __DIR__.'/../config.php';

	$usuario=$_SESSION['nombre'];
	logout();

	$tituloPagina = 'Logout';
	$contenidoPrincipal=<<<EOS
		<div class="producto">
		<div class="iniciosesion">
				<h3>GRACIAS Y HASTA PRONTO!   </h3> {$usuario}
			</div>
		</div>
	EOS;
	
	require __DIR__.'/../comun/layout.php';