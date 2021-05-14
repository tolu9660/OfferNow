<?php
	require_once __DIR__.'/../config.php';
	//require_once __DIR__.'/../usuario/usuarioBD.php';
	require_once __DIR__.'/formularioRegistro.php';


	$tituloPagina = 'Registro';

	$form = new formularioRegistro();
	$htmlFormRegistro = $form->gestiona();
	
	$contenidoPrincipal = <<<EOS
	
		$htmlFormRegistro
	EOS;
require __DIR__.'/../comun/layout.php';