<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="estilo.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="/css/styles.css?v=<?php echo time(); ?>" />
        <script src="/js/functions.js?v=<?php echo time(); ?>"></script>
        <title>Subir Articulo Segunda Mano</title>
    </head>
    <body>
		<div="contenedor">
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
				
				if (mysqli_query($mysqli, $sql)) {
					echo "<h3>Articulo creado</h3>";
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
				}
				cierraConexion();
			?>
		</div>
	</body>
</html>