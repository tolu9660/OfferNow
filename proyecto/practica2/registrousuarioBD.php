
<?php
	require_once __DIR__.'/includes/config.php';
	require_once __DIR__.'/includes/usuarioBD.php';
	
	$tituloPagina = 'Registro';
	$contenidoPrincipal=<<<EOS
	<div="contenedor">	
	EOS;			

				if($password1 != $password2){
					echo "<h3>Las contraseñas no coinciden!</h3>";
				}
				else{
					if(usuario::altaNuevoUsuario()){
						
						$contenidoPrincipal.= "<h3>Usuario registrado con exito!</h3>";
					}
				}
	$contenidoPrincipal.=<<<EOS
		</div>
	EOS;
		require __DIR__.'/includes/comun/layout.php';