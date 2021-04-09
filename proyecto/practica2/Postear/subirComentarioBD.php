<?php
	session_start();
	$titulo = htmlspecialchars(trim(strip_tags($_REQUEST["comentarioTitulo"])));
	$descripcion = htmlspecialchars(trim(strip_tags($_REQUEST["comentarioDescripcion"])));
	$urlOferta = htmlspecialchars(trim(strip_tags($_REQUEST["comentarioUrlDeOferta"])));
	$creador = $_SESSION["correo"];
	
	$mysqli = new mysqli("localhost", "root", "root", "aw_p2");
	if ( mysqli_connect_errno() ) {
		echo "Error de conexión a la BD: ".mysqli_connect_error();
		exit();
	}
	//Insert into inserta en la tabla comentarios y las columnas entre parentesis los valores en VALUES
	$sql = "INSERT INTO comentarios (Texto, Titulo, ValoracionUtilidad, Usuario, Oferta)
				VALUES ('$descripcion', '$titulo', 0, 'correo@correo.com', '$urlOferta')";
	
    if (mysqli_query($mysqli, $sql)) {
        echo "Comentario creado";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    $mysqli->close();
?>