<nav id="sidebarIzq">

		<h3>Navegación</h3>
		<ul>
			<li><a href="#">Inicio</a></li>
			<li><a href="#">Quiénes somos</a></li>
			<li><a href="#">Servicios</a></li>
			<li><a href="#">Blog</a></li>
			<li><a href="#">Contacto</a></li>
			//Comprobar si está registrado (mirar codigo)
			<?php;
				session_destroy();
				if(($_SESSION['login'])){
					$dir = RUTA_APP.'/Postear/subirOfertaFormulario.php';
					echo'<li><a href= "$dir">Publica una oferta</a></li>';
				}
			?>
			//Comprobar si está registrado y si es admin (mirar codigo)
			<li><a href= "<?=RUTA_APP.'/Postear/subirArticulo2ManoFormulario.php'?>">Publicar un articulo de segunda mano</a></li>
			//Mover a la pagina de los articulos y comprobar si está registrado (mirar codigo)
			<li><a href= "<?=RUTA_APP.'/Postear/subirComentarioFormulario.php'?>">Pon un comentario</a></li>
		</ul>
</nav>