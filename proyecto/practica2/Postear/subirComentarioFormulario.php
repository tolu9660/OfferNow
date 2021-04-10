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
        <title>Subir Comentario</title>
    </head>
    <body>
		<div="contenedor">
			<?php
			require_once __DIR__.'/../includes/comun/cabecera.php';
				//require('../cabecera.php');
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
		</div>

	</body>
</html>