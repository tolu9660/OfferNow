<?php
	require_once __DIR__.'/includes/config.php';
	require RUTA_CLASES.'/ofertaObjeto.php';

	//Para los botones de ordenar
	$filtrosBusqueda = array("Nombre","Valoracion","Precio","Fecha");
	
	//Carga las ofertas en un array
	if(isset($_GET['ordenar']) && in_array($_GET['ordenar'], $filtrosBusqueda)) {
		$ofertasArray = ofertaObjeto::cargarOfertas($_GET['ordenar']);
	}
	else{
		$ofertasArray = ofertaObjeto::cargarOfertas("Valoracion");
	}
	
	//Mostrar las ofertas recorriendo el array
	$tituloPagina = 'Inicio';
	$productos = '';
	$productos.=<<<EOS
		<div id="contenedor">
			<ul class="rejilla">
	EOS;

	if(is_array($ofertasArray)) {
		for ($i = 0; $i < sizeof($ofertasArray); $i++) {
			$nombreOferta=strval($ofertasArray[$i]->muestraNombre());
			$precioOferta=strval($ofertasArray[$i]->muestraPrecio());
			$urlImagen=strval($ofertasArray[$i]->muestraURLImagen());
			//URL del producto junto con el id
			$id = PRODUCTOS.'/producto.php?id='.$ofertasArray[$i]->muestraID();
			$productos.=<<<EOS
			
			<li>
				<a href=$id rel="nofollow">
					<img src=$urlImagen width="200" height="200" alt="Producto" />
					<h3>$nombreOferta</h3>
					<p>$precioOferta €</p>
				</a>
			</li>	
			EOS;
		}
	} else{
		$productos.="<h3> No hay ofertas en este momento en la tienda </h3>";
	}

	$contenidoPrincipal=<<<EOS
		$productos
		</ul>
		</div>
	EOS;

require RUTA_LAYOUT.'/layout.php';
