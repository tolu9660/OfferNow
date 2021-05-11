<?php
	require_once __DIR__.'/includes/config.php';
	require __DIR__.'/clases/art2ManoObjeto.php';

	//Carga los productos en un array
	$ofertasArray = Art2ManoObjeto::cargarProductos2Mano("Precio");
	
	//Mostrar los productos
	$tituloPagina = 'Nuestra tienda';
	$productos = '';
	$productos.=<<<EOS
		<div="contenedor">
		<ul class="rejilla">
	EOS;
	
	for ($i = 0; $i < sizeof($ofertasArray); $i++) {
		$nombreArticulo=strval($ofertasArray[$i]->muestraNombre());
		$precioArticulo=strval($ofertasArray[$i]->muestraPrecio());
		$urlImagen=strval($ofertasArray[$i]->muestraURLImagen());
		//URL del producto junto con el id
		$id = PRODUCTOS.'/productoSegundaMano.php?id='.$ofertasArray[$i]->muestraID();
		$productos.=<<<EOS
		<li>
			<a href=$id rel="nofollow" target="_blank">
				<img src=$urlImagen width="200" height="200" alt=$nombreArticulo />
				<h3>$nombreArticulo</h3>
				<p>$precioArticulo €</p>
			</a>
		</li>	
		EOS;
	}

	$contenidoPrincipal=<<<EOS
		$productos
		</ul>
		</div>
	EOS;
require __DIR__.'/includes/comun/layout.php';
