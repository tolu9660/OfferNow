<nav id="sidebarIzq">

		<h3>Navegación</h3>
		<ul>
			<li><a href="#">Inicio</a></li>
			<li><a href="#">Quiénes somos</a></li>
			<li><a href="#">Servicios</a></li>
			<li><a href="#">Blog</a></li>
			<li><a href="#">Contacto</a></li>
			//Comprobar si está registrado (mirar codigo)
			<?php
				if(isset($_SESSION['login'])){
					$dir = RUTA_APP.'/Postear/subirOfertaFormulario.php';
					?>
					<li><a href= "<?=$dir?>">Publica una oferta</a></li>
					<?php
				}
			?>
			//Comprobar si está registrado y si es admin (mirar codigo)
			<?php
			if(isset($_SESSION['login']) && $_SESSION['esAdmin']){
					$dir2 = RUTA_APP.'/Postear/subirArticulo2ManoFormulario.php';
					?>
					<li><a href= "<?=$dir2?>">Publica un articulo de segunda mano</a></li>
					<?php
				}
			?>
			//Mover a la pagina de los articulos y comprobar si está registrado (mirar codigo)
			<li><a href= "<?=RUTA_APP.'/Postear/subirComentarioFormulario.php'?>">Pon un comentario</a></li>
		</ul>
</nav>