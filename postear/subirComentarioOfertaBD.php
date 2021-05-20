<?php
	require_once __DIR__.'/../includes/config.php';
	require_once __DIR__.'/../clases/comentarioObjeto.php';
	
	//Muestra si se ha subido o no
	$tituloPagina = 'Subir comentario';
	$contenidoPrincipal='';
	$titulo = htmlspecialchars(trim(strip_tags($_POST["comentarioTitulo"])));
	$descripcion = htmlspecialchars(trim(strip_tags($_POST["comentarioDescripcion"])));
	$urlOferta = htmlspecialchars(trim(strip_tags($_POST["comentarioUrlDeOferta"])));
	$esOferta = htmlspecialchars(trim(strip_tags($_POST["esOferta"])));
	$creador = $_SESSION["correo"];
	if (comentarioObjeto::subeComentarioOfertaBD($titulo,$descripcion,$urlOferta,$esOferta,$creador)) {
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