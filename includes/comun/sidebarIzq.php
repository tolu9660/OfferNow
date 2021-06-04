<div id="sidebarizq">

	<?php
		require_once __DIR__.'/../config.php';
		require_once RUTA_USUARIO.'/usuarios.php';
	?>

	<nav class="menuizq">
	<ul>
		<h3>¡¡Ordena los productos!!</h3>
		<li><a href="#">Valoracion</a></li>
		<li><a href="#">Fecha</a></li>
		<li>
			Por precio:
					<form action="<?=$_SERVER['REQUEST_URI']?>" method="get">
						<input type="submit", value="Menor primero">
						<input type="hidden" name="ordenNombre", value = Precio><br>
						<input type="hidden" name="ordenTipo", value = ASC><br>
					</form>
					<form action="<?=$_SERVER['REQUEST_URI']?>" method="get">
						<input type="submit", value="Mayor primero">
						<input type="hidden" name="ordenNombre", value = Precio><br>
						<input type="hidden" name="ordenTipo", value = DESC><br>
					</form>
		</li>
		<li>
			Por nombre:
			<ul>
				<li>
					<form action="<?=$_SERVER['REQUEST_URI']?>" method="get">
					<input type="submit", value="A-Z">
						<input type="hidden" name="ordenNombre", value = Nombre><br>
						<input type="hidden" name="ordenTipo", value = ASC><br>
					</form>
				</li>
				<li>
					<form action="<?=$_SERVER['REQUEST_URI']?>" method="get">
						<input type="submit", value="Z-A">
						<input type="hidden" name="ordenNombre", value = Nombre><br>
						<input type="hidden" name="ordenTipo", value = DESC><br>
					</form>
				</li>
			</ul>
		</li>
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