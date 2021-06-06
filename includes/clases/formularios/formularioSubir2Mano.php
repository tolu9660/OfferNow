<?php
require_once RUTA_FORMS.'/form.php';
require_once RUTA_CLASES.'/art2ManoObjeto.php';

class formularioSubir2Mano extends form{
    public function __construct() {
        parent::__construct('formOferta2Mano');
    }

    protected function generaCamposFormulario($datos, $errores = array()){
        $html = <<<EOF
            <div class="subirOferta">
            <div class="producto">
                <h1>Subir Articulo Segunda Mano</h1>                
                    <p>Nombre Articulo:</p>
                    <input type="text" name="articuloNombre"/>
                    <p>Descripción:</p>
                    <textarea name="articuloDescripcion" rows="10" cols="30"></textarea>
                    <p>Precio:</p>
                    <input type="number" name="articuloPrecio"  />
                    <p>Nº Unidades:</p>
                    <input type="number" name="articuloUnidades"/>
                    <p>Imagen:</p>
                    <input type="file" name="productoImagen"/>
                    <p><input type="checkbox" name="premium" value="false">¿Es Premium?</p>
                    
                    <p><input type="submit" value="Publicar"></p>
            </div>
        </div>
        EOF;
        return $html;
    }

    protected function procesaFormulario($datos){
        $result = array();
        
       //Muestra si se ha subido o no
        $nombre = htmlspecialchars(trim(strip_tags($datos["articuloNombre"])));
        $descripcion = htmlspecialchars(trim(strip_tags($datos["articuloDescripcion"])));
        $unidades = htmlspecialchars(trim(strip_tags($datos["articuloUnidades"])));
        $precio = htmlspecialchars(trim(strip_tags($datos["articuloPrecio"])));

        if(isset($_POST['premium'])){
            $esPremium = true;
        }
        else{
            $esPremium = false;
        }
        
        //$imagen = htmlspecialchars(trim(strip_tags($_POST["productoImagen"])));
        $nombreNuevo = aplicacion::comprobarImagen("/art2mano/");
        if($nombreNuevo != false){
            if (art2ManoObjeto::subeArt2ManoBD($nombre,$descripcion,$unidades,
                        $precio, $nombreNuevo, $esPremium)) {
                $result = RUTA_APP.'/nuestraTienda.php';
            } else {
                $result[]="Error: al crear articulo de segunda mano";
            }
        } else {
            $result[]= "Error: al subir la imagen, solo permite extensiones .png, .jpg, .jpeg y .gif";
        }
        return $result;
    }

    protected function muestraResultadoCorrecto() {
        return "Articulo de segunda mano creado";
    } 
}
?>