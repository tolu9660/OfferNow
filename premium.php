<?php
	require_once __DIR__.'/includes/config.php';

	$tituloPagina = 'Hazte Premium';
	$contenidoPrincipal=<<<EOS
	<div id = "producto">
	<div class="iniciosesion">
			  <h1>¿QUIERES ENTERARTE DE LAS OFERTAS ANTES QUE NADIE?</h1>
			  <h2>ESCOGE TU PACK: </h2>
			  <p> - 1 mes por 3 euros. </p>
			  <p> - 3 meses por 7 euros. </p>
			  <p> - 12 meses por 25 euros. </p>
		</div>
		</div>
	EOS;

	require __DIR__.'/includes/comun/layout.php';
?>