<?php
	require_once __DIR__.'/../includes/config.php';
	require_once __DIR__.'/../clases/art2ManoObjeto.php';
	
	//Muestra si se ha subido o no
	$tituloPagina = "Subir Oferta";
	$contenidoPrincipal='';
	$nombre = htmlspecialchars(trim(strip_tags($_POST["articuloNombre"])));
	$descripcion = htmlspecialchars(trim(strip_tags($_POST["articuloDescripcion"])));
	$unidades = htmlspecialchars(trim(strip_tags($_POST["articuloUnidades"])));
	$precio = htmlspecialchars(trim(strip_tags($_POST["articuloPrecio"])));
	//$imagen = htmlspecialchars(trim(strip_tags($_POST["productoImagen"])));
	
	if(Aplicacion::comprobarImagen("/art2mano/")){
		if (Art2ManoObjeto::subeArt2ManoBD($nombre,$descripcion,$unidades ,$precio,	$imagen)) {
			$contenidoPrincipal=<<<EOS
				<h3>Articulo de segunda mano creado</h3>
			EOS;
		} else {
			$contenidoPrincipal=<<<EOS
				<h3>Error: al crear articulo de segunda mano</h3>;
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