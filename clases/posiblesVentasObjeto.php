<?php

require_once __DIR__.'/../includes/config.php';
require_once __DIR__.'/productoObjeto.php';
require_once __DIR__.'/art2ManoObjeto.php';

class posiblesVentasObjeto extends producto{

	private $unidades;
	private $creador;
	//private $precio;
	//private $urlImagen;
	
	function __construct($id, $nombre, $descripcion, $unidades, $precio, $urlImagen, $creador) {
		parent::creaPadre($id, $nombre, $descripcion, $urlImagen, $precio,"posiblescompras");
			//"SELECT * FROM posiblescompras WHERE SegundaManoID = '$id'");
		$this->unidades = $unidades;
		$this->creador = $creador;
	}

	//--------------------------------------------Funciones estaticas----------------------------------------------
	public static function cargarPosiblesCompras($orden){
		$result = parent::hacerConsulta("SELECT * FROM posiblescompras ORDER BY $orden");
		
		if($result) {
			$ofertasArray = null;
			for ($i = 0; $i < $result->num_rows; $i++) {
				$fila = $result->fetch_assoc();
				$ofertasArray[] = new posiblesVentasObjeto($fila['Numero'],$fila['Nombre'],$fila['Descripcion'],
									$fila['Unidades'],$fila['Precio'],$fila['Imagen'], $fila['UsuarioVendedor']);		
			}
			return $ofertasArray;
		}
		else{
			echo "Error in ".$query."<br>".$mysqli->error;
		}
	}
	
	public static function subePeticionVentaArticuloBD($nombre,$descripcion,$unidades ,$precio,	$imagen, $usuario) {
		$app = aplicacion::getSingleton();
		$mysqli = $app->conexionBd();
		$nombreFiltrado=$mysqli->real_escape_string($nombre);
		$descripcionFiltrado=$mysqli->real_escape_string($descripcion);;
		$unidadesFiltrado=$mysqli->real_escape_string($unidades);
		$precioFiltrado=$mysqli->real_escape_string($precio);
		$imagenFiltrado=$mysqli->real_escape_string($imagen);
		$usuarioFiltrado=$mysqli->real_escape_string($usuario);
	
		/*
		$app = Aplicacion::getSingleton();
		$mysqli = $app->conexionBd();
		$sql = "INSERT INTO posiblescompras (Nombre, Descripcion, Unidades, Precio, Imagen, UsuarioVendedor)
						VALUES ('$nombreFiltrado', '$descripcionFiltrado',
							'$unidadesFiltrado', '$precioFiltrado', '$imagenFiltrado', '$usuarioFiltrado')";
		*/

		$result = parent::hacerConsulta("INSERT INTO posiblescompras (Nombre, Descripcion, Unidades,
                                            Precio, Imagen, UsuarioVendedor)
		                                VALUES ('$nombreFiltrado', '$descripcionFiltrado', '$unidadesFiltrado',
                                            '$precioFiltrado', '$imagenFiltrado', '$usuarioFiltrado')");

		if ($result != null) {
			return true;
		} else {
			return false;
		}
	}
	
	public static function buscaPosiblesCompras($id) {
		$result = parent::hacerConsulta("SELECT * FROM posiblescompras WHERE Numero = '$id'");
		if($result != null) {
			$fila = $result->fetch_assoc();
			$ofertaObj = new posiblesVentasObjeto($fila['Numero'],$fila['Nombre'],$fila['Descripcion'],
							$fila['Unidades'],$fila['Precio'],$fila['Imagen'], $fila['usuarioVendedor']);
			return $ofertaObj;
		} else{
			echo"Error al buscar en la base de datos";
			return false;
		}
	}

	//Valida o rechaza las compras
	public static function aceptaCompra($id2Mano) {
		//Añadir el producto a la tabla de articulos segunda mano
		//Busca el objeto en la bd
		$result = parent::hacerConsulta("SELECT * FROM posiblescompras WHERE Numero = '$id2Mano'");
		if($result != null) {
			$fila = $result->fetch_assoc();
			//Aqui habria que pagar a la persona
			$vendedor = $fila['UsuarioVendedor'];
			//Sube el objeto comprado a la bd
			art2ManoObjeto::subeArt2ManoBD($fila['Nombre'],$fila['Descripcion'],
							$fila['Unidades'] ,$fila['Precio'],	$fila['Imagen']);
			//Quitar el producto de la tabla deposibles compras
			$result2 = parent::hacerConsulta("DELETE FROM posiblescompras WHERE Numero = '$id2Mano'");
			if($result2) {
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}

	public static function rechazaCompra($id2Mano) {
		//Quitar el producto de la tabla deposibles compras
		$result = parent::hacerConsulta("DELETE FROM posiblescompras WHERE Numero = '$id2Mano'");
		if($result) {
			return true;
		}
		else{
			return false;
		}
	}
	
	//--------------------------------------------------Vista-----------------------------------------------------		
	public function muestraPosibleCompraString(){
		$DIRimagen = $this->muestraURLImagen();
		$usuarioCreador = $this->muestraCreador();
		
		$nombreAux = parent::muestraNombre();
		$descripcionAux = parent::muestraDescripcion();

		$productos = '';
		$productos.=<<<EOS
		<div id="tarjetaProducto">
			<div class="imgProducto">
				<img src="$DIRimagen" width="200" height="200" alt=$nombreAux />
			</div>
			<div class="desProducto">
				<p>Nombre del producto: $nombreAux</p>
				<p>Descripcion:</p>
				<p>$descripcionAux</p>
				<p>Creador: $usuarioCreador</p>;
			</div>
		</div>
		EOS;
		return $productos;
	}
	
	//--------------------------------------------------GETTERS-----------------------------------------------------
	public function muestraUnidades() {
		return $this->unidades;
	}

	public function muestraCreador() {
		return $this->creador;
	}
	
	public function muestraURLImagen() {
		$DIRimagen=RUTA_IMGS."/art2mano/";
		$DIRimagen.=parent::muestraURLImagen();
		return $DIRimagen;
	}
  }