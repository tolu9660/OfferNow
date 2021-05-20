<div id="sidebarizq">

	<?php
		require_once __DIR__.'/../config.php';
		require_once RUTA_USUARIO.'/usuarios.php';
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
				?>
				<h3>Navegacion:</h3>
				<li><a href="<?=RUTA_APP.'/vistas/logout.php'?>">Cerrar Sesión</a></li>
				<li><a href= "<?=RUTA_APP.'/vistas/subirOferta.php'?>">Publica una oferta</a></li>
				<li><a href= "<?=RUTA_APP.'/vistas/peticionVentaArticulo.php'?>">¡¡Vendenos un articulo!!</a></li>
				<?php
			}
			if(estaLogado() && ($_SESSION['esAdmin'])){
				?>
				<li><a href= "<?=RUTA_APP.'/vistas/subirArticulo2Mano.php'?>">Publica un articulo de segunda mano</a></li>
				<li><a href= "<?=RUTA_APP.'/ventasUsuarioVista.php'?>">Valida solicitudes de compra</a></li>
				<?php
			}
			if(estaLogado() && ($_SESSION['esPremium'])){
				?>
				<li><a href= "<?=RUTA_APP.'/tiendaPremium.php'?>">Comprueba las ofertas Premium!!</a></li>
				<?php
			}
		?>
	</ul>
</nav>
</div>