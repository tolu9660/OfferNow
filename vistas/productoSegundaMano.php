<?php
	require_once __DIR__.'/../includes/config.php';
	require RUTA_CLASES.'/art2ManoObjeto.php';
	require_once RUTA_USUARIO.'/usuarios.php';

	$id = $_GET['id'];
	//Muestra el articulo
	$ofertaObj = art2ManoObjeto::buscaArt2Mano($id);
	$ruta=POSTEAR;
	$productos='';
	$productos.=$ofertaObj->muestraOfertaString();
	if(estaLogado() ){
	$productos.=<<<EOS
		<div class="tarjetacomentario">
			
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
	}
	else{
		$productos.=<<<EOS
			<h3>Para poder publicar comentarios o agregar al carrito, inicia sesión <a href='vistas/login.php'>aquí</a>.</h3>	
		EOS;
	}

	$tituloPagina = $ofertaObj->muestraNombre();
	$contenidoPrincipal=<<<EOS
		$productos
	EOS;

	require RUTA_LAYOUT.'/layout.php';