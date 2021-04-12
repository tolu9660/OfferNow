<?php
class OfertaObjeto{
	private $id;
	private $nombre;
	private $descripcion;
	private $urlOferta;
	private $urlImagen;
	private $valoracion;
	private $precio;
	private $creador;
	
	function __construct($id, $nombre, $descripcion, $urlOferta, $urlImagen, $valoracion, $precio, $creador) {
		$this->id = $id;
		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
		$this->urlOferta = $urlOferta;
		$this->urlImagen = $urlImagen;
		$this->valoracion = $valoracion;
		$this->precio = $precio;
		$this->creador = $creador;
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
  }
?>