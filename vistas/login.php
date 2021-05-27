<?php
	require_once __DIR__.'/../includes/config.php';
	require_once RUTA_FORMS.'/formularioLogin.php';
	require_once RUTA_USUARIO.'/usuarios.php';

	$tituloPagina = 'Login';

//////////////////implementacion:
if(estaLogado()){
	$ruta = SESION;//RUTA_VISTAS;
	$ruta.='/logout.php';
	$contenidoPrincipal = <<<EOS
	<h2>Ya tienes la sesión iniciada.</h2>
	<h2>Para cerrar la sesión, pulsa <a href=$ruta>aquí</a>.</h2>	
	EOS;
}
else{
$form = new formularioLogin();
$htmlFormLogin = $form->gestiona();

$tituloPagina = 'Login';
$contenidoPrincipal = <<<EOS
$htmlFormLogin
EOS;

}

require RUTA_LAYOUT.'/layout.php';