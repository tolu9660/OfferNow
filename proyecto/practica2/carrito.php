   
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="estilo.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <link rel="stylesheet" href="/css/styles.css?v=<?php echo time(); ?>" />
        <script src="/js/functions.js?v=<?php echo time(); ?>"></script>


        <title>carrito</title>
    </head>

    <body>
        <?php
                    require('cabecera.php')	
        ?>
		
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
    </body>
</html>