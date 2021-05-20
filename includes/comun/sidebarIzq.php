<div id="sidebarizq">

	<?php
		require_once __DIR__.'/../config.php';
		require_once __DIR__."/../usuario/usuarios.php";
	?>

	<nav class="menuizq">

	<ul>
		<h3>Ordenar</h3>
		<li><a href="#">Valoración</a></li>
		<li><a href="#">Precio</a></li>
		<li><a href="#">Fecha</a></li>
		<li><a href="#">Nombre</a></li>
		<?php
			if(estaLogado()){
				$oferta = RUTA_APP.'/postear/subirOferta.php';
				$vender = RUTA_APP.'/postear/peticionVentaArticulo.php';
				?>
				<h3>Navegacion:</h3>
				<li><a href="<?=RUTA_APP.'/vistas/logout.php'?>">Cerrar Sesión</a></li>
				<li><a href= "<?=$oferta?>">Publica una oferta</a></li>
				<li><a href= "<?=$vender?>">¡¡Vendenos un articulo!!</a></li>
				<?php
			}
			if(estaLogado() && ($_SESSION['esAdmin'])){
				$articulo = RUTA_APP.'/postear/subirArticulo2Mano.php';
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
</div>