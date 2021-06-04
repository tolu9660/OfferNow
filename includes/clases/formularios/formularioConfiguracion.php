<?php

require_once RUTA_FORMS.'/form.php';
require_once RUTA_USUARIO.'/usuarioBD.php';
require_once RUTA_USUARIO.'/usuarios.php';

class formularioConfiguracion extends form{

    public function __construct() {
        parent::__construct('formConfiguracion');
    }

    protected function generaCamposFormulario($datos, $errores = array()){
   
        $nombreUsuario =$_SESSION['nombre'];
        
        $user=usuario::buscaUsuario($nombreUsuario);
        $nombre=$user->nombre();
        $correo=$user->idCorreo();
        $calle= $user->Direccion();//str_replace(' ', '-nº', $user->Direccion());
        if($user->getPremium()){
       
            $esPremium="Eres premium";
        }
        else{
            echo "premium";
            $ruta = SESION.'/premium.php';
            $esPremium=<<<EOS
                Puedes serlo pinchando aqui <a href="$ruta">Hazte premium;</a>
            EOS;
        }
        // Se generan los mensajes de error si existen.
        $htmlErroresGlobales = self::generaListaErroresGlobales($errores);
        $errorDireccion = self::createMensajeError($errores, 'NuevoNombre', 'span', array('class' => 'error'));
       
        /*mostrar el contenido previo*/
        $html = <<<EOF
        <div class="iniciosesion">
            <h2>TUS DATOS </h2>
            <p><label>Nombre de usuario: </label><input type="text" name="NuevoNombre" value=$nombre /> $errorDireccion </p>  
            <p><label>Correo: </label> $correo</p>  
            <p>
            <label>Direccion: </label>$calle[0]  <label> Nº</label> $calle[1] 
            $errorDireccion
            </p> 
            <p><label>Rango: </label> $esPremium</p>  
            
            $htmlErroresGlobales
            <button type="submit" name="login">Cambiar</button>
        </div>
      
        EOF;
        return $html;
    }

    protected function procesaFormulario($datos){
        $result = array();
        
        $nuevoNombre =$datos['NuevoNombre'] ?? null;
        
        if ( empty($nuevoNombre) ) {
            $result['NuevoNombre'] = "El campo correo no puede estar vacia";
        }
       
        if (count($result) === 0) {
            //se rompe al coloccar estas funciones que contienen el el codigo que viene abajo
            $nombreUsuario =$_SESSION['nombre'];
            $user=usuario::buscaUsuario($nombreUsuario);
            if($user->cambiarNombre($nuevoNombre)){
                $result = RUTA_APP.'/perfil.php';
            }
            else{
                $result[]="no se ha podido cambiar la direccion";
            }            
        }
        return $result;
    }

    protected function muestraResultadoCorrecto() {
        return "La configuración se ha modificado correctamente";
    } 
}

?>