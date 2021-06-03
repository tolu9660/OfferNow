<?php
require_once __DIR__.'/ofertaObjeto.php';
require_once RUTA_CLASES.'/productoObjeto.php';
require_once RUTA_CLASES.'/art2ManoObjeto.php';

class carritoObjeto{
    private $id;
    private $contador;
    private $contDeseos;
    private $usuario;
    private $productos;
    private $listaDeseos;

    function __construct($userId) {

	    $this->usuario=$userId;
		$this->contador =0;
        $this->contDeseos=0;
        $this->productos=array();
        $this->listaDeseos=array();  
	}

    // en caso de colocar 2 productos iguales y se quiera borrar  se va a seleccionar el primero
    // que encuentre
    public function AgregarCarrito($producto,$cantidad) {   
        $app = aplicacion::getSingleton();
        $mysqli = $app->conexionBd(); 
        $sql;
       
        if($cantidad===1){    
            echo "aqui" ;   
            $this->productos[$this->contador]=art2ManoObjeto::buscaArt2Mano($producto);
            $this->contador++;       
            $sql=" INSERT INTO carrito (idProducto,idUsuario,Comprado,unidades)
            VALUES ('$producto','$this->usuario',0,'$cantidad')";
         
        }else{
           
            $sql="UPDATE carrito SET unidades='$cantidad' WHERE IdProducto='$producto'";         
        }
        if (mysqli_query($mysqli, $sql)) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
            return false;
        }

    }
  
    public function eliminarCarrito($producto){
        $app = aplicacion::getSingleton();
        $mysqli = $app->conexionBd();
        
        $nombreUsuario = $_SESSION['nombre'];
        $producto = $_POST["idProducto"];

        $sql = "DELETE FROM carrito WHERE idProducto = '$producto' AND idUsuario = '$nombreUsuario'"; // filtrar por usuario
        $this->contador--;

        if (mysqli_query($mysqli, $sql)) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
            return false;
        }

        /*$enc=false;
        $i=0;
        while(!$enc && $i< $this->cont){
            if( $this->productos[$i]==$producto){
                $enc=true;
            }
            else{
                $i++;
            }
        }
        if($enc){
            unset($this->productos[$i]);
        }
        else{
            echo "no se encuentra el producto en el carrito";
        }*/

    }
    public function agregarListaDeseos($producto){
        $this->listaDeseos[$this->contDeseos]=$producto;
        $this->contDeseos++;
    }

    public function getCont(){
        return $this->contador;
    }

    public function precioTotal(){
        $precioTotal=0;
		if(is_array( $this->productos)){	//Comprueba si es un array para no dar un error
			for($i = 0; $i < sizeof($this->productos); $i++){
                $precio = $this->productos[$i]->muestraPrecio();
                $precioTotal +=$precio;
            }
		}
		return $precioTotal;     
    }
    public function cargarCarrito($idUser){
        
        $app = aplicacion::getSingleton();
		$mysqli = $app->conexionBd(); 
        $consultaCarritoCount = sprintf("SELECT COUNT(*) total FROM carrito WHERE idUsuario='%s'",
                    $mysqli->real_escape_string($idUser));
        $consultaCarrito = sprintf("SELECT * FROM carrito WHERE idUsuario='%s'",
                    $mysqli->real_escape_string($idUser));

        $result = $mysqli->query($consultaCarrito);
        $result1 = $mysqli->query($consultaCarritoCount);
        $fila1=$result1->fetch_assoc();
        if(($result && $result->num_rows >0) && $fila1['total']>0 ){
            $this->contador=$fila1['total'];
            for($i=0; $i < $result->num_rows; $i++){
                
                $fila=$result->fetch_assoc();
                $producto = art2ManoObjeto::buscaArt2Mano($fila['idProducto']);
                $this->productos[$i]=$producto;

            }
        }
        return $this->productos;
    }
}
?>