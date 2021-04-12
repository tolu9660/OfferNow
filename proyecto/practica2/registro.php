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
	require_once __DIR__.'/includes/config.php';
?>
	<main>
	  <article>
			<h1>Registro de usuario</h1>
			<form method="get" action="registroUsuarioBD.php">
			Usuario:
			<input type="text" name="username"  />
		<br/>
			E-mail:
			<input type="text" name="email"  />
		<br/>
			Contraseña:
			<input type="text" name="password1"  />
		<br/>
			Confirmar contraseña:
			<input type="text" name="password2"  />
		<br/>
			<input type="checkbox" name="cb-terminosservicio" required> Acepto los términos del servicio<br>
			<input type="submit" value="crear">
			</form>
		</article>
	</main>
</div>

</body>
</html>