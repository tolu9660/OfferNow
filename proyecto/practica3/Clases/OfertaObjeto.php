<?php

require_once __DIR__.'/../includes/config.php';
require_once __DIR__.'/ComentarioObjeto.php';
require_once __DIR__.'/ProductoObjeto.php';

class OfertaObjeto extends producto{
	private $urlOferta;
	private $valoracion;
	private $creador;
	
	function __construct($id, $nombre, $descripcion, $urlOferta, $urlImagen, $valoracion, $precio, $creador) {
		parent::creaPadre($id, $nombre, $descripcion, $urlImagen, $precio,
			"SELECT * FROM comentariosoferta WHERE OfertaID = '$id' ORDER BY ValoracionUtilidad");
		$this->urlOferta = $urlOferta;
		$this->valoracion = $valoracion;
		$this->creador = $creador;
	}
	
	//--------------------------------------------Funciones estaticas----------------------------------------------
	public static function cargarOfertas($orden){
		$result = parent::hacerConsulta("SELECT * FROM oferta ORDER BY $orden");
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
	
	public static function subeOfertaBD($nombre,$descripcion,$urlOferta,$urlImagen,$precio,$creador) {
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();
		
		$nombreFiltrado=$mysqli->real_escape_string($nombre);
		$descripcionFiltrado=$mysqli->real_escape_string($descripcion);;
		$urlOfertaFiltrado=$mysqli->real_escape_string($urlOferta);
		$urlImagenFiltrado=$mysqli->real_escape_string($urlImagen);
		$precioFiltrado=$mysqli->real_escape_string($precio);
		$creadorFiltrado=$mysqli->real_escape_string($creador);
	
	
		//Insert into inserta en la tabla oferta y las columnas entre parentesis los valores en VALUES
		$sql = "INSERT INTO oferta (Nombre, Descripcion, URL_Oferta, URL_Imagen, Valoracion, Precio, Creador)
					VALUES ('$nombreFiltrado', '$descripcionFiltrado', '$urlOfertaFiltrado', '$urlImagenFiltrado', 0, '$precioFiltrado', '$creadorFiltrado')";
		
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
	public function muestraOfertaString(){
		$DIRimagen = $this->muestraURLImagen();

		$nombreAux = parent::muestraNombre();
		$descripcionAux = parent::muestraDescripcion();
		$creadornAux = $this->muestraCreador();

		$productos = '';
		$productos.=<<<EOS
			<div id="tarjetaProducto">
			<p>Creador: $creadornAux</p>
				<button class="button" type="button">    
					<img src="imagenes/iconos/ok.png" width="15" height="15" alt="votos"/>    
					VOTOS: $this->valoracion
				</button>
				<div class="imgProducto">
					
					<img src="$DIRimagen" width="200" height="200" alt=$nombreAux />
				</div>
				<div class="desProducto">
					<p>Nombre del producto: $nombreAux</p>
					<p>Descripcion:</p>
					<p>$descripcionAux</p>
					<p>
						Enlaces:
						<a href="$this->urlOferta" rel="nofollow" target="_blank" >Enlace Oferta</a> /
						<a href="$this->urlOferta" rel="nofollow" target="_blank">Enlace a nuestra tienda -- no funciona--</a>
					</p>
				</div>
			</div>
		EOS;
		$productos.= parent::muestraComentariosString();
		return $productos;
	}
	
	//--------------------------------------------------GETTERS-----------------------------------------------------
	function muestraURLImagen() {
		$DIRimagen=RUTA_IMGS."/ofertas/";
		$DIRimagen.=parent::muestraURLImagen();
		return $DIRimagen;
	}
	
	function muestraCreador() {
		return $this->creador;
	}

	function muestraValoracion() {
		return $this->valoracion;
	}

	function muestraURLOferta() {
		return $this->urlOferta;
	}
  }
?>
