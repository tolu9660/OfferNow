<?php
	require_once __DIR__.'/../includes/config.php';
	require_once __DIR__.'/../clases/OfertaObjeto.php';
	
	//Muestra si se ha subido o no
	$tituloPagina = "Subir Oferta";
	$contenidoPrincipal='';
	$nombre = htmlspecialchars(trim(strip_tags($_POST["ofertaNombre"])));
	$descripcion = htmlspecialchars(trim(strip_tags($_POST["ofertaDescripcion"])));
	$urlOferta = htmlspecialchars(trim(strip_tags($_POST["ofertaUrl"])));
	$urlImagen = htmlspecialchars(trim(strip_tags($_POST["ofertaImagen"])));
	$precio = htmlspecialchars(trim(strip_tags($_POST["ofertaPrecio"])));
	$creador = $_SESSION["correo"];
	
	
	
	if (OfertaObjeto::subeOfertaBD($nombre,$descripcion,$urlOferta,$urlImagen,$precio,$creador )) {
		$contenidoPrincipal=<<<EOS
			<h3>Oferta creada</h3>
		EOS;
	} else {
		$contenidoPrincipal=<<<EOS
			<h3>Error: al crear la oferta</h3>;
		EOS;
	}
	require '../includes/comun/layout.php';
?>