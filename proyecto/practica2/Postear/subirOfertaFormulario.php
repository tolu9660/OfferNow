<?php
	require_once __DIR__.'/../includes/config.php';

	$tituloPagina = 'subirOferta';
	$contenidoPrincipal=<<<EOS
	<div id="contenedor">
			
			<main id="contenido">
				<h1>Subir Oferta</h1>
				<form method="get" action="subirOfertaBD.php">
					<p>Nombre oferta:</p>
					<input type="text" name="ofertaNombre"/>
					<p>Descripción:</p>
					<textarea name="ofertaDescripcion" rows="10" cols="30"></textarea>
					<p>Precio:</p>
					<input type="number" name="ofertaPrecio"  />
					<p>Url de la oferta:</p>
					<input type="text" name="ofertaUrl"/>
					<p>Imagen:</p>
					<input type="text" name="ofertaImagen"/>
					
					<p><input type="submit" value="Publicar"></p>
				</form>
			</main>
		</div>
	EOS;
require __DIR__.'/../includes/comun/layout.php';