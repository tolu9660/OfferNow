<?php
	session_start();
	$nombre = htmlspecialchars(trim(strip_tags($_REQUEST["ofertaNombre"])));
	$descripcion = htmlspecialchars(trim(strip_tags($_REQUEST["ofertaDescripcion"])));
	$urlOferta = htmlspecialchars(trim(strip_tags($_REQUEST["ofertaUrl"])));
	$urlImagen = htmlspecialchars(trim(strip_tags($_REQUEST["ofertaImagen"])));
	$precio = htmlspecialchars(trim(strip_tags($_REQUEST["ofertaPrecio"])));
	$creador = $_SESSION["correo"];
	
	$mysqli = new mysqli("localhost", "root", "root", "aw_p2");
	if ( mysqli_connect_errno() ) {
		echo "Error de conexión a la BD: ".mysqli_connect_error();
		exit();
	}
	//Insert into inserta en la tabla oferta y las columnas entre parentesis los valores en VALUES
	$sql = "INSERT INTO oferta (Nombre, Descripcion, URL_Oferta, URL_Imagen, Valoracion, Precio, Creador)
				VALUES ('$nombre', '$descripcion', '$urlOferta', '$urlImagen', 0, '$precio', '$creador')";
	
    if (mysqli_query($mysqli, $sql)) {
        echo "Publicacion creada";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    $mysqli->close();
?>