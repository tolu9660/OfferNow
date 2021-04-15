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
	
	public static function subeComentarioOfertaBD() {
		
		$titulo = htmlspecialchars(trim(strip_tags($_REQUEST["comentarioTitulo"])));
		$descripcion = htmlspecialchars(trim(strip_tags($_REQUEST["comentarioDescripcion"])));
		$urlOferta = htmlspecialchars(trim(strip_tags($_REQUEST["comentarioUrlDeOferta"])));
		$esOferta = htmlspecialchars(trim(strip_tags($_REQUEST["esOferta"])));
		$creador = $_SESSION["correo"];
		
		$mysqli = getConexionBD();			
		$sql = "INSERT INTO comentariosoferta (Texto, Titulo, ValoracionUtilidad, UsuarioID, OfertaID)
				VALUES ('$descripcion', '$titulo', 0, '$creador', '$urlOferta')";
		
		if (mysqli_query($mysqli, $sql)) {
			return true;
		} else {
			return false;
		}		
	}
	
	public static function subeComentario2ManoBD(){
		$titulo = htmlspecialchars(trim(strip_tags($_REQUEST["comentarioTitulo"])));
		$descripcion = htmlspecialchars(trim(strip_tags($_REQUEST["comentarioDescripcion"])));
		$urlOferta = htmlspecialchars(trim(strip_tags($_REQUEST["comentarioUrlDeOferta"])));
		$esOferta = htmlspecialchars(trim(strip_tags($_REQUEST["esOferta"])));
		$creador = $_SESSION["correo"];
		
		//Insert into inserta en la tabla comentariossegundamano y las columnas entre parentesis los valores en VALUES
		$mysqli = getConexionBD();
		$sql = "INSERT INTO comentariossegundamano (Texto, Titulo, ValoracionUtilidad, UsuarioID, SegundaManoID)
				VALUES ('$descripcion', '$titulo', 0, '$creador', '$urlOferta')";
		
		if (mysqli_query($mysqli, $sql)) {
			return true;
		} else {
			return false;
		}	
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
}
?>