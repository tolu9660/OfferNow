<?php
	require_once __DIR__.'/includes/config.php';
	require RUTA_CLASES.'/posiblesVentasObjeto.php';

	//Carga los productos en un array
	$ofertasArray = posiblesVentasObjeto::cargarPosiblesCompras("Precio");
	
	//Mostrar los productos
	$tituloPagina = 'Valida Compras';
	$productos = '';
	$productos.=<<<EOS
		<div="contenedor">
		<h3>¡¡¡Valida las solicitudes de compra de otros usuarios!!!</h3>
		<ul class="rejilla">
	EOS;
	if(is_array($ofertasArray)) {
		for ($i = 0; $i < sizeof($ofertasArray); $i++) {
			$nombreArticulo=strval($ofertasArray[$i]->muestraNombre());
			$precioArticulo=strval($ofertasArray[$i]->muestraPrecio());
			$urlImagen=strval($ofertasArray[$i]->muestraURLImagen());
			//URL del producto junto con el id
			$id = $ofertasArray[$i]->muestraID();
			$productos.=<<<EOS
			<li>
				<a href=$id rel="nofollow">
					<img src=$urlImagen width="200" height="200" alt=$nombreArticulo />
					<h3>$nombreArticulo</h3>
					<p>$precioArticulo €</p>
					<form method="post" action="procesarAdmitirVentasUsuario.php">
						<input type="hidden" name="id" value=$id>
						<img src="../imagenes/iconos/ok.png" width="15" height="15" alt="tick"/> 
						<input type="submit" value="Aceptar compra">
					</form>
					<form method="post" action="procesarDenegarVentasUsuario.php">
						<input type="hidden" name="id" value=$id>
						<img src="../imagenes/iconos/cruz.png" width="15" height="15" alt="tick"/> 
						<input type="submit" value="Rechazar compra">
					</form>
				</a>
			</li>
			EOS;
		}
	} else{
		$productos.="<h3> No hay posibles compras para ser validadas </h3>";
	}
	$contenidoPrincipal=<<<EOS
		$productos
		</ul>
		</div>
	EOS;

require RUTA_LAYOUT.'/layout.php';