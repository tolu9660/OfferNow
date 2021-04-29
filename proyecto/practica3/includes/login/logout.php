<?php

	require_once __DIR__.'/includes/usuarios.php';
	require_once __DIR__.'/includes/config.php';

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
	
	require __DIR__.'/includes/comun/layout.php';