<?php
	require_once __DIR__.'/../includes/config.php';
	require_once __DIR__.'/formularioVentaArticulo.php';
	
	$tituloPagina = 'Vender Articulo';
	$form= new formularioVentaArticulo();
	$htmlFormVentaArticulo= $form->gestiona();

	$contenidoPrincipal=<<<EOS
		$htmlFormVentaArticulo
	EOS;
require RUTA_LAYOUT.'/layout.php';