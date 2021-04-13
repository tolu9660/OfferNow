<?php

	require_once __DIR__.'/includes/config.php';
	require __DIR__.'/Clases/OfertaObjeto.php';

	$id = $_GET['id'];
	
	//Busca la oferta en la BD
	$mysqli = getConexionBD();
	$query = "SELECT * FROM oferta WHERE Numero = '$id'";
	$result = $mysqli->query($query);
	
	if($result) {
		$fila = $result->fetch_assoc();
		$ofertaObj = new OfertaObjeto($fila['Numero'],$fila['Nombre'],$fila['Descripcion'],$fila['URL_Oferta'],
								$fila['URL_Imagen'],$fila['Valoracion'],$fila['Precio'],$fila['Creador']);
	} else{
		echo"Error al buscar en la base de datos";
	}
	
	//Asigna valores a variables
	$Nombre = $ofertaObj->muestraNombre();
	$Descripcion = $ofertaObj->muestraDescripcion();
	$URLImagen = $ofertaObj->muestraURLImagen();
	$URLOferta = $ofertaObj->muestraURLOferta();
	$Precio = $ofertaObj->muestraPrecio();
	$Valoracion = $ofertaObj->muestraValoracion();
	$comentarios = $ofertaObj->muestraComentarios();

	//Muestra las cosas
	$productos = '';
	$productos.=<<<EOS
		<div id="tarjetaProducto">
			<button class="button" type="button">    
				<img src="imagenes/iconos/ok.png" width="15" height="15" alt="votos"/>    
				VOTOS: $Valoracion
			</button>
			<div class="imgProducto">
				<img src="$URLImagen" width="200" height="200" alt=$Nombre />
			</div>
			<div class="desProducto">
				<p>Nombre del producto:</p>
				<p>$Nombre</p>
				<p>Descripcion:</p>
				<p>$Descripcion</p>
				<p>
					Enlaces: 
						<a href="https://$URLOferta" rel="nofollow" target="_blank" >Enlace Oferta</a> /
						<a href="$URLOferta" rel="nofollow" target="_blank">Enlace a nuestra tienda</a>
				</p>
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
				<input type="hidden" value="true" name="esOferta"/>
				<p><input type="submit" value="Publicar"></p>
				
			</form>
		</div>
EOS;
$tituloPagina = $Nombre;
$contenidoPrincipal=<<<EOS
		$productos
	EOS;

require __DIR__.'/includes/comun/layout.php';