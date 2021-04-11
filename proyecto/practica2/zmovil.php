
	   <?php

require_once __DIR__.'/./includes/comun/cabecera.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="estilo.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <link rel="stylesheet" href="/css/styles.css?v=<?php echo time(); ?>" />
        <script src="/js/functions.js?v=<?php echo time(); ?>"></script>


        <title>movil</title>
    </head>

    <body>
        <?php
                //    require('cabecera.php')	
        ?>
        <div id="tarjetaProducto">
            <button class="button" type="button">    
                <img src="imagenes/iconos/ok.png" width="15" height="15" alt="votos"/>    
                VOTOS: 1222

            </button>
           <div class="imgProducto">
                <img src="imagenes/productos/movil.png" width="200" height="200" alt="movil" />
           </div>
            <div class="desProducto">
                <p>
                    Descripción de la oferta 
                </p>
                <p>
                    Enlaces: 
                    <a href="/enlace-producto-2" rel="nofollow" target="_blank" >Enlace Oferta</a> /
                    <a href="/enlace-producto-2" rel="nofollow" target="_blank">Enlace a nuestra tienda</a>
                </p>
            </div>
            <div class="desProducto">
                <p>
                    Comentarios:
                </p>    
                <p>
                    <textarea name="Comentarios" placeholder= "Escribe tu comentario.." 
                                    rows="2" cols="30"></textarea>
                </p>
                <input type="button" value="publicar">
            </div>              
            
        </div>
    

    </body>
</html>