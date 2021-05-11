<?php
	require_once __DIR__.'/../includes/config.php';
	
	$tituloPagina = 'Vender Articulo';		
	$contenidoPrincipal=<<<EOS
		<div class="subirOferta">
			<div class="producto">
				<h1>Vender Articulo</h1>
				<form method="post" action="peticionVentaArticuloBD.php" enctype="multipart/form-data">
					<p>Nombre Articulo:</p>
					<input type="text" name="articuloNombre"/>
					<p>Descripción:</p>
					<textarea name="articuloDescripcion" rows="10" cols="30"></textarea>
					<p>Precio de venta:</p>
					<input type="number" name="articuloPrecio"  />
					<p>Nº Unidades:</p>
					<input type="number" name="articuloUnidades"/>
					<p>Imagen:</p>
					<input type="file" name="productoImagen"/>
					
					<p><input type="submit" value="Publicar"></p>
				</form>
			</div>
		</div>
	EOS;
require __DIR__.'/../includes/comun/layout.php';