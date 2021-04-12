<?php
session_start();
session_destroy();

	require_once __DIR__.'/includes/config.php';
	$contenidoPrincipal='';
	$contenidoPrincipal=<<<EOS
		<main>
	  <article>
			<h1>GRACIAS Y HASTA PRONTO!</h1>
		</article>
	</main>
	EOS;
?>