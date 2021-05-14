<?php
	require_once __DIR__.'/../includes/config.php';
	require_once __DIR__.'/formularioSubirOferta.php';

	$tituloPagina = 'subirOferta';
	
//////////////////implementacion:
$form = new formularioSubirOferta();
$htmlFormOferta = $form->gestiona();

$contenidoPrincipal=<<<EOS
	$htmlFormOferta
EOS;
require __DIR__.'/../includes/comun/layout.php';
