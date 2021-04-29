<?php

	require_once __DIR__.'/../includes/config.php';
	require __DIR__.'/../Clases/Art2ManoObjeto.php';

	$id = $_GET['id'];
	//Muestra el articulo
	$ofertaObj = Art2ManoObjeto::buscaArt2Mano($id);
	$ruta=POSTEAR;
	$productos='';
	$productos.=$ofertaObj->muestraOfertaString();
	$productos.=<<<EOS
		<div id="tarjetacomentario">
			
				<h1>Subir Comentario</h1>
				<form method="post" action="${ruta}/subirComentario2ManoBD.php">
					<p>Titulo</p>
					<input type="text" name="comentarioTitulo"/>
					<p>Descripcion:</p>
					<textarea name="comentarioDescripcion" rows="5" cols="48"></textarea>
					<input type="hidden" value="$id" name="comentarioUrlDeOferta"/>
					<input type="hidden" value="false" name="esOferta"/>
					<p><input type="submit" value="Publicar"></p>
					
				</form>
			</div>
	EOS;

	$tituloPagina = $ofertaObj->muestraNombre();
	$contenidoPrincipal=<<<EOS
		$productos
	EOS;

	require __DIR__.'/../includes/comun/layout.php';