<?php
	require_once __DIR__.'/../includes/config.php';
	require_once RUTA_FORMS.'/formularioCarrito.php';


	$tituloPagina = 'Pagos';

	$form = new formularioCarrito();
	$htmlFormCarrito = $form->gestiona();
	
	$contenidoPrincipal = <<<EOS
		$htmlFormCarrito
	EOS;

	require RUTA_LAYOUT.'/layout.php';