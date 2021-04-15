<?php
	require_once __DIR__.'/includes/config.php';
	require_once __DIR__.'/includes/usuarioBD.php';

	//Muestra el registro
	$tituloPagina = 'Registro nuevo usuario';
	$contenidoPrincipal=<<<EOS
		
	<div id="contenedor">	
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
	EOS;
require __DIR__.'/includes/comun/layout.php';