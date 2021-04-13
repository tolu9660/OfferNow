<?php

require __DIR__.'/ComentarioObjeto.php';

class OfertaObjeto{
	private $id;
	private $nombre;
	private $descripcion;
	private $urlOferta;
	private $urlImagen;
	private $valoracion;
	private $precio;
	private $creador;
	private $comentarios;
	
	function __construct($id, $nombre, $descripcion, $urlOferta, $urlImagen, $valoracion, $precio, $creador) {
		$this->id = $id;
		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
		$this->urlOferta = $urlOferta;
		$this->urlImagen = $urlImagen;
		$this->valoracion = $valoracion;
		$this->precio = $precio;
		$this->creador = $creador;
		$this->comentarios = $this->cargaComentarios();
	}
	
	function cargaComentarios() {
		$mysqli = getConexionBD();
		$query = "SELECT * FROM comentarios WHERE Oferta = '$this->id' ORDER BY ValoracionUtilidad";
		$result = $mysqli->query($query);
	
		$comen;
		if($result) {			
			for ($i = 0; $i < $result->num_rows; $i++) {
				$fila = $result->fetch_assoc();
				$comen[] = new ComentarioObjeto($fila['Numero'],$fila['Texto'],$fila['Titulo'],$fila['ValoracionUtilidad'],
										$fila['Usuario'],$fila['Oferta'],$fila['Articulo2mano']);
			}
			return comen;
		} else{
			echo"Error al buscar en la base de datos, id:".$this->id;
			return null;
		}
	}
	
	public static function buscaOferta($id) {
    $conn = getConexionBD();
    $query = sprintf("SELECT * FROM oferta WHERE Numero='%id'",
                    $conn->real_escape_string($id));

    $rs = $conn->query($query);
	

    if ($rs && $rs->num_rows == 1) {
      $fila = $rs->fetch_assoc();
      $ofert = new OfertaObjeto($fila['Numero'], $fila['Nombre'], $fila['Descripcion'],
		$fila['URL_Oferta'], $fila['URL_Imagen'], $fila['Valoracion'], $fila['Precio'], $fila['Creador']);
      $rs->free();
	
      return $ofert;
    }
    return false;
	}
	
	function muestraID() {
		return $this->id;
	}
	
	function muestraNombre() {
		return $this->nombre;
	}
	function muestraDescripcion() {
		return $this->descripcion;
	}
	
	function muestraURLOferta() {
		return $this->urlOferta;
	}
	
	function muestraURLImagen() {
		return $this->urlImagen;
	}
	
	function muestraValoracion() {
		return $this->valoracion;
	}
	
	function muestraPrecio() {
		return $this->precio;
	}
	
	function muestraCreador() {
		return $this->creador;
	}
	
	function muestraComentarios() {
		return comentarios;
	}
  }
?>