<?php
    require_once __DIR__.'/../includes/config.php';
    require_once RUTA_CLASES.'/posiblesVentasObjeto.php';

    $tituloPagina = "Vender articulo";
	$contenidoPrincipal='';

    $id2Mano = htmlspecialchars(trim(strip_tags($_POST["id"])));
    if(posiblesVentasObjeto::rechazaCompra($id2Mano)){
        $contenidoPrincipal=<<<EOS
            <h3>El producto se ha rechazado correctamente</h3>
        EOS;
    } else {
        $contenidoPrincipal=<<<EOS
            <h3>Error al rechazzar el producto</h3>;
        EOS;
    }

    require RUTA_LAYOUT.'/layout.php';
?>