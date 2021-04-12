<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/usuarios.php';

	logout();
	$contenidoPrincipal='';
	$contenidoPrincipal=<<<EOS
	<main>
		<article>
			<h1>GRACIAS Y HASTA PRONTO!</h1>
		</article>
	</main>
	EOS;
?>