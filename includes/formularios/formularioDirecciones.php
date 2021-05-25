<?php

require_once __DIR__.'/form.php';
require_once RUTA_USUARIO.'/usuarioBD.php';
require_once RUTA_USUARIO.'/usuarios.php';

class formularioDirecciones extends form{

    public function __construct() {
        parent::__construct('formDirecciones');
    }

    protected function generaCamposFormulario($datos, $errores = array()){
   
        $nombreUsuario =$_SESSION['nombre'];
        
        $user=usuario::buscaUsuario($nombreUsuario);
        
        // Se generan los mensajes de error si existen.
        $htmlErroresGlobales = self::generaListaErroresGlobales($errores);
        $errorDireccion = self::createMensajeError($errores, 'direccion', 'span', array('class' => 'error'));
        $errorDireccion1 = self::createMensajeError($errores, 'direccion1', 'span', array('class' => 'error'));
        $direccion=$user->Direccion();
        $html = <<<EOF
        <div class="iniciosesion">
            <h2>TUS DIRECCIONES </h2>
            <p><label>Direccion:</label> $direccion</p>
            <p><label>Nueva Direccion:</label> <input type="text" name="NuevaDir" /> $errorDireccion</p>
            <p><label>Confirma Direccion:</label> <input type="text" name="NuevaDir1" /> $errorDireccion1</p>
            $htmlErroresGlobales
            <button type="submit" name="login">Cambiar</button>
        </div>
      
        EOF;
        return $html;
    }

    protected function procesaFormulario($datos){
        $result = array();
        
        $dir =$datos['NuevaDir'] ?? null;
        $dir1 =$datos['NuevaDir1'] ?? null;
        if ( empty($dir) ) {
            $result['NuevaDir'] = "La direccion no puede estar vacia";
        }
        if ( empty($dir1) ) {
            $result['NuevaDir'] = "La confirmacion de la dirección no puede estar vacia";
        }
        if ( empty($dir1) ) {
            $result['NuevaDir1'] = "La confirmacion de la dirección no puede estar vacia";
        }
    
       
        if (count($result) === 0) {
            //se rompe al coloccar estas funciones que contienen el el codigo que viene abajo
            $nombreUsuario =$_SESSION['nombre'];
            $user=usuario::buscaUsuario($nombreUsuario);
            if($user->cambiaDireccion($dir)){
                $result = RUTA_APP.'/perfil.php';

            }
            else{
                $result[]="no se ha podido cambiar la direccion";
            }
            
                        
        }
        
        return $result;
    }
}

?>