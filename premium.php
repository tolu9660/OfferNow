<!--
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
<div class ="contenedor">
<?php
	//require ('cabecera.php');
?>
	<main>
	  <article>
			<h1>¿QUIERES ENTERARTE DE LAS OFERTAS ANTES QUE NADIE?</h1>
			<h2>ESCOGE TU PACK: </h2>
			<p> - 1 mes por 3 euros. </p>
			<p> - 3 meses por 7 euros. </p>
			<p> - 12 meses por 25 euros. </p>
	</main>
	<?php
			//if (!isset($_SESSION["login"])) { //Usuario incorrecto
			//echo "Pincha <a href='login.php'>aquí</a> para iniciar sesión si todavía no tienes cuenta.";
			//}
	?>
</div>

</body>
</html>
-->
<?php
	require_once __DIR__.'/includes/config.php';

	$tituloPagina = 'Hazte Premium';
	$contenidoPrincipal=<<<EOS
	<div id = "producto">
	<ul class = "rejilla">
		<main>
		<article>
			  <h1>¿QUIERES ENTERARTE DE LAS OFERTAS ANTES QUE NADIE?</h1>
			  <h2>ESCOGE TU PACK: </h2>
			  <p> - 1 mes por 3 euros. </p>
			  <p> - 3 meses por 7 euros. </p>
			  <p> - 12 meses por 25 euros. </p>
	  </main>
		</ul>
		</div>
	EOS;

	require __DIR__.'/includes/comun/layout.php';
?>