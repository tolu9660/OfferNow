<?php
session_start();
?>
<?php
session_destroy();
?>
<!DOCTYPE html>
<html>
<body>
	<head>
        <link rel="stylesheet" type="text/css" href="estilo.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="/css/styles.css?v=<?php echo time(); ?>" />
        <script src="/js/functions.js?v=<?php echo time(); ?>"></script>

        <title>Inicio</title>
    </head>
<div id="contenedor">

<?php
	require ('cabecera.php');
?>
	<?php
	require ('sidebarIzq.php');
?>
	<main>
	  <article>
			<h1>GRACIAS Y HASTA PRONTO!</h1>
		</article>
	</main>

</div> <!-- Fin del contenedor -->

</body>
</html>