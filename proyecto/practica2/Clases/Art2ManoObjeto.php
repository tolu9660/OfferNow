<?php

require __DIR__.'/ComentarioObjeto.php';

class Art2ManoObjeto{
	private $id;
	private $nombre;
	private $descripcion;
	private $unidades;
	private $precio;
	private $urlImagen;
	private $comentariosArray;
	
	function __construct($id, $nombre, $descripcion, $unidades, $precio, $urlImagen) {
		$this->id = $id;
		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
		$this->unidades = $unidades;
		$this->urlImagen = $urlImagen;
		$this->precio = $precio;
		$this->cargaComentarios();
	}
	
	private function cargaComentarios() {
		$mysqli = getConexionBD();
		$query = "SELECT * FROM comentariossegundamano WHERE SegundaManoID = '$this->id' ORDER BY ValoracionUtilidad";
		$result = $mysqli->query($query);

		if($result) {			
			for ($i = 0; $i < $result->num_rows; $i++) {
				$fila = $result->fetch_assoc();
				$this->comentariosArray[] = new ComentarioObjeto($fila['ID'],$fila['Texto'],$fila['Titulo'],$fila['ValoracionUtilidad'],
										$fila['UsuarioID'],$fila['SegundaManoID']);
			}
		} else{
			echo"Error al buscar en la base de datos, id:".$this->id;
		}
	}
	
	public static function subeArt2ManoBD() {
		$nombre = htmlspecialchars(trim(strip_tags($_REQUEST["articuloNombre"])));
		$descripcion = htmlspecialchars(trim(strip_tags($_REQUEST["articuloDescripcion"])));
		$unidades = htmlspecialchars(trim(strip_tags($_REQUEST["articuloUnidades"])));
		$precio = htmlspecialchars(trim(strip_tags($_REQUEST["articuloPrecio"])));
		$imagen = htmlspecialchars(trim(strip_tags($_REQUEST["articuloImagen"])));
		
		$mysqli = getConexionBD();
		//Insert into inserta en la tabla articulos_segunda_mano y las columnas entre parentesis los valores en VALUES
		$sql = "INSERT INTO articulos_segunda_mano (Nombre, Descripcion, Unidades, Precio, Imagen)
					VALUES ('$nombre', '$descripcion', '$unidades', '$precio', '$imagen')";
		
		if (mysqli_query($mysqli, $sql)) {
			return true;
		} else {
			return false;
		}
	}
	
	public static function cargarProductos2Mano(){
		$mysqli = getConexionBD();
		$query = sprintf("SELECT * FROM articulos_segunda_mano");
		$result = $mysqli->query($query);

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
	
	public static function buscaArt2Mano($id) {
		$mysqli = getConexionBD();
		$query = "SELECT * FROM articulos_segunda_mano WHERE Numero = '$id'";
		$result = $mysqli->query($query);
		
		if($result) {
			$fila = $result->fetch_assoc();
			$ofertaObj = new Art2ManoObjeto($fila['Numero'],$fila['Nombre'],$fila['Descripcion'],
									$fila['Unidades'],$fila['Precio'],$fila['Imagen']);
			return $ofertaObj;
		} else{
			echo"Error al buscar en la base de datos";
			return false;
		}
	}
		//vista
		private function muestraComentariosOfertaString() {
			$productos = '';
			for($i = 0; $i < sizeof($this->comentariosArray); $i++){
				$comTitulo = $this->comentariosArray[$i]->muestraTitulo();
				$comTexto = $this->comentariosArray[$i]->muestraTexto();
				$comValoracion = $this->comentariosArray[$i]->muestraValoracion();
				$comUsuario = $this->comentariosArray[$i]->muestraUsuario();
				$productos.=<<<EOS
					<div class="comProducto">
						<p>$comTitulo - $comUsuario - </p>
						<p>Valoración comentario: $comValoracion</p>
						<p>$comTexto</p>
					</div>
				EOS;
			}
			return $productos;
		}
		
	public function muestraOfertaString(){
		$productos = '';
		$productos.=<<<EOS
		<div id="tarjetaProducto">
			<div class="imgProducto">
				<img src="$this->urlImagen" width="200" height="200" alt=$this->nombre />
			</div>
			<div class="desProducto">
				<p>Nombre del producto:</p>
				<p>$this->nombre</p>
				<p>Descripcion:</p>
				<p>$this->descripcion</p>
			</div>
		</div>
		EOS;
		$productos.= $this->muestraComentariosOfertaString();
		return $productos;
	}
	
	public function muestraID() {
		return $this->id;
	}
	
	public function muestraNombre() {
		return $this->nombre;
	}
	public function muestraDescripcion() {
		return $this->descripcion;
	}
	
	public function muestraUnidades() {
		return $this->unidades;
	}
	
	public function muestraURLImagen() {
		return $this->urlImagen;
	}
	
	public function muestraPrecio() {
		return $this->precio;
	}
	
	public function muestraComentarios() {
		return $this->comentariosArray;
	}
  }
?>