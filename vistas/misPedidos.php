<?php
	require_once __DIR__.'/../includes/config.php';
	require_once RUTA_FORMS.'/formularioDirecciones.php';
	
    $tituloPagina = 'Direcciones';
    $nombreUsuario =$_SESSION['nombre'];
    $user=usuario::buscaUsuario($nombreUsuario);
    $listaPedidos=$user->listarPedidos();
    $productos=<<<EOS
    <div id="contenedor">
        <ul class="rejilla">
EOS;
    if(is_array($listaPedidos)) {
        for ($i = 0; $i < sizeof($listaPedidos); $i++) {
			$nombreOferta=strval($listaPedidos[$i]->muestraNombre());
			$precioOferta=strval($listaPedidos[$i]->muestraPrecio());
			$urlImagen=strval($listaPedidos[$i]->muestraURLImagen());
			//URL del producto junto con el id
			$id = PRODUCTOS.'/productoSegundaMano.php?id='.$listaPedidos[$i]->muestraID();
			$productos.=<<<EOS
				<li>
					<a href=$id rel="nofollow">
						<img src=$urlImagen width="200" height="200" alt="Producto" />
						<h3>$nombreOferta</h3>
						<p>$precioOferta €
					</a>
				</li>	
			EOS;
		}

    }

//meterlo dentro de un formulario
    $contenidoPrincipal=<<<EOS
    $productos
    </ul>
    </div>
EOS;

require RUTA_LAYOUT.'/layout.php';
