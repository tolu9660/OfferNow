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
	
	function __construct($id, $nombre, $descripcion, $urlOferta, $urlImagen, $valoracion, $precio, $creador;) {
		$this->id = $id;
		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
		$this->urlOferta = $urlOferta;
		$this->urlImagen = $urlImagen;
		$this->valoracion = $valoracion;
		$this->precio = $precio;
		$this->creador = $creador;
	}
?>