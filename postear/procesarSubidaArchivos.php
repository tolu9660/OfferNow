<?php

    public function subirArchivo($carpetaArchivoDir){
        //Comprueba la extension del archivo
        if (comprobarNombreArchivo($_FILES["productoImagen"]["name"]) &&
            comprobarLongitudArchivo($_FILES["productoImagen"]["name"]) &&
            comprobarExtensionArchivo() {
            
            $nuevoNombre = quitarCaracteresInvalidos($_FILES["productoImagen"]["name"]);
            $archivoDir = RUTA_IMGS.$carpetaArchivoDir.$nuevoNombre;
            $directorioServerArchivo = $_SERVER['DOCUMENT_ROOT'].$archivoDir;
            //Si la extension es correcta comprueba que el fichero no exista
            if(!file_exists($directorioServerArchivo)) {
                if (move_uploaded_file($nuevoNombre, "$directorioServerImg")) {
                    return $nuevoNombre;
                } else{
                    return false;
                }
            } else {
                //El fichero existe por lo que no se copia y se devuelve el nuevo nombre
                return $nuevoNombre;
            }
        } else{
            return false;
        }        
    }

    private function comprobarExtensionArchivo(){
        const $extensionesValidas = array('jpg', 'gif', 'png', 'jpeg');

        $end = explode(".", $_FILES["productoImagen"]["name"]);
        $extensionImagen = strtolower(end($end));
        if (in_array($extensionImagen, $extensionesValidas)) {
            return true;
        } else {
            return false;
        }
    }

    private function comprobarNombreArchivo($filename) {
        return (bool) ((mb_ereg_match('/^[0-9A-Z-_\.]+$/i',$filename) === 1) ? true : false );
    }

    private function comprobarLongitudArchivo($filename) {
        return (bool) ((mb_strlen($filename,'UTF-8') < 250) ? true : false);
    }

    private function quitarCaracteresInvalidos($filename) {
        $newName = mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $filename);
        $newName = mb_ereg_replace("([\.]{2,})", '', $newName);
        return $newName;
      }
?>