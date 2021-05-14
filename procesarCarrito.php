<?php

require_once __DIR__.'/includes/config.php';
require __DIR__.'/clases/ofertaObjeto.php';
require_once __DIR__.'/includes/usuario/usuarios.php';


$tituloPagina = 'carrito';
$contenidoPrincipal = '';
$productos = '';
if(estaLogado()){
	
	$user=usuario::buscaUsuario( $_SESSION["correo"]);
	
	$carritoArray=$user->muestraCarrito();
	$precioTotal=$user->Precio();
	//echo $precioTotal;
	$productos.=<<<EOS
		<div class="iniciosesion">
		<table>
			<caption>TU PEDIDO</caption>
			<thead>
				<tr>
					<th>PRODUCTO</th>
					<th>DESCRIPCION</th>
					<th>PRECIO</th>
					<th>CANTIDAD</th>
				</tr>
			</thead>	
		EOS;
	for ($i = 0; $i < sizeof($carritoArray); $i++) {
		$nombreOferta=strval($carritoArray[$i]->muestraNombre());
		$precioOferta=strval($carritoArray[$i]->muestraPrecio());
		$urlImagen=strval($carritoArray[$i]->muestraURLImagen());
		$Descripcion=strval($carritoArray[$i]->muestraDescripcion());
		$productos.=<<<EOS
			<tr>
				<div class="imgProducto">
					<td> <img src=$urlImagen width="200" height="200" alt="Producto" /> </td>
				</div>
			
				<div class="descripcion">
					<td>$Descripcion</td>
				</div>
				<div class="info">
					<div class="precio">
						<td>$precioOferta</td>
					</div>
				</div>
				<div class="cantidad">
					<td>3</td>
				</div>
			</tr>
		EOS;

	}
	$contenidoPrincipal.=<<<EOS
			$productos;
		<div class="precioTotal">
				<td>total:$precioTotal</td>
		</div>
		</table>
		</div>
		
	EOS;
}
else{
	$contenidoPrincipal=<<<EOS
	Porfavor  inicie sesion;
	EOS;

}
require __DIR__.'/includes/comun/layout.php';