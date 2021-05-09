<?php
	require_once __DIR__.'/includes/config.php';
	require __DIR__.'/Clases/OfertaObjeto.php';
	
	
	//Carga las ofertas en un array
	$ofertasArray = OfertaObjeto::cargarOfertas("Valoracion");

	
	//Mostrar las ofertas recorriendo el array
	$tituloPagina = 'Inicio';
	$productos = '';
	$productos.=<<<EOS
		<div id="contenedor">
			<ul class="rejilla">
	EOS;


	for ($i = 0; $i < sizeof($ofertasArray); $i++) {
		$nombreOferta=strval($ofertasArray[$i]->muestraNombre());
		$precioOferta=strval($ofertasArray[$i]->muestraPrecio());
		$urlImagen=strval($ofertasArray[$i]->muestraURLImagen());
		//URL del producto junto con el id
		$id = PRODUCTOS.'/producto.php?id='.$ofertasArray[$i]->muestraID();
		$productos.=<<<EOS
		
		<li>
			<a href=$id rel="nofollow" target="_blank">
				<img src=$urlImagen width="200" height="200" alt="Producto" />
				<h3>$nombreOferta</h3>
				<p>$precioOferta €</p>
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
