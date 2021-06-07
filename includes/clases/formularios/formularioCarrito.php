<?php
require_once RUTA_FORMS.'/form.php';
require_once RUTA_USUARIO.'/usuarioBD.php';

class formularioCarrito extends form{

    public function __construct() {
        parent::__construct('formCarrito');
    }

    protected function generaCamposFormulario($datos,$errores = array()){
        $htmlErroresGlobales = self::generaListaErroresGlobales($errores);
        $errorNumeroTarjeta = self::createMensajeError($errores, 'numeroTarjeta', 'span', array('class' => 'error'));
        $errorNombre = self::createMensajeError($errores, 'username', 'span', array('class' => 'error'));
        $errorPassword = self::createMensajeError($errores, 'password', 'span', array('class' => 'error'));
        $usu = $_SESSION["correo"];
        $html = <<<EOF
        
        <div class="iniciosesion">
            <h1>Pago de usuario: $usu</h1>
            <p><label>Numero de tarjeta:  </label> <input type="number" name="numeroTarjeta"/>$errorNumeroTarjeta</p>
            <p><label>Titular:</label> <input type="text" name="username" />$errorNombre</p>
            <p><label>Codigo C/V:</label> <input type="password" name="password" />$errorPassword</p>
            $htmlErroresGlobales
            <input type="checkbox" name="cb-terminosservicio" required> Acepto los términos del servicio<br>
            <input type="submit" value="crear">
        </div>
        EOF;
    
        return $html;
    }
    
    protected function procesaFormulario($datos){
        $tarjetaCorrecta = true;
        $result = array();
        
        $numeroTarjeta = $datos['numeroTarjeta'] ?? '';
        //$nombre = $datos['nombre'] ?? '';
        $nombreUsuario = $datos['username'] ?? null;
        
        if (empty($numeroTarjeta) || mb_strlen($numeroTarjeta) != 16 ) {
            $result['numeroTarjeta'] = "El numero de la tarjeta debe que tener 16 caracteres.";
            $tarjetaCorrecta = false;
        }
        
        $titular = isset($datos["username"]) ? $datos["username"] : null;
        if (empty($titular)) {
            $result['username']  = "Tienes que poner un titular.";
            $tarjetaCorrecta = false;
        }

        $codigo = isset($datos["password"]) ? $datos["password"] : null;
        if ( empty($codigo) || mb_strlen($codigo) != 3 ) {
            $result['password'] = "El password tiene que tener una longitud de 3 caracteres.";
            $tarjetaCorrecta = false;
        }

        //Si todos los campos son correctos
        if($tarjetaCorrecta){
            $compras = carritoObjeto::listaDePedidos($_SESSION["correo"], 0);
            $app = aplicacion::getSingleton();
            $mysqli = $app->conexionBd();
            //Obtengo el carrito del usuario
            if(is_array($compras)) {
                for ($i=0; $i < sizeof($compras); $i++) {
                    $idProducto = $compras[$i]->muestraID();
                    $unidadesCompradas = carritoObjeto::getUnidadesProducto($idProducto);
                    //Update de la tablla carrito poniendo el bit de comprado a true
                    $mysqli->query("UPDATE carrito SET Comprado = 1 WHERE idProducto = $idProducto");
                    //update de la tabla articulos_segunda_mano restando las unidades compradas
                    $mysqli->query("UPDATE articulos_segunda_mano SET Unidades = (Unidades-$unidadesCompradas)
                                WHERE Numero = $idProducto");
                }
            }
        }
        return $result;
    }
}
?>