<?php session_start() ?>
<!DOCTYPE html>
<html>
 <head>
        <link rel="stylesheet" type="text/css" href="estilo.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="/css/styles.css?v=<?php echo time(); ?>" />
        <script src="/js/functions.js?v=<?php echo time(); ?>"></script>

        <title>Inicio</title>
    </head>
<body>
<div id="contenedor">
<?php
	require ('cabecera.php');
?>
	<main>
	  <article>
			<h1>¿QUIERES ENTERARTE DE LAS OFERTAS ANTES QUE NADIE?</h1>
			<h2>ESCOGE TU PACK: </h2>
			<p> - 1 mes por 3 euros. </p>
			<p> - 3 meses por 7 euros. </p>
			<p> - 12 meses por 25 euros. </p>
	</main>
</div>

</body>
</html>