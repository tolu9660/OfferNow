<header >

	<?php
		require_once __DIR__.'/../config.php';
	?>

	<div id= "titulo">
	<img src="<?=RUTA_IMGS.'/OfferNow_Logo.ico'?>"  ALIGN=DOWN alt="OfferNowLogo"/>
	
	<h1>
	Tu página de ofertas preferida
	</h1>
	</div>
	<div id="contenedor1">
		<div class="menu" class="col-4 my-auto mx-auto">
            <ul>

            <div class="ch1">

                <li><a href="<?=RUTA_APP.'/inicio.php'?>">Destacados</a></li>
            </div>
            <div class="ch2">
                <li><a href="#">Todos -- No implementado</a></li>
            </div>
            <div class="ch3">
                <li><a href="<?=RUTA_APP.'/nuestraTienda.php'?>">Nuestra tienda</a></li>
            </div>

            </ul>
        </div>

        <div class="sesion">
            <ul>
            
                <li><a href="<?=SESION.'/login.php'?>">Inicio Sesión</a></li>
            
                <li><a href="<?=SESION.'/registro.php'?>">Registro</a></li>
            
                <!--<li><a href="<?=SESION.'/logout.php'?>">Cerrar Sesión</a></li>-->
               
                <li><a href='premium.php'>Hazte premium -- No implementado</a></li>
                
            </ul>
        </div>
		<div class="carrito">
			<!-- preguntar como darle funcionalidad al boton, ES CORRRECTO ?
			<button class="button">    
                <img src="imagenes/iconos/carrito.png" width="30" height="30" alt="votos"/>    
            </button>
            -->

			<a href="<?=RUTA_APP.'/zcarrito.php'?>" rel="nofollow" target="_blank" class="button" >

			<img src="<?=RUTA_IMGS.'/iconos/carrito.png'?>" width="40" height="40" alt="carrito"/>    

			</a>
		</div>

	</div>

	


</header>
		
