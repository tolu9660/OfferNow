<nav id="sidebarIzq">

	<?php
		require_once __DIR__.'/../config.php';
		require_once __DIR__."/../usuario/usuarios.php";
		
		

	?>

	<h3>Navegación</h3>
	<ul>
		<li><a href="#">Inicio</a></li>
		<li><a href="#">Quiénes somos</a></li>
		<li><a href="#">Servicios</a></li>
		<li><a href="#">Contacto</a></li>
		<?php
			if(estaLogado()){
				$dir = RUTA_APP.'/Postear/subirOfertaFormulario.php';
				?>
				<li><a href="<?=SESION.'/logout.php'?>">Cerrar Sesión</a></li>
				<li><a href= "<?=$dir?>">Publica una oferta</a></li>
				<?php
			}
			if(estaLogado() && ($_SESSION['esAdmin'])){
				$dir2 = RUTA_APP.'/Postear/subirArticulo2ManoFormulario.php';
				?>
				<li><a href= "<?=$dir2?>">Publica un articulo de segunda mano</a></li>
				<?php
			}
			if(estaLogado() && ($_SESSION['esPremium'])){
				$dir3 = RUTA_APP.'/tiendaPremium.php';
				?>
				<li><a href= "<?=$dir3?>">Comprueba las ofertas Premium!!</a></li>
				<?php
			}
		?>
	</ul>
</nav>