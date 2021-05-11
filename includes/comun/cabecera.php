<header >
	<?php
		require_once __DIR__.'/../config.php';
	?>
    
	<div id= "titulo">
        <img id="logo" src="<?=RUTA_APP.'/imagenes/OfferNow_Logo.png'?>"  ALIGN=DOWN alt="OfferNowLogo"/>
        
        <h1>
        Tu página de ofertas preferida
        </h1>
	</div>


	<div id="contenedor1">
		<nav class="menu" class="col-4 my-auto mx-auto">
            <ul>
                <li><a href="<?=RUTA_APP.'/inicio.php'?>">Destacados</a></li>
                <li><a href="#">Todos -- No implementado</a></li>            
                <li><a href="<?=RUTA_APP.'/nuestraTienda.php'?>">Nuestra tienda</a></li>
                <li><a href="<?=SESION.'/login.php'?>">Inicio Sesión</a></li>
                <li><a href="<?=SESION.'/registro.php'?>">Registro</a></li>
                <!--<li><a href="<?=SESION.'/logout.php'?>">Cerrar Sesión</a></li>-->
                <li><a href='premium.php'>Hazte premium -- No implementado</a></li>
                <li><a href="<?=RUTA_APP.'/procesarcarrito.php'?>" rel="nofollow" target="_blank" class="button" > 
                    <img src="<?=RUTA_APP.'/imagenes/iconos/carrito.png'?>" class="carrito" alt="carrito"/> </a></li>
            </ul>
        </nav>
	</div>
</header>
	