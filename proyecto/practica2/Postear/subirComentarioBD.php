<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="estilo.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="/css/styles.css?v=<?php echo time(); ?>" />
        <script src="/js/functions.js?v=<?php echo time(); ?>"></script>
        <title>Subir Comentario</title>
    </head>
    <body>
		<div="contenedor">
			<?php
				require('../cabecera.php');
				session_start();
				$titulo = htmlspecialchars(trim(strip_tags($_REQUEST["comentarioTitulo"])));
				$descripcion = htmlspecialchars(trim(strip_tags($_REQUEST["comentarioDescripcion"])));
				$urlOferta = htmlspecialchars(trim(strip_tags($_REQUEST["comentarioUrlDeOferta"])));
				$creador = 'correo@correo.com';//$_SESSION["correo"];
				//crear el objeto e insertarlo producto 
				
				$mysqli = new mysqli("localhost", "root", "root", "aw_p2");
				if ( mysqli_connect_errno() ) {
					echo "Error de conexión a la BD: ".mysqli_connect_error();
					exit();
				}
				//Insert into inserta en la tabla comentarios y las columnas entre parentesis los valores en VALUES
				$sql = "INSERT INTO comentarios (Texto, Titulo, ValoracionUtilidad, Usuario, Oferta)
							VALUES ('$descripcion', '$titulo', 0, '$creador', '$urlOferta')";
				
				if (mysqli_query($mysqli, $sql)) {
					echo "<h3>Comentario creado</h3>";
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
				}
				$mysqli->close();
			?>
		</div>
	</body>
</html>