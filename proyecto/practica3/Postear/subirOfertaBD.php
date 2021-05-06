<?php
	require_once __DIR__.'/../includes/config.php';
	require_once $_SERVER['DOCUMENT_ROOT'].RUTA_APP.'/clases/OfertaObjeto.php';
	
	//Muestra si se ha subido o no
	$tituloPagina = "Subir Oferta";
	$contenidoPrincipal='';
	$nombre = htmlspecialchars(trim(strip_tags($_POST["ofertaNombre"])));
	$descripcion = htmlspecialchars(trim(strip_tags($_POST["ofertaDescripcion"])));
	$urlOferta = htmlspecialchars(trim(strip_tags($_POST["ofertaUrl"])));
	$precio = htmlspecialchars(trim(strip_tags($_POST["ofertaPrecio"])));
	$creador = $_SESSION["correo"];

	//comprobaciones para la subida de imagenes
	$ofertaImagenDir = RUTA_IMGS."/productos/ofertas/".$_FILES["ofertaImagen"]["name"];
	$directorioServerImg = $_SERVER['DOCUMENT_ROOT'].$ofertaImagenDir;
	

	//Comprueba la extension del archivo
	$end = explode(".", $_FILES["ofertaImagen"]["name"]);
	$extensionImagen = strtolower(end($end));
	$extensionesValidas = array('jpg', 'gif', 'png', 'jpeg');
	if (in_array($extensionImagen, $extensionesValidas)) {
		//Si la extension es correcta mueve la imagen
		if (move_uploaded_file($_FILES['ofertaImagen']['tmp_name'], "$directorioServerImg")) {
			//Si ha movido la imagen la sube a la BD
			//if (OfertaObjeto::subeOfertaBD($nombre,$descripcion,$urlOferta,$ofertaImagenDir,$precio,$creador )) {
			if (OfertaObjeto::subeOfertaBD($nombre,$descripcion,$urlOferta,$_FILES["ofertaImagen"]["name"],$precio,$creador )) {
				$contenidoPrincipal=<<<EOS
					<h3>Oferta creada</h3>
				EOS;
			} else {
				$contenidoPrincipal=<<<EOS
					<h3>Error: al crear la oferta</h3>;
				EOS;
			}
		} else {
			$contenidoPrincipal=<<<EOS
				<h3>La subida ha fallado</h3>;
			EOS;
		}
	} else {
		$contenidoPrincipal=<<<EOS
			<h3>El archivo no es valido (png, jpg o gif)</h3>;
		EOS;
	}
	require $_SERVER['DOCUMENT_ROOT'].RUTA_APP.'/includes/comun/layout.php';
?>