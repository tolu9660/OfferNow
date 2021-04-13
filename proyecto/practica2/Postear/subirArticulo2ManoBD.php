<?php
	require_once __DIR__.'/../includes/config.php';
	
	//session_start();
	$nombre = htmlspecialchars(trim(strip_tags($_REQUEST["articuloNombre"])));
	$descripcion = htmlspecialchars(trim(strip_tags($_REQUEST["articuloDescripcion"])));
	$unidades = htmlspecialchars(trim(strip_tags($_REQUEST["articuloUnidades"])));
	$precio = htmlspecialchars(trim(strip_tags($_REQUEST["articuloPrecio"])));
	$imagen = htmlspecialchars(trim(strip_tags($_REQUEST["articuloImagen"])));
	
	$mysqli = getConexionBD();
	//Insert into inserta en la tabla articulos_segunda_mano y las columnas entre parentesis los valores en VALUES
	$sql = "INSERT INTO articulos_segunda_mano (Nombre, Descripcion, Unidades, Precio, Imagen)
				VALUES ('$nombre', '$descripcion', '$unidades', '$precio', '$imagen')";
	
	$contenidoPrincipal='';
	if (mysqli_query($mysqli, $sql)) {
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