<?php
	require_once __DIR__.'/../includes/config.php';
	require_once RUTA_FORMS.'/formularioLogin.php';

	$tituloPagina = 'Login';
//////////////////implementacion:
$form = new formularioLogin();
$htmlFormLogin = $form->gestiona();

$tituloPagina = 'Login';

$contenidoPrincipal = <<<EOS
$htmlFormLogin
EOS;

require RUTA_LAYOUT.'/layout.php';