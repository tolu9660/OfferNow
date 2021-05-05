<?php

require_once __DIR__.'/../includes/config.php';
require_once __DIR__.'/ComentarioObjeto.php';


class OfertaObjeto{
	private $id;
	private $nombre;
	private $descripcion;
	private $urlOferta;
	private $urlImagen;
	private $valoracion;
	private $precio;
	private $creador;
	private $comentariosArray;
	
	function __construct($id, $nombre, $descripcion, $urlOferta, $urlImagen, $valoracion, $precio, $creador) {
		$this->id = $id;
		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
		$this->urlOferta = $urlOferta;
		$this->urlImagen = $urlImagen;
		$this->valoracion = $valoracion;
		$this->precio = $precio;
		$this->creador = $creador;
		$this->cargaComentarios();
	}
	
	private function cargaComentarios() {
		//$mysqli = getConexionBD();
		//$query = "SELECT * FROM comentariosoferta WHERE OfertaID = '$this->id' ORDER BY ValoracionUtilidad";
		//$result = $mysqli->query($query);
		$result = OfertaObjeto::hacerConsulta("SELECT * FROM comentariosoferta WHERE OfertaID = '$this->id' ORDER BY ValoracionUtilidad");

		if($result != null) {		
			for ($i = 0; $i < $result->num_rows; $i++) {
				$fila = $result->fetch_assoc();
				$this->comentariosArray[] = new ComentarioObjeto($fila['ID'],$fila['Texto'],$fila['Titulo'],
						$fila['ValoracionUtilidad'], $fila['UsuarioID'],$fila['OfertaID']);
			}
		}
	}
	
	//--------------------------------------------Funciones estaticas----------------------------------------------
	public static function cargarOfertas($orden){
		//$mysqli = getConexionBD();
		//$query = sprintf("SELECT * FROM oferta ORDER BY $orden");
		//$result = $mysqli->query($query);
		$result = OfertaObjeto::hacerConsulta("SELECT * FROM oferta ORDER BY $orden");
		$ofertasArray;
	
		if($result != null) {
			for ($i = 0; $i < $result->num_rows; $i++) {
				$fila = $result->fetch_assoc();
				$ofertasArray[] = new OfertaObjeto($fila['Numero'],$fila['Nombre'],$fila['Descripcion'],$fila['URL_Oferta'],
											$fila['URL_Imagen'],$fila['Valoracion'],$fila['Precio'],$fila['Creador']);
				
			}
			return $ofertasArray;
		}
		else{
			echo "Error in ".$query."<br>".$mysqli->error;
		}
	}
	//-------------------------------------------PREMIUM----------------------------------------
	public static function cargarOfertasPremium($orden){
		//$mysqli = getConexionBD();
		//$query = sprintf("SELECT * FROM oferta WHERE Premium = 1 ORDER BY $orden");
		//$result = $mysqli->query($query);
		$result = OfertaObjeto::hacerConsulta("SELECT * FROM oferta WHERE Premium = 1 ORDER BY $orden");
		$ofertasArray;
	
		if($result != null) {
			for ($i = 0; $i < $result->num_rows; $i++) {
				$fila = $result->fetch_assoc();
				$ofertasArray[] = new OfertaObjeto($fila['Numero'],$fila['Nombre'],$fila['Descripcion'],$fila['URL_Oferta'],
											$fila['URL_Imagen'],$fila['Valoracion'],$fila['Precio'],$fila['Creador']);
				
			}
			return $ofertasArray;
		}
		else{
			echo "Error in ".$query."<br>".$mysqli->error;
		}
	}

	private static function hacerConsulta($query){
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();
		$result = $mysqli->query($query);	
		if($result) {
			return $result;
		}
		else{
			echo"maaaaaaaaaaaaaaaaaal";
			return null;
		}
	}
	
	public static function subeOfertaBD($nombre,$descripcion,$urlOferta,$urlImagen,$precio,$creador) {
		
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();
		//Insert into inserta en la tabla oferta y las columnas entre parentesis los valores en VALUES
		$sql = "INSERT INTO oferta (Nombre, Descripcion, URL_Oferta, URL_Imagen, Valoracion, Precio, Creador)
					VALUES ('$nombre', '$descripcion', '$urlOferta', '$urlImagen', 0, '$precio', '$creador')";
		
		if (mysqli_query($mysqli, $sql)) {
			return true;
		} else {
			return false;
		}
	}
	
	public static function buscaOferta($id) {
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();
		$query = "SELECT * FROM oferta WHERE Numero = '$id'";
		$result = $mysqli->query($query);
		
		if($result) {
			$fila = $result->fetch_assoc();
			$ofertaObj = new OfertaObjeto($fila['Numero'],$fila['Nombre'],$fila['Descripcion'],$fila['URL_Oferta'],
									$fila['URL_Imagen'],$fila['Valoracion'],$fila['Precio'],$fila['Creador']);
			return $ofertaObj;
		} else{
			echo"Error al buscar en la base de datos";
			return false;
		}	
	}
	
	//--------------------------------------------------Vista-----------------------------------------------------
	private function muestraComentariosOfertaString() {
		$productos = '';
		if(is_array($this->comentariosArray)){	//Comprueba si es un array para no dar un error
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
		}
		return $productos;
	}
	
	public function muestraOfertaString(){
		$DIRimagen=RUTA_IMGS;
		$DIRimagen.=$this->urlImagen;
	
	
		$productos = '';
		$productos.=<<<EOS
			<div id="tarjetaProducto">
				<button class="button" type="button">    
					<img src="imagenes/iconos/ok.png" width="15" height="15" alt="votos"/>    
					VOTOS: $this->valoracion
				</button>
				<div class="imgProducto">
					
					<img src="$DIRimagen" width="200" height="200" alt=$this->nombre />
				</div>
				<div class="desProducto">
					<p>Nombre del producto:</p>
					<p>$this->nombre</p>
					<p>Descripcion:</p>
					<p>$this->descripcion</p>
					<p>
							Enlaces:
							<a href="$this->urlOferta" rel="nofollow" target="_blank" >Enlace Oferta</a> /
							<a href="$this->urlOferta" rel="nofollow" target="_blank">Enlace a nuestra tienda -- no funciona--</a>
					</p>
				</div>
			</div>
		EOS;
		$productos.= $this->muestraComentariosOfertaString();
		return $productos;
	}
	
	//--------------------------------------------------GETTERS-----------------------------------------------------
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
		$DIRimagen=RUTA_IMGS;
		$DIRimagen.=$this->urlImagen;
		return $DIRimagen;
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
		return $this->comentariosArray;
	}
  }
?>
