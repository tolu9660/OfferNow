<?php

require_once RUTA_FORMS.'/form.php';
require_once RUTA_CLASES.'/posiblesVentasObjeto.php';

class formularioVentaArticulo extends form{

    public function __construct() {
        parent::__construct('formVentaArticulo');
    }

    protected function generaCamposFormulario($datos, $errores = array()){
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
        
        $nombreNuevo = aplicacion::comprobarImagen("/art2mano/");
        if($nombreNuevo != false){
            if (posiblesVentasObjeto::subePeticionVentaArticuloBD($nombre, $descripcion, $unidades,
                        $precio, $nombreNuevo, $usuario)) {
                $result = RUTA_APP.'/index.php';
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

    protected function muestraResultadoCorrecto() {
        return "¡Tu peticion de venta ha sido enviada!";
    } 
}
?>