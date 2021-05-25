<?php
	require_once __DIR__.'/../includes/config.php';
	require __DIR__.'/../includes/usuario/usuarioBD.php';
	
	$usuario=$_SESSION['nombre'];
	$user= usuario::buscaUsuario($usuario);
  echo "saqui";
    $tituloPagina = 'Direcciones';
   
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
    <h2>TU DIRECCION ACTUAL</h2>
    <p>Dirección: $calle </p>  
   
    EOS;

require RUTA_LAYOUT.'/layout.php';
