<?php

require_once __DIR__.'/includes/config.php';

   
$tituloPagina = 'Inicio';

$contenidoPrincipal=<<<EOS
	<div="contenedor">
			<?php
					//require('cabecera.php');
			?>
			
			<ul class="rejilla">
			<!--buscar la manera de automatizar este proceso -->
			<!-- otra manera es ir creando con clases dentro de otras, la gestion se haría con clases anidadas -->
			  <li>
				<a href="zmovil.php" rel="nofollow" target="_blank">
				<img src="imagenes/productos/movil.png" width="200" height="200" alt="movil" />
				<h3>Movil Barato</h3>
				<p>14.39 €</p>
				</a>
			  </la>

			  <li>
				<a href="/enlace-producto-2" rel="nofollow" target="_blank">
				  <img src="imagenes/productos/ram.png" width="200" height="200" alt="ram" />
				  <h3>Nombre de ejemplo 2</h3>
				  <p>37.95 €</p>
				</a>
			  </li>

			  <li>
				<a href="/enlace-producto-2" rel="nofollow" target="_blank">
				  <img src="imagenes/productos/nevera.png" width="200" height="200" alt="ram" />
				  <h3>Nombre de ejemplo 2</h3>
				  <p>37.95 €</p>
				</a>
			  </li>
			  <li>
				<a href="/enlace-producto-2" rel="nofollow" target="_blank">
				  <img src="imagenes/productos/ram.png" width="200" height="200" alt="ram" />
				  <h3>Nombre de ejemplo 2</h3>
				  <p>37.95 €</p>
				</a>
			  </li>

			  <li>
				<a href="/enlace-producto-2" rel="nofollow" target="_blank">
				  <img src="imagenes/productos/nevera.png" width="200" height="200" alt="ram" />
				  <h3>Nombre de ejemplo 2</h3>
				  <p>37.95 €</p>
				</a>
			  </li>
			</ul>
		</div>
EOS;

require __DIR__.'/includes/comun/layout.php';