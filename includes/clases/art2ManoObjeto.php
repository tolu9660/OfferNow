<?php

require_once __DIR__.'/../config.php';
require_once RUTA_CLASES.'/comentarioObjeto.php';
require_once RUTA_CLASES.'/productoObjeto.php';
require_once RUTA_FORMS.'/formularioAniadeCarrito.php';

class art2ManoObjeto extends producto{
	private $unidades;
	
	function __construct($id, $nombre, $descripcion, $unidades, $precio, $urlImagen) {
		parent::creaPadre($id, $nombre, $descripcion, $urlImagen, $precio, "comentariossegundamano");
		$this->unidades = $unidades;
	}

	//--------------------------------------------Funciones estaticas----------------------------------------------
	public static function subeArt2ManoBD($nombre,$descripcion,$unidades ,$precio,	$imagen) {
		//NECESARIO PARA EL FILTRADO
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();
		
		$nombreFiltrado=$mysqli->real_escape_string($nombre);
		$descripcionFiltrado=$mysqli->real_escape_string($descripcion);;
		$unidadesFiltrado=$mysqli->real_escape_string($unidades);
		$precioFiltrado=$mysqli->real_escape_string($precio);
		$imagenFiltrado=$mysqli->real_escape_string($imagen);

		$result = parent::hacerConsulta("INSERT INTO articulos_segunda_mano (Nombre, Descripcion, Unidades,
											Precio, Imagen)
										VALUES ('$nombreFiltrado', '$descripcionFiltrado', '$unidadesFiltrado',
											'$precioFiltrado', '$imagenFiltrado')");
		
		if ($result != null) {
			return true;
		} else {
			return false;
		}
	}
	
	public static function buscaArt2Mano($id) {
		//Si esta logeado y es premium busca todos
		if(estaLogado() && $_SESSION["esPremium"]) {
			$result = parent::hacerConsulta("SELECT * FROM articulos_segunda_mano WHERE Numero = '$id'");
		}
		else{
			$result = parent::hacerConsulta("SELECT * FROM articulos_segunda_mano WHERE Numero = '$id' AND Premium = 0");
		}
		
		if($result && $result->num_rows == 1) {
			$fila = $result->fetch_assoc();
			$ofertaObj = new art2ManoObjeto($fila['Numero'],$fila['Nombre'],$fila['Descripcion'],
									$fila['Unidades'],$fila['Precio'],$fila['Imagen']);
			return $ofertaObj;
		} else{
			return false;
		}
	}

	public static function cargarProductos2Mano($orden){
		/*
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();
		$query = sprintf("SELECT * FROM articulos_segunda_mano ORDER BY $orden");
		$result = $mysqli->query($query);
		*/
		$result = parent::hacerConsulta("SELECT * FROM articulos_segunda_mano WHERE Premium = 0 ORDER BY $orden");

		$ofertasArray;
		
		if($result) {
			for ($i = 0; $i < $result->num_rows; $i++) {
				$fila = $result->fetch_assoc();
				$ofertasArray[] = new art2ManoObjeto($fila['Numero'],$fila['Nombre'],$fila['Descripcion'],
									$fila['Unidades'],$fila['Precio'],$fila['Imagen']);		
			}
			return $ofertasArray;
		}
		else{
			echo "Error in ".$query."<br>".$mysqli->error;
		}
	}

	//-------------------------------------------PREMIUM----------------------------------------
	public static function cargarArticulos2ManoPremium($orden){
		$result = parent::hacerConsulta("SELECT * FROM articulos_segunda_mano WHERE Premium  = 1 ORDER BY $orden");
		$ofertasArray;
		
		if($result) {
			for ($i = 0; $i < $result->num_rows; $i++) {
				$fila = $result->fetch_assoc();
				$ofertasArray[] = new art2ManoObjeto($fila['Numero'],$fila['Nombre'],$fila['Descripcion'],
									$fila['Unidades'],$fila['Precio'],$fila['Imagen']);
									
			}
			return $ofertasArray;
		}
		else{
			echo "Error in ".$query."<br>".$mysqli->error;
		}
	}
	
	//--------------------------------------------------Vista-----------------------------------------------------		
	public function muestraOfertaString(){
		$DIRimagen = $this->muestraURLImagen();
		
		$nombreAux = parent::muestraNombre();
		$descripcionAux = parent::muestraDescripcion();
		$form = new formularioAniadeCarrito(parent::muestraID());
		$htmlFormAniadirCarrito = $form->gestiona();
		$productos = '';
		$productos.=<<<EOS
			<div class="imgProducto">
				<img src="$DIRimagen" width="200" height="200" alt=$nombreAux />
			</div>
			<div class="desProducto">
				<p>Nombre del producto: $nombreAux</p>
				<p>Descripcion:</p>
				<p>$descripcionAux</p>
				<p>$htmlFormAniadirCarrito</p>
			</div>
		EOS;
		$productos.= parent::muestraComentariosString();
		return $productos;
	}
	
	//--------------------------------------------------GETTERS-----------------------------------------------------
	public function muestraUnidades() {
		return $this->unidades;
	}
	
	public function muestraURLImagen() {
		$DIRimagen=RUTA_IMGS."/art2mano/";
		$DIRimagen.=parent::muestraURLImagen();
		return $DIRimagen;
	}
}
?>
