<?php
	require_once __DIR__.'/includes/config.php';
	require __DIR__.'/clases/PosiblesComprasObjeto.php';

	//Carga los productos en un array
	$ofertasArray = PosiblesComprasObjeto::cargarPosiblesCompras("Precio");
	
	//Mostrar los productos
	$tituloPagina = 'Valida Compras';
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
		$id = $ofertasArray[$i]->muestraID();
		$productos.=<<<EOS
		<li>
			<a href=$id rel="nofollow" target="_blank">
				<img src=$urlImagen width="200" height="200" alt=$nombreArticulo />
				<h3>$nombreArticulo</h3>
				<p>$precioArticulo €</p>
				<button class="button" type="button">    
					<img src="imagenes/iconos/ok.png" width="15" height="15" alt="votos"/>    
					Aceptar compra
				</button>
				<button class="button" type="button">   
					<img src="imagenes/iconos/cruz.png" width="15" height="15" alt="votos"/>   
					Rechazar compra
				</button>
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
