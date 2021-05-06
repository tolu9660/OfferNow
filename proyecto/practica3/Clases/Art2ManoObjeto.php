<?php

require_once __DIR__.'/../includes/config.php';
require_once __DIR__.'/ComentarioObjeto.php';
require_once __DIR__.'/ProductoObjeto.php';

class Art2ManoObjeto extends producto{
	private $unidades;
	//private $precio;
	//private $urlImagen;
	//private $comentariosArray;
	
	function __construct($id, $nombre, $descripcion, $unidades, $precio, $urlImagen) {
		parent::creaPadre($id, $nombre, $descripcion, $urlImagen, $precio,
			"comentariossegundamano");
		//$comentariosArray = Art2ManoObjeto::cargaDeComentarios();
		//parent::setComentariosArray(cargaDeComentarios());
		$this->unidades = $unidades;
	}

	//--------------------------------------------Funciones estaticas----------------------------------------------
	public static function cargarArticulos2Mano($query){
		//$result = parent::hacerConsulta("SELECT * FROM articulos_segunda_mano ORDER BY $orden");
		$result = parent::hacerConsulta($query);
		$ofertasArray;
		
		if($result) {
			for ($i = 0; $i < $result->num_rows; $i++) {
				$fila = $result->fetch_assoc();
				$ofertasArray[] = new Art2ManoObjeto($fila['Numero'],$fila['Nombre'],$fila['Descripcion'],
									$fila['Unidades'],$fila['Precio'],$fila['Imagen']);		
			}
			return $ofertasArray;
		}
		else{
			echo "Error in ".$query."<br>".$mysqli->error;
		}
	}
	
	public static function subeArt2ManoBD($nombre,$descripcion,$unidades ,$precio,	$imagen) {
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();
		//Insert into inserta en la tabla articulos_segunda_mano y las columnas entre parentesis los valores en VALUES
		$sql = "INSERT INTO articulos_segunda_mano (Nombre, Descripcion, Unidades, Precio, Imagen)
					VALUES ('$nombre', '$descripcion', '$unidades', '$precio', '$imagen')";
		
		if (mysqli_query($mysqli, $sql)) {
			return true;
		} else {
			return false;
		}
	}
	
	public static function buscaArt2Mano($id) {
		$result = parent::hacerConsulta("SELECT * FROM articulos_segunda_mano WHERE Numero = '$id'");
		
		if($result) {
			$fila = $result->fetch_assoc();
			$ofertaObj = new Art2ManoObjeto($fila['Numero'],$fila['Nombre'],$fila['Descripcion'],
									$fila['Unidades'],$fila['Precio'],$fila['Imagen']);
			return $ofertaObj;
		} else{
			return false;
		}
	}
	/*//no va por ser static pero si lo quitas no va porque el ojbeto aun no está construido
	public static function cargaDeComentarios() {
		$id = parent::muestraID();
		$result = parent::hacerConsulta("SELECT * FROM comentariossegundamano WHERE SegundaManoID = '$id' ORDER BY ValoracionUtilidad");
        if($result != null) {		
            for ($i = 0; $i < $result->num_rows; $i++) {
                $fila = $result->fetch_assoc();
                $comentariosArray[] = new ComentarioObjeto($fila['ID'],$fila['Texto'],$fila['Titulo'],
                        $fila['ValoracionUtilidad'], $fila['UsuarioID'],$fila['SegundaManoID']);
            }
    	}
		return $comentariosArray;
	}
	*/
	
	//--------------------------------------------------Vista-----------------------------------------------------		
	public function muestraOfertaString(){
		$DIRimagen = $this->muestraURLImagen();
		
		$nombreAux = parent::muestraNombre();
		$descripcionAux = parent::muestraDescripcion();

		$productos = '';
		$productos.=<<<EOS
		<div id="tarjetaProducto">
			<div class="imgProducto">
				<img src="$DIRimagen" width="200" height="200" alt=$nombreAux />
			</div>
			<div class="desProducto">
				<p>Nombre del producto: $nombreAux</p>
				<p>Descripcion:</p>
				<p>$descripcionAux</p>
			</div>
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
