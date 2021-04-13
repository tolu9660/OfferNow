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
		$query = "SELECT * FROM comentarios WHERE Articulo2mano = '$this->id' ORDER BY ValoracionUtilidad";
		$result = $mysqli->query($query);

		if($result) {			
			for ($i = 0; $i < $result->num_rows; $i++) {
				$fila = $result->fetch_assoc();
				$this->comentariosArray[] = new ComentarioObjeto($fila['Numero'],$fila['Texto'],$fila['Titulo'],$fila['ValoracionUtilidad'],
										$fila['Usuario'],$fila['Oferta'],$fila['Articulo2mano']);
			}
		} else{
			echo"Error al buscar en la base de datos, id:".$this->id;
		}
	}
	
	
	public static function buscaArt2Mano($id) {
    $conn = getConexionBD();
    $query = sprintf("SELECT * FROM articulos_segunda_mano WHERE Numero='%id'",
                    $conn->real_escape_string($id));

    $rs = $conn->query($query);

    if ($rs && $rs->num_rows == 1) {
      $fila = $rs->fetch_assoc();
      $art = new Art2ManoObjeto($fila['Numero'], $fila['Nombre'], $fila['Descripcion'],
		$fila['Unidades'], $fila['Precio'], $fila['Imagen']);
      $rs->free();

      return $art;
    }
    return false;
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