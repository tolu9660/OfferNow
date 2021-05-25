
<?php
	require_once __DIR__.'/includes/config.php';

	$tituloPagina = 'Mi perfil';
    $IconoPedido=RUTA_ICONOS.'/pedidos.png';
    $IconoDirecciones=RUTA_ICONOS.'/Direcciones.png';
    $IconoPagos=RUTA_ICONOS.'/TusPagos.png';
    $IconoConfiguracion=RUTA_ICONOS.'/inicioSeguridad.png';
    $rutaConfiguracion=SESION.'/configuracion.php';
    $rutaDirecciones=SESION.'/direcciones.php';
   
    if (isset($_SESSION["login"]) ) {
        $contenidoPrincipal=<<<EOS
        <div id="contenedor">
            <ul class="rejillaPerfil">
            <li>
                <a href=# rel="nofollow">
                    <img src=$IconoPedido width="100" height="100" alt="Pedidos" />
                    <h3>MIS PEDIDOS</h3>
                    <p>Los pedidos que has realizado</p>
                </a>
            </li>	
            <li>
                <a href=$rutaDirecciones rel="nofollow">
                    <img src=$IconoDirecciones width="100" height="100" alt="Pedidos" />
                    <h3>TUS DIRECCIONES</h3>
                    <p>Modifica tus direcciones</p>
                </a>
            </li>	
            <li>
                <a href=# rel="nofollow">
                    <img src=$IconoPagos width="100" height="100" alt="Pedidos" />
                    <h3>TUS PAGOS</h3>
                    <p>Configura tu forma de pago</p>
                </a>
            </li>	
            <li>
            <a href=$rutaConfiguracion rel="nofollow">
                <img src=$IconoConfiguracion width="100" height="100" alt="Pedidos" />
                <h3>CONFIGURACION</h3>
                <p>Modificar y configurar cuenta</p>
            </a>
        </li>
            </ul>
        </div>
    EOS;
        
} else {
        $ruta = SESION  ;
        $ruta.='/login.php';
        $contenidoPrincipal=<<<EOS
            Usuario desconocido. Inicia Sesion <a href=$ruta>Login</a>;
        EOS;
}

require RUTA_LAYOUT.'/layout.php';
