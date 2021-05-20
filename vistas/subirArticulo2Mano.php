<?php
	require_once __DIR__.'/../includes/config.php';	
	require_once __DIR__.'/formularioSubir2Mano.php';
	$tituloPagina = 'Subir Articulo 2ª';	
	
	$form = new formularioSubir2Mano();
	$htmlForm2Mano = $form->gestiona();

	$contenidoPrincipal=<<<EOS
		$htmlForm2Mano
	EOS;

require RUTA_LAYOUT.'/layout.php';
