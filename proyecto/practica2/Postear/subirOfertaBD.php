<?php
	require_once __DIR__.'/../includes/config.php';
	require_once __DIR__.'/../Clases/OfertaObjeto.php';
	
	/*
	echo $nombre.$creador.$precio;
	$mysqli = getConexionBD();
	//Insert into inserta en la tabla oferta y las columnas entre parentesis los valores en VALUES
	$sql = "INSERT INTO oferta (Nombre, Descripcion, URL_Oferta, URL_Imagen, Valoracion, Precio, Creador)
				VALUES ('$nombre', '$descripcion', '$urlOferta', '$urlImagen', 0, '$precio', '$creador')";
	
	$contenidoPrincipal='';
	if (mysqli_query($mysqli, $sql)) {
		$contenidoPrincipal=<<<EOS
			<h3>Oferta creada</h3>
		EOS;
	} else {
		$contenidoPrincipal=<<<EOS
			<h3>Error: al crear la oferta</h3>;
		EOS;
	}
	*/
	$tituloPagina = "Subir Oferta";
	if (OfertaObjeto::subeOfertaBD()) {
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