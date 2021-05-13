<?php
require_once __DIR__.'/../includes/config.php';
require_once __DIR__.'/../includes/login/form.php';
require_once $_SERVER['DOCUMENT_ROOT'].RUTA_APP.'/clases/ofertaObjeto.php';
//require_once __DIR__.'/../clases/OfertaObjeto.php';//por si el de arriba no va

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
                    <p>Url de la oferta:</p>
                    <input type="text" name="ofertaUrl"/>
                    <p>Imagen:</p>
                    <input type="file" name="productoImagen"/>
                    
                    <p><input type="submit" value="Publicar"></p>
               
                </div>
            </div>
        EOF;
        return $html;
    }

    protected function procesaFormulario($datos){
        $result = array();
        
        $nombre = htmlspecialchars(trim(strip_tags($datos["ofertaNombre"])));
        $descripcion = htmlspecialchars(trim(strip_tags($datos["ofertaDescripcion"])));
        $urlOferta = htmlspecialchars(trim(strip_tags($datos["ofertaUrl"])));
        $precio = htmlspecialchars(trim(strip_tags($datos["ofertaPrecio"])));
        $creador = $_SESSION["correo"];
    
        /*
        //comprobaciones para la subida de imagenes
        $ofertaImagenDir = RUTA_IMGS."/ofertas".$_FILES["ofertaImagen"]["name"];
        $directorioServerImg = $_SERVER['DOCUMENT_ROOT'].$ofertaImagenDir;
        
    
        //Comprueba la extension del archivo
        $end = explode(".", $_FILES["ofertaImagen"]["name"]);
        $extensionImagen = strtolower(end($end));
        $extensionesValidas = array('jpg', 'gif', 'png', 'jpeg');
        if (in_array($extensionImagen, $extensionesValidas)) {
            //Si la extension es correcta mueve la imagen
            if (move_uploaded_file($_FILES['ofertaImagen']['tmp_name'], "$directorioServerImg")) {
                //Si ha movido la imagen la sube a la BD
                //if (OfertaObjeto::subeOfertaBD($nombre,$descripcion,$urlOferta,$ofertaImagenDir,$precio,$creador )) {
                if (OfertaObjeto::subeOfertaBD($nombre,$descripcion,$urlOferta,$_FILES["ofertaImagen"]["name"],$precio,$creador )) {
                    $contenidoPrincipal=<<<EOS
                        <h3>Oferta creada</h3>
                    EOS;
                } else {
                    $contenidoPrincipal=<<<EOS
                        <h3>Error: al crear la oferta</h3>;
                    EOS;
                }
            } else {
                $contenidoPrincipal=<<<EOS
                    <h3>La subida ha fallado</h3>;
                EOS;
            }
        } else {
            $contenidoPrincipal=<<<EOS
                <h3>El archivo no es valido (png, jpg o gif)</h3>;
            EOS;
        }
        */
        if(aplicacion::comprobarImagen("/ofertas/")){
            if (ofertaObjeto::subeOfertaBD($nombre,$descripcion,$urlOferta,$_FILES["productoImagen"]["name"],$precio,$creador )) {
                $result=<<<EOS
                    <h3>Oferta creada</h3>
                EOS;
            } else {
                $result[]= "Error: al crear la oferta";
               
            }
        } else {
            $result[]= "Error: al subir la imagen, solo permite extensiones .png, .jpg, .jpeg y .gif";
        }
    
        
        return $result;
    }
}

?>