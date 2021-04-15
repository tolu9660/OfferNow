<nav id="sidebarIzq">

	<?php
		require_once __DIR__.'/../config.php';
	?>

	<h3>Navegación</h3>
	<ul>
		<li><a href="#">Inicio</a></li>
		<li><a href="#">Quiénes somos</a></li>
		<li><a href="#">Servicios</a></li>
		<li><a href="#">Contacto</a></li>
		<?php
			if(isset($_SESSION['login'])){
				$dir = RUTA_APP.'/Postear/subirOfertaFormulario.php';
				?>
				<li><a href="<?=RUTA_APP.'/logout.php'?>">Cerrar Sesión</a></li>
				<li><a href= "<?=$dir?>">Publica una oferta</a></li>
				<?php
			}
		?>
		<?php
			if(isset($_SESSION['login']) && ($_SESSION['esAdmin'])){
				$dir2 = RUTA_APP.'/Postear/subirArticulo2ManoFormulario.php';
				?>
				<li><a href= "<?=$dir2?>">Publica un articulo de segunda mano</a></li>
				<?php
			}
		?>
	</ul>
</nav>