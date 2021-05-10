<?php

abstract class Producto{
    private $id;
	private $nombre;
	private $descripcion;
	private $urlImagen;
	private $precio;
	private $comentariosArray;

    /*//No vale para nada ya que es abstracto
    function __construct($id, $nombre, $descripcion, $urlImagen, $precio) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->urlImagen = $urlImagen;
        $this->precio = $precio;
    }
    */

    protected function creaPadre($id, $nombre, $descripcion, $urlImagen, $precio, $tablaDondeBuscarComentarios) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->urlImagen = $urlImagen;
        $this->precio = $precio;
        $this->cargaComentarios($tablaDondeBuscarComentarios);
    }

    //Creo que es mejor dividirla en 2 y bajarla a los hijos -> si lo haces no va por cosas estaticas y objetos no creados
    protected function cargaComentarios($tablaDondeBuscarComentarios) {
        if($tablaDondeBuscarComentarios == "comentariosoferta"){
            $result = $this->hacerConsulta("SELECT * FROM comentariosoferta WHERE OfertaID = '$this->id' ORDER BY ValoracionUtilidad");
            if($result != null) {		
                for ($i = 0; $i < $result->num_rows; $i++) {
                    $fila = $result->fetch_assoc();
                    $this->comentariosArray[] = new ComentarioObjeto($fila['ID'],$fila['Texto'],$fila['Titulo'],
                            $fila['ValoracionUtilidad'], $fila['UsuarioID'],$fila['OfertaID']);
                }
            }
        } else if ($tablaDondeBuscarComentarios == "comentariossegundamano"){
            $result = $this->hacerConsulta("SELECT * FROM comentariossegundamano WHERE SegundaManoID = '$this->id' ORDER BY ValoracionUtilidad");
            if($result != null) {		
                for ($i = 0; $i < $result->num_rows; $i++) {
                    $fila = $result->fetch_assoc();
                    $this->comentariosArray[] = new ComentarioObjeto($fila['ID'],$fila['Texto'],$fila['Titulo'],
                            $fila['ValoracionUtilidad'], $fila['UsuarioID'],$fila['SegundaManoID']);
                }
            }
        } else{
            $result = null;
        }
	}

    protected static function hacerConsulta($query){
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();
		$result = $mysqli->query($query);	
		if($result) {
			return $result;
		}
		else{
			return null;
		}
	}

    protected function muestraComentariosString() {
        
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
    ///////////////////////////SETTERS//////////////////////////////////
    protected function setComentariosArray($arrayComent){
        $this->comentariosArray = $arrayComent;
    }
    ///////////////////////////GETTERS//////////////////////////////////
    public function muestraID() {
		return $this->id;
	}
	
	public function muestraNombre() {
		return $this->nombre;
	}
	public function muestraDescripcion() {
		return $this->descripcion;
	}

    function muestraURLImagen() {
        return $this->urlImagen;
	}

    public function muestraPrecio() {
		return $this->precio;
	}
	
	public function muestraComentarios() {
		return $this->comentariosArray;
	}
}