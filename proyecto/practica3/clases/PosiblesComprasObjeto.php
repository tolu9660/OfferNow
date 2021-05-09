<?php

require_once __DIR__.'/../includes/config.php';
require_once __DIR__.'/ComentarioObjeto.php';
require_once __DIR__.'/ProductoObjeto.php';

class PosiblesComprasObjeto extends producto{

	private $unidades;
	private $creador;
	//private $precio;
	//private $urlImagen;
	//private $comentariosArray;
	
	function __construct($id, $nombre, $descripcion, $unidades, $precio, $urlImagen, $creador) {
		parent::creaPadre($id, $nombre, $descripcion, $urlImagen, $precio,
			"SELECT * FROM posiblescompras WHERE SegundaManoID = '$id'");
		$this->unidades = $unidades;
		$this->creador = $creador;
	}

	//--------------------------------------------Funciones estaticas----------------------------------------------
	public static function cargarPosiblesCompras($orden){
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();
		$query = sprintf("SELECT * FROM posiblescompras ORDER BY $orden");
		$result = $mysqli->query($query);

		$ofertasArray;
		
		if($result) {
			for ($i = 0; $i < $result->num_rows; $i++) {
				$fila = $result->fetch_assoc();
				$ofertasArray[] = new PosiblesComprasObjeto($fila['Numero'],$fila['Nombre'],$fila['Descripcion'],
									$fila['Unidades'],$fila['Precio'],$fila['Imagen'], $fila['UsuarioVendedor']);		
			}
			return $ofertasArray;
		}
		else{
			echo "Error in ".$query."<br>".$mysqli->error;
		}
	}
	
	public static function subePeticionVentaArticuloBD($nombre,$descripcion,$unidades ,$precio,	$imagen, $usuario) {
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();

		$nombreFiltrado=$mysqli->real_escape_string($nombre);
		$descripcionFiltrado=$mysqli->real_escape_string($descripcion);;
		$unidadesFiltrado=$mysqli->real_escape_string($unidades);
		$precioFiltrado=$mysqli->real_escape_string($precio);
		$imagenFiltrado=$mysqli->real_escape_string($imagen);
		$usuarioFiltrado=$mysqli->real_escape_string($usuario);
	
		//Insert into inserta en la tabla articulos_segunda_mano y las columnas entre parentesis los valores en VALUES
		$sql = "INSERT INTO posiblescompras (Nombre, Descripcion, Unidades, Precio, Imagen, UsuarioVendedor)
						VALUES ('$nombreFiltrado', '$descripcionFiltrado',
							'$unidadesFiltrado', '$precioFiltrado', '$imagenFiltrado', '$usuarioFiltrado')";
		
		if (mysqli_query($mysqli, $sql)) {
			return true;
		} else {
			return false;
		}
	}
	
	public static function buscaPosiblesCompras($id) {
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();
		$query = "SELECT * FROM posiblescompras WHERE Numero = '$id'";
		$result = $mysqli->query($query);
		
		if($result) {
			$fila = $result->fetch_assoc();
			$ofertaObj = new PosiblesComprasObjeto($fila['Numero'],$fila['Nombre'],$fila['Descripcion'],
							$fila['Unidades'],$fila['Precio'],$fila['Imagen'], $fila['usuarioVendedor']);
			return $ofertaObj;
		} else{
			echo"Error al buscar en la base de datos";
			return false;
		}
	}
	
	//--------------------------------------------------Vista-----------------------------------------------------		
	public function muestraPosibleCompraString(){
		$DIRimagen = $this->muestraURLImagen();
		$usuarioCreador = $this->muestraCreador();
		
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
				<p>Creador: $usuarioCreador</p>;
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

	public function muestraCreador() {
		return $this->creador;
	}
	
	public function muestraURLImagen() {
		$DIRimagen=RUTA_IMGS."/art2mano/";
		$DIRimagen.=parent::muestraURLImagen();
		return $DIRimagen;
	}
  }
?>
