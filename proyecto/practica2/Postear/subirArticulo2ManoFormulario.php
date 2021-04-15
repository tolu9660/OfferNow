<?php
	require_once __DIR__.'/../includes/config.php';
	
	$tituloPagina = 'Subir Articulo 2ª';		
	$contenidoPrincipal=<<<EOS
		<div id="contenedor">
			<main id="contenido">
				<h1>Subir Articulo Segunda Mano</h1>
				<form method="get" action="subirArticulo2ManoBD.php">
					<p>Nombre Articulo:</p>
					<input type="text" name="articuloNombre"/>
					<p>Descripción:</p>
					<textarea name="articuloDescripcion" rows="10" cols="30"></textarea>
					<p>Precio:</p>
					<input type="number" name="articuloPrecio"  />
					<p>Nº Unidades:</p>
					<input type="number" name="articuloUnidades"/>
					<p>Imagen:</p>
					<input type="text" name="articuloImagen"/>
					
					<p><input type="submit" value="Publicar"></p>
				</form>
			</main>
		</div>
	EOS;
require __DIR__.'/../includes/comun/layout.php';
