<?php
	require_once __DIR__.'/../includes/config.php';

	$tituloPagina = 'Hazte Premium';
	$contenidoPrincipal=<<<EOS
	<div id = "producto">
	<ul class = "rejilla">
		<main>
		<article>
			  <h1>¿QUIERES ENTERARTE DE LAS OFERTAS ANTES QUE NADIE?</h1>
			  <h2>ESCOGE TU PACK: </h2>
			  <p> - 1 mes por 3 euros. </p>
			  <p> - 3 meses por 7 euros. </p>
			  <p> - 12 meses por 25 euros. </p>
	  </main>
		</ul>
		</div>
	EOS;

	require RUTA_LAYOUT.'/layout.php';
?>