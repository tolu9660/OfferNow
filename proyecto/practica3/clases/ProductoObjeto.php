<?php


class producto{


    private $id;
	private $nombre;
	private $descripcion;
	private $urlImagen;
	private $precio;
	private $comentariosArray;


function __construct($id, $nombre, $descripcion, $urlImagen, $precio) {
		$this->id = $id;
		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
		$this->urlImagen = $urlImagen;
		$this->precio = $precio;
		

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

        if($resultOferta) {
            $fila = $result->fetch_assoc();
            $ofertaObj = new OfertaObjeto($fila['Numero'],$fila['Nombre'],$fila['Descripcion'],
                                    $fila['URL_Oferta'],$fila['URL_Imagen'],$fila['Valoracion'],
                                    $fila['Precio'],$fila['Creador']);
        }            
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
 


}