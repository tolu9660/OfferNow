<?php
	require_once __DIR__.'/../includes/config.php';
	require_once __DIR__.'/../clases/Art2ManoObjeto.php';
	
	//Muestra si se ha subido o no
	$tituloPagina = "Subir Oferta";
	$contenidoPrincipal='';
	if (Art2ManoObjeto::subeArt2ManoBD()) {
		$contenidoPrincipal=<<<EOS
			<h3>Articulo de segunda mano creado</h3>
		EOS;
	} else {
		$contenidoPrincipal=<<<EOS
			<h3>Error: al crear articulo de segunda mano</h3>;
		EOS;
	}
	require '../includes/comun/layout.php';
	//cierraConexion();
?>