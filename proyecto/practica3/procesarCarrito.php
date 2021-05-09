<?php

require_once __DIR__.'/includes/config.php';

require_once __DIR__.'/includes/usuario/usuarios.php';


$tituloPagina = 'carrito';

if(estaLogado()){
	echo $_SESSION["nombre"];
	$user=Usuario::buscaUsuario( $_SESSION["nombre"]);
	$user->muestraCarrito();


}
else{
	$contenidoPrincipal=<<<EOS
	Porfavor  inicie sesion;
	EOS;

}






/*
$contenidoPrincipal=<<<EOS
<div="contenedor">

<h2> BORRADOR -- NO FUNCIONA</h2>
<table>
   <caption>TU PEDIDO</caption>
   <thead>
	   <tr>
		   <th>PRODUCTO</th>
		   <th>DESCRIPCION</th>
		   <th>PRECIO</th>
		   <th>CANTIDAD</th>
	   </tr>
   </thead>	
   <tr>
	   <div class="imgProducto">
		   <td> <img src="imagenes/productos/movil.png" width="200" height="200" alt="movil" /> </td>
	  </div>
   </div>
   <div class="descripcion">
	   <td>Iphone 12 </td>
   </div>
	   <div class="info">
			   <div class="precio">
	   <td>900</td>
   </div>
   <div class="cantidad">
	   <td>3</td>
   </div>
   </div>
   
   </tr>
   <tr>
	   <div class="imgProducto">
		   <td> <img src="imagenes/productos/nevera.png" width="200" height="200" alt="nevera" /> </td>
	  </div>
   <div class="descripcion">
	   <td>Bosh</td>
   </div>
	   <div class="info">
			   <div class="precio">
	   <td>750</td>
   </div>
   <div class="cantidad">
	   <td>1</td>
   </div>
   </div>
   </table>
</div>
EOS;
*/
require __DIR__.'/includes/comun/layout.php';