<?php

require_once RUTA_FORMS.'/form.php';
require_once RUTA_USUARIO.'/usuarioBD.php';
require_once RUTA_USUARIO.'/usuarios.php';

class formularioAniadeCarrito extends form{
    private $idProducto;
    public function __construct($id) {
        parent::__construct('formAniadeCarrito');
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
        <div class="iniciosesion">
            <button type="submit" name="login">Añadir Carrito</button>
        </div>
        
        EOF;
        return $html;
    }

    protected function procesaFormulario($datos){
        $result = array();
        if(isset($datos['idProducto']) && isset($_SESSION["login"])){
            
        $idProducto = $datos['idProducto'] ?? '' ;
        $nombreUsuario =$_SESSION['nombre'];
        $this->ok=true;
        $result= RUTA_APP.'/nuestraTienda.php';
       
        $user=usuario::buscaUsuario($nombreUsuario);
        $user->addCarrito($idProducto);     
            
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