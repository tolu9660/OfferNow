<?php

	require_once __DIR__.'/../usuario/usuarios.php';
	require_once __DIR__.'/../config.php';

	$usuario=$_SESSION['nombre'];
	logout();

	$tituloPagina = 'Logout';
	$contenidoPrincipal=<<<EOS
		<main>
			<article>
				<h3>GRACIAS Y HASTA PRONTO!   </h3> {$usuario}
			</article>
		</main>
	EOS;
	
	require __DIR__.'/../comun/layout.php';