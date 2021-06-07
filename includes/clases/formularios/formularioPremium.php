<?php

require_once RUTA_FORMS.'/form.php';
require_once RUTA_USUARIO.'/usuarioBD.php';
require_once RUTA_USUARIO.'/usuarios.php';


class formularioPremium extends form{
    public function __construct() {
        parent::__construct('formPremium');
        $this->ok=false;
    }

    protected function generaCamposFormulario($datos, $errores = array()){
   
        $html = <<<EOF
        <h1>¿QUIERES ENTERARTE DE LAS OFERTAS ANTES QUE NADIE?</h1>
        <h2>ESCOGE TU PACK: </h2>
            <input type="submit" value="1 mes por 3 euros."></p>
            <input type="submit" value="3 meses por 7 euros."></p>
            <input type="submit" value="12 meses por 25 euros."></p>
        EOF;
        return $html;
    }

    protected function procesaFormulario($datos){
        $result = array();
        if(isset($_SESSION["login"])){

        $nombreUsuario =$_SESSION['correo'];

        $this->ok=true;
        $user=usuario::buscaUsuario($nombreUsuario);
        $user->hacerPremium(); 
        $result= RUTA_APP.'/nuestraTienda.php';
        }
        else{
            $result=SESION.'/login.php';
        }
        
        
        return $result;
    }
    protected function muestraResultadoCorrecto() {
        if($this->ok){
            return "Importaremos de tu cuenta la cantidad. ¡Disfruta del contenido!";
        }
        else{
            return "no estas logeado";
        }
        
    }
}

?>