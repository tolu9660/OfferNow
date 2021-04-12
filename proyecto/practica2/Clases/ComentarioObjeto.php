<?php
class ComentarioObjeto{
	private $id;
	private $titulo;
	private $texto;
	private $valoracionUtilidad;
	private $usuario;
	private $oferta;
	private $articulo2mano;
	
	function __construct($id, $texto, $titulo, $valoracionUtilidad, $usuario, $oferta, $articulo2mano) {
		$this->id = $id;
		$this->titulo = $titulo;
		$this->texto = $texto;
		$this->valoracionUtilidad = $valoracionUtilidad;
		$this->usuario = $usuario;
		$this->oferta = $oferta;
		$this->articulo2mano = $articulo2mano;
	}
	
	public static function buscaComentario($id) {
    $conn = getConexionBD();
    $query = sprintf("SELECT * FROM comentarios WHERE Numero='%id'",
                    $conn->real_escape_string($id));

    $rs = $conn->query($query);

    if ($rs && $rs->num_rows == 1) {
      $fila = $rs->fetch_assoc();
      $coment = new ComentarioObjeto($fila['Numero'], $fila['Texto'], $fila['Titulo'],
		$fila['ValoracionUtilidad'], $fila['Usuario'], $fila['Oferta'], $fila['Articulo2mano']);
      $rs->free();

      return $coment;
    }
    return false;
  }
  
	public function muestraTitulo() {
		return $this->titulo;
	}
	public function muestraTexto() {
		return $this->texto;
	}
	
	public function muestraValoracion() {
		return $this->valoracionUtilidad;
	}
	
	public function muestraUsuario() {
		return $this->usuario;
	}
?>