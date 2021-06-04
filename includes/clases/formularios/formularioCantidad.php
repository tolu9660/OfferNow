<?php

require_once RUTA_FORMS.'/form.php';
require_once RUTA_USUARIO.'/usuarioBD.php';
require_once RUTA_USUARIO.'/usuarios.php';


class formularioCantidad extends form{
    private $idProducto;
    public function __construct($id,$cant) {
        parent::__construct('formCantidad');
         $this->idProducto=$id;
        $this->cantidad=$cant;
        $this->ok=false;
    }

    protected function generaCamposFormulario($datos, $errores = array()){
   
        // Se generan los mensajes de error si existen.
        $htmlErroresGlobales = self::generaListaErroresGlobales($errores);
        $errorCantidad = self::createMensajeError($errores, 'addCarrito', 'span', array('class' => 'error'));
       
        /*mostrar el contenido previo*/
        $html = <<<EOF
                    
            <input type="hidden" name="idProducto" value="{$this->idProducto}" />
            <p>Cantidad: <input type="number" name="cantidad" min="1" value="$this->cantidad"> 
                        <input type="submit" value="Agregar" > 
                        </p>
                     
                
      
        EOF;
        return $html;
    }

    protected function procesaFormulario($datos){
        $result = array();
        if(isset($datos['cantidad']) && isset($_SESSION["login"])){
            
        $cantidad = $datos['cantidad'] ?? '' ;
      
        $nombreUsuario =$_SESSION['nombre'];
        $idPro=$datos['idProducto'];
        $this->ok=true;
        //$result= RUTA_APP.'/nuestraTienda.php';
       
        $user=usuario::buscaUsuario($nombreUsuario);
        $user->addCarrito($idPro,$cantidad);     
            
        }
        else{
            $result=SESION.'/login.php';
        }
        
        
        return $result;
    }
    protected function muestraResultadoCorrecto() {
        if($this->ok){
            return "producto añadido al carrito";
        }
        else{
            return "no estas logeado";
        }
        
    }
}

?>
