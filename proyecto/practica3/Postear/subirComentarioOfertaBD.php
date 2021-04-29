<?php
	require_once __DIR__.'/../includes/config.php';
	require_once __DIR__.'/../clases/ComentarioObjeto.php';
	
	//Muestra si se ha subido o no
	$tituloPagina = 'Subir comentario';
	$contenidoPrincipal='';
	if (ComentarioObjeto::subeComentarioOfertaBD()) {
		$contenidoPrincipal=<<<EOS
			<h3>Comentario en la oferta creado</h3>
		EOS;
	} else {
		$contenidoPrincipal=<<<EOS
			<h3>Error: al crear el comentario </h3>;
		EOS;
	}
	require '../includes/comun/layout.php';
?>