<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="estilo.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="/css/styles.css?v=<?php echo time(); ?>" />
        <script src="/js/functions.js?v=<?php echo time(); ?>"></script>
        <title>Subir Oferta</title>
    </head>
    <body>
		<div="contenedor">
			<?php
				require('../cabecera.php');
				
				session_start();
				$nombre = htmlspecialchars(trim(strip_tags($_REQUEST["ofertaNombre"])));
				$descripcion = htmlspecialchars(trim(strip_tags($_REQUEST["ofertaDescripcion"])));
				$urlOferta = htmlspecialchars(trim(strip_tags($_REQUEST["ofertaUrl"])));
				$urlImagen = htmlspecialchars(trim(strip_tags($_REQUEST["ofertaImagen"])));
				$precio = htmlspecialchars(trim(strip_tags($_REQUEST["ofertaPrecio"])));
				$creador = 'correo@correo.com';//$_SESSION["correo"];
				
				$mysqli = new mysqli("localhost", "root", "root", "aw_p2");
				if ( mysqli_connect_errno() ) {
					echo "Error de conexión a la BD: ".mysqli_connect_error();
					exit();
				}
				//Insert into inserta en la tabla oferta y las columnas entre parentesis los valores en VALUES
				$sql = "INSERT INTO oferta (Nombre, Descripcion, URL_Oferta, URL_Imagen, Valoracion, Precio, Creador)
							VALUES ('$nombre', '$descripcion', '$urlOferta', '$urlImagen', 0, '$precio', '$creador')";
				
				if (mysqli_query($mysqli, $sql)) {
					echo "<h3>Oferta creada</h3>";
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
				}
				$mysqli->close();
			?>
		</div>
	</body>
</html>