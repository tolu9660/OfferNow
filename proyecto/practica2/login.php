<?php
	require_once __DIR__.'/includes/config.php';
?>
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
	//require_once COMUN.'/cabecera.php';
?>
	<main>
	  <article>
			<h1>INICIO DE SESIÓN</h1>
			<form method="get" action="procesarLogin.php">
				Correo:
				<input type="text" name="email"  />
				Contraseña:
				<input type="text" name="password"  />
				<input type="submit" value="Entrar">
			</form>
		</article>
	</main>
</div>

</body>
</html>