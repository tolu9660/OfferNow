<?php
class ComentarioObjeto{
	private $id;
	private $titulo;
	private $texto;
	private $valoracionUtilidad;
	private $usuario;
	private $productoURL;
	
	function __construct($id, $texto, $titulo, $valoracionUtilidad, $usuario, $productoURL) {
		$this->id = $id;
		$this->titulo = $titulo;
		$this->texto = $texto;
		$this->valoracionUtilidad = $valoracionUtilidad;
		$this->usuario = $usuario;
		$this->productoURL = $productoURL;
	}
	
	//--------------------------------------------Funciones estaticas----------------------------------------------
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
	
	public static function buscaComentarioOferta($id) {
		$conn = getConexionBD();
		$query = sprintf("SELECT * FROM comentariosoferta WHERE ID='%id'",
						$conn->real_escape_string($id));

		$rs = $conn->query($query);

		if ($rs && $rs->num_rows == 1) {
			$fila = $rs->fetch_assoc();
			$coment = new ComentarioObjeto($fila['Numero'], $fila['Texto'], $fila['Titulo'],
				$fila['ValoracionUtilidad'], $fila['UsuarioID'], $fila['OfertaID']);
			$rs->free();

			return $coment;
		}
		return false;
	}
	
	public static function buscaComentario2Mano($id) {
		$conn = getConexionBD();
		$query = sprintf("SELECT * FROM comentariossegundamano WHERE ID='%id'",
						$conn->real_escape_string($id));

		$rs = $conn->query($query);

		if ($rs && $rs->num_rows == 1) {
			$fila = $rs->fetch_assoc();
			$coment = new ComentarioObjeto($fila['Numero'], $fila['Texto'], $fila['Titulo'],
				$fila['ValoracionUtilidad'], $fila['UsuarioID'], $fila['OfertaID']);
			$rs->free();

			return $coment;
		}
		return false;
	}
	
	//--------------------------------------------------GETTERS-----------------------------------------------------
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