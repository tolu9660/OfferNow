<?php
	require_once __DIR__.'/../includes/config.php';
	require_once __DIR__.'/formularioSubirOferta.php';

	$tituloPagina = 'subirOferta';
	
//////////////////implementacion:
$form = new formularioSubirOferta();
$htmlFormOferta = $form->gestiona();

$contenidoPrincipal=<<<EOS
	$htmlFormOferta
EOS;

	/*$contenidoPrincipal=<<<EOS
		<div class="subirOferta">
			<div class="producto">
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
					<input type="file" name="productoImagen"/>
					
					<p><input type="submit" value="Publicar"></p>
				</form>
			</div>
		</div>
	EOS;*/
require __DIR__.'/../includes/comun/layout.php';
