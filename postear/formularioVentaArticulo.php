<?php
require_once __DIR__.'/../includes/config.php';
require_once __DIR__.'/../includes/login/form.php';
require_once $_SERVER['DOCUMENT_ROOT'].RUTA_APP.'/clases/posiblesVentasObjeto.php';
//require_once __DIR__.'/../clases/OfertaObjeto.php';//por si el de arriba no va

class formularioVentaArticulo extends form{

    public function __construct() {
        parent::__construct('formVentaArticulo');
    }

    protected function generaCamposFormulario($datos, $errores = array()){
   
       

        // Se generan los mensajes de error si existen.
       /* $htmlErroresGlobales = self::generaListaErroresGlobales($errores);
        $errorNombreUsuario = self::createMensajeError($errores, 'nombreUsuario', 'span', array('class' => 'error'));
        $errorPassword = self::createMensajeError($errores, 'password', 'span', array('class' => 'error'));
      */
        $html = <<<EOF
            <div class="subirOferta">
            <div class="producto">
                <h1>Vender Articulo</h1>
                    <p>Nombre Articulo:</p>
                    <input type="text" name="articuloNombre"/>
                    <p>Descripción:</p>
                    <textarea name="articuloDescripcion" rows="10" cols="30"></textarea>
                    <p>Precio de venta:</p>
                    <input type="number" name="articuloPrecio"  />
                    <p>Nº Unidades:</p>
                    <input type="number" name="articuloUnidades"/>
                    <p>Imagen:</p>
                    <input type="file" name="productoImagen"/>
                    
                    <p><input type="submit" value="Publicar"></p>
            
            </div>
            </div>
        EOF;
        return $html;
    }

    protected function procesaFormulario($datos){
        $nombre = htmlspecialchars(trim(strip_tags($_POST["articuloNombre"])));
        $descripcion = htmlspecialchars(trim(strip_tags($_POST["articuloDescripcion"])));
        $precio = htmlspecialchars(trim(strip_tags($_POST["articuloPrecio"])));
        $unidades = htmlspecialchars(trim(strip_tags($_POST["articuloUnidades"])));
        //$imagen = htmlspecialchars(trim(strip_tags($_POST["productoImagen"])));
        $usuario = $_SESSION["correo"];
        
        if(Aplicacion::comprobarImagen("/art2mano/")){
            if (PosiblesVentasObjeto::subePeticionVentaArticuloBD($nombre,$descripcion,$unidades ,$precio, $_FILES["productoImagen"]["name"], $usuario)) {
                $result=<<<EOS
                    <h3>Tu peticion de venta ha sido enviada!</h3>
                EOS;
            } else {
                $result[]=<<<EOS
                    <h3>Error al enviar la peticion de venta</h3>;
                EOS;
            }
        }  else {
            $result[]= "Error: al subir la imagen, solo permite extensiones .png, .jpg, .jpeg y .gif";
        }
  
        return $result;
    }
}

?>