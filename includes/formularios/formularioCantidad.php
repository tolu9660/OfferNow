<?php

require_once RUTA_CLASES.'/form.php';
require_once RUTA_USUARIO.'/usuarioBD.php';
require_once RUTA_USUARIO.'/usuarios.php';


class formularioCantidad extends form{
    private $idProducto;
    public function __construct($id) {
        parent::__construct('formCantidad');
        $this->idProducto=$id;
        $this->ok=false;
    }

    protected function generaCamposFormulario($datos, $errores = array()){
   
        // Se generan los mensajes de error si existen.
        $htmlErroresGlobales = self::generaListaErroresGlobales($errores);
        $errorDireccion = self::createMensajeError($errores, 'addCarrito', 'span', array('class' => 'error'));
       
        /*mostrar el contenido previo*/
        $html = <<<EOF
                    
            <input type="hidden" name="idProducto" value="{$this->idProducto}" />
            <p>Cantidad: <input type="number" name="cantidad" min="1" value="1"> 
                        <input type="submit" value="agregar"></p>
                
      
        EOF;
        return $html;
    }

    protected function procesaFormulario($datos){
        $result = array();
        if(isset($datos['cantidad']) && isset($_SESSION["login"])){
            
        $cantidad = $datos['cantidad'] ?? '' ;
        $nombreUsuario =$_SESSION['nombre'];
        $this->ok=true;
        //$result= RUTA_APP.'/nuestraTienda.php';
       
        $user=usuario::buscaUsuario($nombreUsuario);
        $user->addCarrito($this->idProducto,$cantidad);     
            
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