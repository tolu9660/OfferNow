<?php
	require_once __DIR__.'/../includes/config.php';
	require_once RUTA_CLASES.'/productoObjeto.php';

	productoObjeto::incrementarVotosProducto(file_get_contents('php://input'));
?>