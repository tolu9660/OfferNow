<?php
	require_once __DIR__.'/../includes/config.php';
	require_once __DIR__.'/../clases/Art2ManoObjeto.php';
	
	//Muestra si se ha subido o no
	$tituloPagina = "Subir Oferta";
	$contenidoPrincipal='';
	$nombre = htmlspecialchars(trim(strip_tags($_POST["articuloNombre"])));
	$descripcion = htmlspecialchars(trim(strip_tags($_POST["articuloDescripcion"])));
	$unidades = htmlspecialchars(trim(strip_tags($_POST["articuloUnidades"])));
	$precio = htmlspecialchars(trim(strip_tags($_POST["articuloPrecio"])));
	$imagen = htmlspecialchars(trim(strip_tags($_POST["articuloImagen"])));
	
	
	if (Art2ManoObjeto::subeArt2ManoBD($nombre,$descripcion,$unidades ,$precio,	$imagen)) {
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