<?php

	require_once __DIR__.'/includes/config.php';
	require __DIR__.'/Clases/OfertaObjeto.php';


	$id = $_GET['id'];
	
	$ofertaObj = OfertaObjeto::buscaOferta($id);
	
	//Mostrar las cosas
	$productos = '';
	$productos .= $ofertaObj->muestraOfertaString();
	$productos.=<<<EOS
		<div id="tarjetacomentario">		
			<h1>Subir Comentario</h1>
			<form method="get" action="Postear/subirComentarioOfertaBD.php">
				<p>Titulo</p>
				<input type="text" name="comentarioTitulo"/>
				<p>Descripcion:</p>
				<textarea name="comentarioDescripcion" rows="5" cols="48"></textarea>
				<input type="hidden" value="$id" name="comentarioUrlDeOferta"/>
				<input type="hidden" value="true" name="esOferta"/>
				<p><input type="submit" value="Publicar"></p>
				
			</form>
		</div>
	EOS;
	$tituloPagina = $ofertaObj->muestraNombre();
	$contenidoPrincipal=<<<EOS
		$productos
	EOS;

require __DIR__.'/includes/comun/layout.php';