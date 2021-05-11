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
				$oferta = RUTA_APP.'/postear/subirOfertaFormulario.php';
				$vender = RUTA_APP.'/postear/peticionVentaArticuloFormulario.php';
				?>
				<li><a href="<?=SESION.'/logout.php'?>">Cerrar Sesión</a></li>
				<li><a href= "<?=$oferta?>">Publica una oferta</a></li>
				<li><a href= "<?=$vender?>">¡¡Vendenos un articulo!!</a></li>
				<?php
			}
			if(estaLogado() && ($_SESSION['esAdmin'])){
				$articulo = RUTA_APP.'/postear/subirArticulo2ManoFormulario.php';
				$compraArticulos = RUTA_APP.'/posiblesCompras/ventasUsuarioVista.php';
				?>
				<li><a href= "<?=$articulo?>">Publica un articulo de segunda mano</a></li>
				<li><a href= "<?=$compraArticulos?>">Valida solicitudes de compra</a></li>
				<?php
			}
			if(estaLogado() && ($_SESSION['esPremium'])){
				$premium = RUTA_APP.'/tiendaPremium.php';
				?>
				<li><a href= "<?=$premium?>">Comprueba las ofertas Premium!!</a></li>
				<?php
			}
		?>
	</ul>
</nav>