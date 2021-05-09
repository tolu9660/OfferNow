<?php


class Carrito{


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
    public function AgregarCarrito($producto) {     
        $this->productos[$this->contador]=$producto;
        $this->contador++;
    }

    public function eliminarCarrito($producto){
        $enc=false;
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
        }

    }
    public function agregarListaDeseos($producto){
        $this->listaDeseos[$this->contDeseos]=$producto;
        $this->contDeseos++;


     }
    
    public function listarCarrito(){
        $productos = '';
        $precioTotal=0;
		if(is_array( $this->productos)){	//Comprueba si es un array para no dar un error
			for($i = 0; $i < sizeof($this->productos); $i++){
				$articulo = $this->productos[$i]->muestraNombre();
                $precio = $this->productos[$i]->muestraPrecio();
                $descripcion = $this->productos[$i]->muestraDescripcion();
                $precioTotal +=$precio;
                $productos.=<<<EOS
					<div class="comProducto">
						<p>$articulo - $descripcion- $precio  </p>
				EOS;
            }
		}
        $productos.=<<<EOS
            <p> TOTAL: $precioTotal</p>
            </div>           
        EOS;
		return $productos;
    }
    
}
?>