<?php
	require_once __DIR__.'/../includes/config.php';
	require_once __DIR__.'/../clases/posiblesVentasUsuario.php';
	
	//Muestra si se ha subido o no
	$tituloPagina = "Vender articulo";
	$contenidoPrincipal='';
	$nombre = htmlspecialchars(trim(strip_tags($_POST["articuloNombre"])));
	$descripcion = htmlspecialchars(trim(strip_tags($_POST["articuloDescripcion"])));
	$precio = htmlspecialchars(trim(strip_tags($_POST["articuloPrecio"])));
	$unidades = htmlspecialchars(trim(strip_tags($_POST["articuloUnidades"])));
	//$imagen = htmlspecialchars(trim(strip_tags($_POST["productoImagen"])));
	$usuario = $_SESSION["correo"];
	
	if(Aplicacion::comprobarImagen("/art2mano/")){
		if (PosiblesVentasUsuario::subePeticionVentaArticuloBD($nombre,$descripcion,$unidades ,$precio, $_FILES["productoImagen"]["name"], $usuario)) {
			$contenidoPrincipal=<<<EOS
				<h3>Tu peticion de venta ha sido enviada!</h3>
			EOS;
		} else {
			$contenidoPrincipal=<<<EOS
				<h3>Error al enviar la peticion de venta</h3>;
			EOS;
		}
	} else {
		$contenidoPrincipal=<<<EOS
			<h3>Error: al subir la imagen, solo permite extensiones .png, .jpg, .jpeg y .gif</h3>;
		EOS;
	}

	require '../includes/comun/layout.php';
	//cierraConexion();
?>