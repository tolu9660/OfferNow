<?php

	require_once __DIR__.'/includes/config.php';
	require __DIR__.'/Clases/Art2ManoObjeto.php';

	$id = $_GET['id'];
	
	//Busca la oferta en la BD
	/*
	$mysqli = getConexionBD();
	$query = "SELECT * FROM articulos_segunda_mano WHERE Numero = '$id'";
	$result = $mysqli->query($query);
	
	if($result) {
		$fila = $result->fetch_assoc();
		$ofertaObj = new Art2ManoObjeto($fila['Numero'],$fila['Nombre'],$fila['Descripcion'],
								$fila['Unidades'],$fila['Precio'],$fila['Imagen']);	
	} else{
		echo"Error al buscar en la base de datos";
	}
	*/
	
	$ofertaObj = Art2ManoObjeto::buscaArt2Mano($id);
	$productos='';
	$productos.=$ofertaObj->muestraOfertaString();
	$productos.=<<<EOS
		<div id="tarjetacomentario">
			
				<h1>Subir Comentario</h1>
				<form method="get" action="Postear/subirComentario2ManoBD.php">
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

require __DIR__.'/includes/comun/layout.php';