<?php
	require_once __DIR__.'/../includes/config.php';
	require_once RUTA_FORMS.'/formularioRegistro.php';


	$tituloPagina = 'Registro';

	$form = new formularioRegistro();
	$htmlFormRegistro = $form->gestiona();
	
	$contenidoPrincipal = <<<EOS
	
		$htmlFormRegistro
	EOS;

	require RUTA_LAYOUT.'/layout.php';