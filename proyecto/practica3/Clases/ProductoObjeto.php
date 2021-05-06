<?php

abstract class producto{
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

    //Creo que es mejor dividirla en 2 y bajarla a los hijos
    protected function cargaComentarios($tablaDondeBuscarComentarios) {
		//$mysqli = getConexionBD();
		//$query = "SELECT * FROM comentariosoferta WHERE OfertaID = '$this->id' ORDER BY ValoracionUtilidad";
		//$result = $mysqli->query($query);
		//$auxID = parent::muestraID();tablaDondeBuscarComentarios
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

    //tabla producto necesito id, idProducto, columana que indique el producto(realizo la consula en ambas tablas)
    public static function buscaProducto($id) {// agregar Realescape string
        $ofertaObj=false;
        $app = Aplicacion::getSingleton();
        $mysqli = $app->conexionBd();
        $query =sprintf("SELECT * FROM producto WHERE idProductoAsociado  = '%s'",
                    $mysqli->real_escape_string($id));
        $result = $mysqli->query($query);
        
        if($result) {
            //lectura del tipo de producto
            $query =sprintf("SELECT * FROM oferta WHERE Numero = '%s'",
                        $mysqli->real_escape_string($id));
            $resultOferta = $mysqli->query($query);

            //Si es oferta
            if($resultOferta) {
                $fila = $result->fetch_assoc();
                $ofertaObj = new OfertaObjeto($fila['Numero'],$fila['Nombre'],$fila['Descripcion'],
                                        $fila['URL_Oferta'],$fila['URL_Imagen'],$fila['Valoracion'],
                                        $fila['Precio'],$fila['Creador']);
            }
            //Si es 2mano
            else{
                $query = "SELECT * FROM articulos_segunda_mano WHERE Numero = '$id'";
                $result = $mysqli->query($query);
                
                if($result) {
                    $fila = $result->fetch_assoc();
                    $ofertaObj = new Art2ManoObjeto($fila['Numero'],$fila['Nombre'],$fila['Descripcion'],
                                        $fila['Unidades'],$fila['Precio'],$fila['Imagen']);
                }
            }
        } else{
            echo"Error al buscar en la base de datos";
        }
        return $ofertaObj;
    }
    public static function cargarProductos($tipo){
        $arrayProductos=false;
        $app = Aplicacion::getSingleton();
        $mysqli = $app->conexionBd();

        $query = sprintf("SELECT * FROM producto WHERE tipoProducto = '%s'",
                $mysqli->real_escape_string($tipo));

        $result = $mysqli->query($query);
        if($result) {   
            if($tipo=="ofertaObjeto"){
                for ($i = 0; $i < $result->num_rows; $i++) {
                    $fila = $result->fetch_assoc();
                    $arrayProductos[] = new OfertaObjeto($fila['Numero'],$fila['Nombre'],$fila['Descripcion'],$fila['URL_Oferta'],
                                                $fila['URL_Imagen'],$fila['Valoracion'],$fila['Precio'],$fila['Creador']);
                }
            }
            else if ($tipo=="2mano"){
                for ($i = 0; $i < $result->num_rows; $i++) {
                    $fila = $result->fetch_assoc();
                    $arrayProductos[] = new Art2ManoObjeto($fila['Numero'],$fila['Nombre'],$fila['Descripcion'],
                                        $fila['Unidades'],$fila['Precio'],$fila['Imagen']);		
                }
            }
        }
        return $arrayProductos;
    }
    public static function subirProductos($tipo,$arrayDatos){
        if($tipo=="ofertaObjeto"){
        
        }
        else if ($tipo=="2mano"){
        
        }
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