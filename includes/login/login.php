<?php
	require_once __DIR__.'/../config.php';
	require_once __DIR__.'/formularioLogin.php';

	$tituloPagina = 'Login';
//////////////////implementacion:
$form = new formularioLogin();
$htmlFormLogin = $form->gestiona();

$tituloPagina = 'Login';

$contenidoPrincipal = <<<EOS
$htmlFormLogin
EOS;


	require __DIR__.'/../comun/layout.php';