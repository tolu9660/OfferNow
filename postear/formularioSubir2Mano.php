<?php
require_once __DIR__.'/../includes/config.php';
require_once __DIR__.'/../includes/login/form.php';
require_once $_SERVER['DOCUMENT_ROOT'].RUTA_APP.'/clases/art2ManoObjeto.php';
//require_once __DIR__.'/../clases/OfertaObjeto.php';//por si el de arriba no va

class formularioSubir2Mano extends form{

    public function __construct() {
        parent::__construct('formOferta2Mano');
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
	//$imagen = htmlspecialchars(trim(strip_tags($_POST["productoImagen"])));
	
	if(aplicacion::comprobarImagen("/art2mano/")){
		if (art2ManoObjeto::subeArt2ManoBD($nombre,$descripcion,$unidades ,$precio,	$_FILES["productoImagen"]["name"])) {
        
            $result=<<<EOS
                <h3>Articulo de segunda mano creado</h3>
            EOS;
			
		} else {
            $result[]="Error: al crear articulo de segunda mano";
		}
	} else {
        $result[]= "Error: al subir la imagen, solo permite extensiones .png, .jpg, .jpeg y .gif";
	}
    return $result;
}

}

?>