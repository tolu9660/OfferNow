<?php

require_once __DIR__.'/Form.php';
require_once __DIR__.'/../usuario/usuarioBD.php';
require_once __DIR__.'/../usuario/usuarios.php';

class FormularioLogin extends Form{

    public function __construct() {
        parent::__construct('formLogin');
    }

    protected function generaCamposFormulario($datos){
   
        $nombreUsuario = '';
        if ($datos) {
            $nombreUsuario = isset($datos['nombreUsuario']) ? $datos['nombreUsuario'] : $nombreUsuario;
        }
        $html = <<<EOF
        <fieldset>
            <legend>Usuario y contraseña</legend>
            <p><label>Nombre de usuario:</label> <input type="text" name="nombreUsuario" value="$nombreUsuario"/></p>
            <p><label>Password:</label> <input type="password" name="password" /></p>
            <button type="submit" name="login">Entrar</button>
        </fieldset>
        EOF;
        return $html;
    }

    protected function procesaFormulario($datos){
        $result = array();
       //comprobacion de que llega bien los datos->ok
       //echo  "usuario Introducido:". $datos['nombreUsuario'];
       //echo " contraseña ". $datos['password'];

        $nombreUsuario = isset($datos['nombreUsuario']) ? $datos['nombreUsuario'] : null;
                
        if ( empty($nombreUsuario) ) {
            $result[] = "El nombre de usuario no puede estar vacío";
        }
        
        $password = isset($datos['password']) ? $datos['password'] : null;
        if ( empty($password) ) {
            $result[] = "El password no puede estar vacío.";
        }
        
        if (count($result) === 0) {
            //se rompe al coloccar estas funciones que contienen el el codigo que viene abajo
            logout();
           checkLogin();
           if (!estaLogado()) {
            $result[]="El usuario o contraseña no son válidos";
           }
           else{
            $result="Usa el menú de la izquierda para navegar.";
			
           }
            /*$usuario = usuario::login($nombreUsuario, $password);
            if ( ! $usuario ) {
                // No se da pistas a un posible atacante
                $result[] = "El usuario o el password no coinciden";
            } else {
                $_SESSION['login'] = true;
                $_SESSION["nombre"] = $usuario->nombre();
                $_SESSION["correo"] = $usuario->idCorreo();
                $_SESSION["esPremium"] =$usuario->getPremium();
                $_SESSION['esAdmin'] =$usuario->getAdmin();
                $result = 'inicio.php';
                echo "valor de correo obtenido en la sesion: ". $_SESSION["correo"];
            }*/
        }
        return $result;
    }
}

?>