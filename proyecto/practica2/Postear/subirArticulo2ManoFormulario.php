<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
        <link rel="stylesheet" type="text/css" href="../css/estilo.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="/css/styles.css?v=<?php echo time(); ?>" />
        <script src="/js/functions.js?v=<?php echo time(); ?>"></script>
        <title>Subir Oferta</title>
    </head>
	<body>
		<div id="contenedor">
			<?php
               require_once __DIR__.'/../includes/comun/cabecera.php';
			?>
			<main id="contenido">
				<h1>Subir Articulo Segunda Mano</h1>
				<form method="get" action="subirArticulo2ManoBD.php">
					<p>Nombre Articulo:</p>
					<input type="text" name="articuloNombre"/>
					<p>Descripción:</p>
					<textarea name="articuloDescripcion" rows="10" cols="30"></textarea>
					<p>Precio:</p>
					<input type="number" name="articuloPrecio"  />
					<p>Nº Unidades:</p>
					<input type="number" name="articuloUnidades"/>
					<p>Imagen:</p>
					<input type="text" name="articuloImagen"/>
					
					<p><input type="submit" value="Publicar"></p>
				</form>
			</main>
		</div>
	</body>
</html>