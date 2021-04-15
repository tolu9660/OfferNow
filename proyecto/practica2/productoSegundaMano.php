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
	
	//Asigna valores a variables
	$Nombre = $ofertaObj->muestraNombre();
	$Descripcion = $ofertaObj->muestraDescripcion();
	$URLImagen = $ofertaObj->muestraURLImagen();
	$Precio = $ofertaObj->muestraPrecio();
	$comentarios = $ofertaObj->muestraComentarios();

	//Muestra las cosas
	$productos = '';
	$productos.=<<<EOS
		<div id="tarjetaProducto">
			<div class="imgProducto">
				<img src="$URLImagen" width="200" height="200" alt=$Nombre />
			</div>
			<div class="desProducto">
				<p>Nombre del producto:</p>
				<p>$Nombre</p>
				<p>Descripcion:</p>
				<p>$Descripcion</p>
			</div>
		</div>
	EOS;
	for($i = 0; $i < sizeof($comentarios); $i++){
		$comTitulo = $comentarios[$i]->muestraTitulo();
		$comTexto = $comentarios[$i]->muestraTexto();
		$comValoracion = $comentarios[$i]->muestraValoracion();
		$comUsuario = $comentarios[$i]->muestraUsuario();
		$productos.=<<<EOS
			<div class="comProducto">
				<p>$comTitulo - $comUsuario - </p>
				<p>Valoración comentario: $comValoracion</p>
				<p>$comTexto</p>
			</div>
		EOS;
	}
	$productos.=<<<EOS
            <div class="creaComentario">
			
				<h1>Subir Comentario</h1>
				<form method="get" action="Postear/subirComentarioBD.php">
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
$tituloPagina = $Nombre;
$contenidoPrincipal=<<<EOS
		$productos
	EOS;

require __DIR__.'/includes/comun/layout.php';