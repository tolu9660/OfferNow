<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="estilo.css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Login</title>
	</head>
	<body>
		<div id="contenedor">
			<?php
				//require("cabecera.php");
				//require("sidebarIzq.php");
			?>
			<main id="contenido">
				<h1>Subir Comentario</h1>
				<form method="get" action="subirComentarioBD.php">
					<p>Titulo</p>
					<input type="text" name="comentarioTitulo"/>
					<p>Descripcion:</p>
					<textarea name="comentarioDescripcion" rows="10" cols="30"></textarea>
					<input type="hidden" value="1" name="comentarioUrlDeOferta"/>
					<p><input type="submit" value="Publicar"></p>
				</form>
			</main>
			<?php
				//include("sidebarDer.php");
				//include("pie.php");
			?>
		</div>
	</body>
</html>