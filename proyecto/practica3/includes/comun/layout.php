<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<link rel="stylesheet" type="text/css" href="<?=RUTA_CSS.'/estilo.css'?>" />
		<title><?= $tituloPagina ?></title>
	</head>
	<body>
	
			<?php
				require(__DIR__.'/cabecera.php');
				require(__DIR__.'/sidebarIzq.php');
			?>
			<?= $contenidoPrincipal ?>
				

		
	</body>
</html>