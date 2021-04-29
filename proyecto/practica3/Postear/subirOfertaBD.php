<?php
	require_once __DIR__.'/../includes/config.php';
	require_once __DIR__.'/../clases/OfertaObjeto.php';
	
	//Muestra si se ha subido o no
	$tituloPagina = "Subir Oferta";
	$contenidoPrincipal='';
	if (OfertaObjeto::subeOfertaBD()) {
		$contenidoPrincipal=<<<EOS
			<h3>Oferta creada</h3>
		EOS;
	} else {
		$contenidoPrincipal=<<<EOS
			<h3>Error: al crear la oferta</h3>;
		EOS;
	}
	require '../includes/comun/layout.php';
?>