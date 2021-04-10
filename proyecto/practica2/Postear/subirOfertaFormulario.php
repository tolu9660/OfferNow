<?php
	session_start();
?>

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
		<div id="contenedor">
			<?php
                require('../cabecera.php');
			?>
			<main id="contenido">
				<h1>Subir Oferta</h1>
				<form method="get" action="subirOfertaBD.php">
					<p>Nombre oferta:</p>
					<input type="text" name="ofertaNombre"/>
					<p>Descripción:</p>
					<textarea name="ofertaDescripcion" rows="10" cols="30"></textarea>
					<p>Precio:</p>
					<input type="number" name="ofertaPrecio"  />
					<p>Url de la oferta:</p>
					<input type="text" name="ofertaUrl"/>
					<p>Imagen:</p>
					<input type="text" name="ofertaImagen"/>
					
					<p><input type="submit" value="Publicar"></p>
				</form>
			</main>
		</div>
	</body>
</html>