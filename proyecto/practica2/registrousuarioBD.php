
<?php
	require_once __DIR__.'/includes/config.php';
	require_once __DIR__.'/includes/usuarioBD.php';
	
	$tituloPagina = 'Registro';
	$contenidoPrincipal=<<<EOS
	<div="contenedor">	
	EOS;			
				
	if(usuario::altaNuevoUsuario()){
		$contenidoPrincipal.= "<h3>Usuario registrado con exito!</h3>";
	}
	else{
		$contenidoPrincipal.= "<h3>Error en el registro!</h3>";
	}
				
	$contenidoPrincipal.=<<<EOS
		</div>
	EOS;
		require __DIR__.'/includes/comun/layout.php';