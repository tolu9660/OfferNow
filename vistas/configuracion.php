<?php
	require_once __DIR__.'/../includes/config.php';
	require __DIR__.'/../includes/usuario/usuarioBD.php';
	
	$usuario=$_SESSION['nombre'];
	$user= usuario::buscaUsuario($usuario);

    $tituloPagina = 'Configuracion';
    $nombre=$user->nombre();
    $correo=$user->idCorreo();
    $calle=$user-> Direccion();
   if($user->getPremium()){
    $esPremiun="Eres premium";
   }
   else{
    $ruta = SESION.'/premium.php';
       $esPremiun=<<<EOS
       "puedes serlo pinchando aqui" . <a href="$ruta">Hazte premium;
       EOS;
   }

//meterlo dentro de un formulario
    $contenidoPrincipal=<<<EOS
      <p>nombre de usuario: $nombre </p>  
      <p>correo: $correo </p>  
      <p>Dirección: $calle    </p>  
      <p>Eres premium: $esPremiun    </p>  
    EOS;

require RUTA_LAYOUT.'/layout.php';
