<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="<?=RUTA_CSS.'/estilo.css'?>" />
		<title><?= $tituloPagina ?></title>
	</head>
	<body>
		<div class="contenedor">
			<?php
				require(__DIR__.'/cabecera.php');
				require(__DIR__.'/sidebarIzq.php');
			?>
			<main>
				<article>
					<?= $contenidoPrincipal ?>
				</article>
			</main>
		</div>
	</body>
</html>