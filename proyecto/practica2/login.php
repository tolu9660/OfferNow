<?php
	require_once __DIR__.'/includes/config.php';
	$tituloPagina = 'Login';
	
	$raizApp = RUTA_APP;
	$contenidoPrincipal=<<<EOS
	<h1>Acceso al sistema</h1>
	
	<form class="formLogin" action="${raizApp}/procesarLogin.php" method="POST">
		<fieldset>
			<legend>Usuario y contraseña</legend>
			<div><label>Correo:</label> <input type="text" name="email" /></div>
			<div><label>Password:</label> <input type="password" name="password" /></div>
			<div><button type="submit">Entrar</button></div>
		</fieldset>
	</form>
	EOS;
	
	require __DIR__.'/includes/comun/layout.php';