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
	$contenidoPrincipal=<<<EOS
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
                    <a href="$URLOferta" rel="nofollow" target="_blank" >Enlace Oferta</a> /
                    <a href="$URLOferta" rel="nofollow" target="_blank">Enlace a nuestra tienda</a>
                </p>
            </div>
            <div class="desProducto">
                <p>
                    Comentarios:
                </p>    
                <p>
                    <textarea name="Comentarios" placeholder= "Escribe tu comentario.." 
                                    rows="2" cols="30"></textarea>
                </p>
                <input type="button" value="publicar">
            </div>              
        </div>
EOS;

require __DIR__.'/includes/comun/layout.php';