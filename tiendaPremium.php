<?php
	require_once __DIR__.'/includes/config.php';
	require RUTA_CLASES.'/art2ManoObjeto.php';
    require RUTA_CLASES.'/ofertaObjeto.php';

	$tituloPagina = 'Zona Premium';
	$productos = '';
	$productos.=<<<EOS
		<div="contenedor">
		<h3>¡¡¡Aqui puedes ver todas las ofertass para usuarios Premium!!!</h3>
		<ul class="rejilla">
	EOS;

	//Carga los productos de 2 mano en un array
	$articulos2ManoArray = art2ManoObjeto::cargarArticulos2ManoPremium("Nombre");
	$articulosPremiumString;
	if(is_array($articulos2ManoArray)) {
		for ($i = 0; $i < sizeof($articulos2ManoArray); $i++) {
			$nombreArticulo=strval($articulos2ManoArray[$i]->muestraNombre());
			$precioArticulo=strval($articulos2ManoArray[$i]->muestraPrecio());
			$urlImagen=strval($articulos2ManoArray[$i]->muestraURLImagen());
			//URL del producto junto con el id
			$id = PRODUCTOS.'/productoSegundaMano.php?id='.$articulos2ManoArray[$i]->muestraID();
			$productos.=<<<EOS
			<li>
				<a href=$id rel="nofollow">
					<img src=$urlImagen width="200" height="200" alt=$nombreArticulo />
					<h3>$nombreArticulo</h3>
					<p>$precioArticulo €</p>
				</a>
			</li>	
			EOS;
		}
	} else{
		$productos.="<h3> No hay articulos premium de SEGUNDA MANO en este momento en la tienda </h3>";
	}

	//Carga las ofertas en un array
	$ofertasArray = ofertaObjeto::cargarOfertasPremium("Nombre");
	if(is_array($ofertasArray)) {
		for ($i = 0; $i < sizeof($ofertasArray); $i++) {
			$nombreArticulo=strval($ofertasArray[$i]->muestraNombre());
			$precioArticulo=strval($ofertasArray[$i]->muestraPrecio());
			$urlImagen=strval($ofertasArray[$i]->muestraURLImagen());
			//URL del producto junto con el id
			$id = PRODUCTOS.'/producto.php?id='.$ofertasArray[$i]->muestraID();
			$productos.=<<<EOS
			<li>
				<a href=$id rel="nofollow">
					<img src=$urlImagen width="200" height="200" alt=$nombreArticulo />
					<h3>$nombreArticulo</h3>
					<p>$precioArticulo €</p>
				</a>
			</li>	
			EOS;
		}
	} else{
		$productos.="<h3> No hay OFERTAS premium en este momento en la tienda </h3>";
	}

	//Muestra todos los productos premium
	$contenidoPrincipal=<<<EOS
		$productos
		</ul>
		</div>
	EOS;
require RAIZ_APP.'/includes/comun/layout.php';