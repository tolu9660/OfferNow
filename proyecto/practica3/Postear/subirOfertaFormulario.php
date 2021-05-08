<?php
	require_once __DIR__.'/../includes/config.php';

	$tituloPagina = 'subirOferta';
	$contenidoPrincipal=<<<EOS
		<div class="contenedor">
			<main class="contenido">
				<h1>Subir Oferta</h1>
				<form method="post" action="subirOfertaBD.php" enctype="multipart/form-data">
					<p>Nombre oferta:</p>
					<input type="text" name="ofertaNombre"/>
					<p>Descripción:</p>
					<textarea name="ofertaDescripcion" rows="10" cols="30"></textarea>
					<p>Precio:</p>
					<input type="number" name="ofertaPrecio"  />
					<p>Url de la oferta:</p>
					<input type="text" name="ofertaUrl"/>
					<p>Imagen:</p>
					<input type="file" name="ofertaImagen"/>
					
					<p><input type="submit" value="Publicar"></p>
				</form>
			</main>
		</div>
	EOS;
require __DIR__.'/../includes/comun/layout.php';