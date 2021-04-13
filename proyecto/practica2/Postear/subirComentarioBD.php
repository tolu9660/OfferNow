<?php
	require_once __DIR__.'/../includes/config.php';
	
	$titulo = htmlspecialchars(trim(strip_tags($_REQUEST["comentarioTitulo"])));
	$descripcion = htmlspecialchars(trim(strip_tags($_REQUEST["comentarioDescripcion"])));
	$urlOferta = htmlspecialchars(trim(strip_tags($_REQUEST["comentarioUrlDeOferta"])));
	$creador = $_SESSION["correo"];
	//crear el objeto e insertarlo producto 
	echo"<h1>PONER ESTO EN LA PAGINA DE LOS ARTICULOS Y PASARLE EL ID DEL ARTICULO</h1>";
	
	$mysqli = getConexionBD();
	//Insert into inserta en la tabla comentarios y las columnas entre parentesis los valores en VALUES
	$sql = "INSERT INTO comentarios (Texto, Titulo, ValoracionUtilidad, Usuario, Oferta)
				VALUES ('$descripcion', '$titulo', 0, '$creador', '$urlOferta')";
	
	//
		$contenidoPrincipal='';
		if (mysqli_query($mysqli, $sql)) {
			$contenidoPrincipal=<<<EOS
				<h3>Comentario creado</h3>
			EOS;
		} else {
			$contenidoPrincipal=<<<EOS
				<h3>Error: al crear el comentario </h3>;
			EOS;
		}
		//require __DIR__.'../includes/comun/layout.php';
?>