<?php
	require_once __DIR__.'/../config.php';
	require_once __DIR__.'/../usuario/usuarioBD.php';
	require_once __DIR__.'/FormularioRegistro.php';




	$form = new FormularioRegistro();
	//como puedo colocarlo de tal manera que pueda moverlo libremente
	$htmlFormLogin = $form->gestiona();
	
	$tituloPagina = 'Registro';
	
	$contenidoPrincipal = <<<EOS
	
	
	<h1>Registro de usuario</h1>
	$htmlFormRegistro
	

	EOS;
	


/*	$usuarios = USUARIO;
	//Muestra el registro
	$tituloPagina = 'Registro nuevo usuario';
	$contenidoPrincipal=<<<EOS
		
	<div id="contenedor">	
		<main>
		<article>
				<h1>Registro de usuario</h1>
				<form method="post" action="${usuarios}./registroUsuarioBD.php">
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
	EOS;*/
require __DIR__.'/../comun/layout.php';