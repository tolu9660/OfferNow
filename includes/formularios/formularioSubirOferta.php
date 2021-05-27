<?php
require_once __DIR__.'/../config.php';
require_once RUTA_CLASES.'/form.php';
require_once RUTA_CLASES.'/ofertaObjeto.php';

class formularioSubirOferta extends form{

    public function __construct() {
        parent::__construct('formOferta');
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
                <h1>Subir Oferta</h1>
                    <p>Nombre oferta:</p>
                    <input type="text" name="ofertaNombre"/>
                    <p>Descripción:</p>
                    <textarea name="ofertaDescripcion" rows="10" cols="30"></textarea>
                    <p>Precio:</p>
                    <input type="number" name="ofertaPrecio"  />
                    <p>Url de la oferta (incluyendo https://):</p>
                    <input type="text" name="ofertaUrl"/>
                    <p>¿Tenemos esta oferta en nuestra tienda? ¡¡Pon el enlace!!:</p>
                    <input type="text" name="oferta2ManoUrl"/>
                    <p>Imagen:</p>
                    <input type="file" name="productoImagen"/>
                    
                    <p><input type="submit" value="Publicar"></p>
                </div>
            </div>
        EOF;
        return $html;
    }

    protected function procesaFormulario($datos){
        //Temporal
        //Si hay un link para el artciulo de 2 mano se procesa
        if(!empty($datos["oferta2ManoUrl"])){
            $cadena_buscada   = '?id=';
            $buscarCadena = explode($cadena_buscada, $datos["oferta2ManoUrl"]);
            //Se ha encontrado
            if($buscarCadena[1] == '') {
                echo $buscarCadena[1];
            } else {
                $result[]= "Error: el enlace a nuestro producto es incorrecto";
            }
        }

        $result = array();
        
        $nombre = htmlspecialchars(trim(strip_tags($datos["ofertaNombre"])));
        $descripcion = htmlspecialchars(trim(strip_tags($datos["ofertaDescripcion"])));
        $urlOferta = htmlspecialchars(trim(strip_tags($datos["ofertaUrl"])));
        $precio = htmlspecialchars(trim(strip_tags($datos["ofertaPrecio"])));
        $creador = $_SESSION["correo"];
        if(aplicacion::comprobarImagen("/ofertas/")){
            if (ofertaObjeto::subeOfertaBD($nombre,$descripcion,$urlOferta,$_FILES["productoImagen"]["name"],$precio,$creador )) {   
                $result = RUTA_APP.'/index.php';
            } else {
                $result[]= "Error: al crear la oferta";
               
            }
        } else {
            $result[]= "Error: al subir la imagen, solo permite extensiones .png, .jpg, .jpeg y .gif";
        }
        
        return $result;
    }

    protected function muestraResultadoCorrecto() {
        return "Oferta creada";
    } 
}
?>