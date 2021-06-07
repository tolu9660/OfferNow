<?php

require_once __DIR__.'/../config.php';
require_once RUTA_CLASES.'/carritoObjeto.php';

class usuario{
	
	private $idCorreo;
	private $nombre;
	private $password;
  private $esAdmin;
  private $esPremium;
  private $carrito;
  private $calle;

  function __construct($correo, $nombre,$contraseña,$calle){
    $this->idCorreo = $correo;
    $this->nombre = $nombre;
    $this->password = password_hash($contraseña, PASSWORD_DEFAULT);
    $this->esAdmin=0;
    $this->esPremium=0;
    $this->calle = $calle;
    $this->carrito= new carritoObjeto($this->idCorreo);
  }

  public static function login($username, $password){
    
    $user = self::buscaUsuario($username);
   
    if ($user && $user->compruebaPassword($password)) {
      $app = aplicacion::getSingleton();
		  $conn = $app->conexionBd();
      //hacer consulta de premium y admin
      //si devuelve un 1 el usuario es administrador 
      $consultaEsAdmin=sprintf("SELECT * FROM usuario WHERE Correo='%s'",
                                $conn->real_escape_string($username));			  
      $rs = $conn->query($consultaEsAdmin);
      //echo $consultaEsAdmin;
      if ($rs){
        $fila1 = $rs->fetch_assoc();
     
        if($fila1['Admin']==1){
         
          $user->esAdmin();
        }
        if($fila1['Premium']==1){
        
          $user->esPremium();
        }
        //para comprobar que los atributos se estan volcando correctamente
        //echo "esAdmin:".$user->getAdmin();
        //echo "esPremium:".$user->getPremium();
        $rs->free();
      } 
      return $user;
    }
    return false;
     
  }

  public static function buscaUsuario($username){
  
    $app = aplicacion::getSingleton();
    $conn = $app->conexionBd();
    $consultaUsuario = sprintf("SELECT * FROM usuario WHERE Correo='%s'",
                    $conn->real_escape_string($username));
    
    $rs = $conn->query($consultaUsuario);
    if($rs && $rs->num_rows == 1){
      $fila = $rs->fetch_assoc();
      //para ver los datos obtenidos de la BD
      /*echo "DATOS LEIDOS\n". "correo:".$fila['Correo']." "." nombre: ".$fila['Nombre'].'\n'.
      " contraseña:".$fila['Contraseña'].'\n'/*." Es premium: ". $fila['Premium'].'\n'.
      " es admin:". $fila['Admin']*/;
  
      $user = new usuario($fila['Correo'], $fila['Nombre'],'',$fila['Direccion']
                  /*, $fila['Premium'], $fila['Admin']*/);
      $user->setPass($fila['Contraseña']);
      if($fila['Admin']==1){
         
        $user->esAdmin();
      }
      if($fila['Premium']==1){
    
        $user->esPremium();
      }
      $rs->free();
     
      return $user;
    }
    return false;
  }

	public static function altaNuevoUsuario($email,$username,$password1,$password2,$calle){

		
		if($password1 != $password2){
			return false;
		}
		else{
       //creo un objeto de tipo usuario para poder usarlo en caso de que el 
      //usuario quisiera seguir navegando y al mismo tiempo  guardo la contraseña encriptada

      $user = new usuario($email, $username,$password1,$calle);
      $correo=$user->idCorreo();
      $usuario=$user->nombre();
      $pass=$user->contra();
			//Insert into inserta en la tabla comentarios y las columnas entre parentesis los valores en VALUES
			$app = aplicacion::getSingleton();
		  $mysqli = $app->conexionBd();
      //se filtra la informacion que se va a introducir en la BD:
      
      $usuarioFiltrado=$mysqli->real_escape_string($username);
      $correoFiltrado=$mysqli->real_escape_string($correo);
      $passFiltrado=$mysqli->real_escape_string($pass);
      $calleAUX=$mysqli->real_escape_string($calle);
      $calleFiltrado=str_replace(' ', ',', $calleAUX);
			$sql="INSERT INTO usuario (Correo, Nombre,Contraseña,Premium,Admin,Direccion)
					VALUES ('$correoFiltrado','$usuarioFiltrado','$passFiltrado',0,0,'$calleFiltrado')";
			if (mysqli_query($mysqli, $sql)) {
				//$mysqli->close();
				return true;
			} else {
				//$mysqli->close();
				echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
				return false;
			}
		}
	}
  


////////////

  /*
  //cogerlo con pinzas este constructor
  function __construct1($correo, $nombre,$contraseña,$premium,$admin){
    $this->idCorreo = $correo;
    $this->nombre = $nombre;
    $this->password = $contraseña;
    $this->esAdmin=$admin;
    $this->esPremium=$premium;
  }
 */
/////////////
  public function esAdmin(){
    $this->esAdmin=1;
  }
  public function esPremium(){
     $this->esPremium=1;
  }
  public function getAdmin()
  {
    return $this->esAdmin;
  }
  public function getPremium()
  {
    return $this->esPremium;
  } 
  public function contra()
  {
    return $this->password;
  }
  

////////////
  public function idCorreo()
  {
    return $this->idCorreo;
  }
  public function Direccion(){

    return explode(",",$this->calle);
  }


  public function nombre()
  {
    return $this->nombre;
  }

  public function compruebaPassword($password)  {
      
    return password_verify($password, $this->password);
  }
  public function setPass($pass){
    $this->password= $pass;
  }

  public function cambiarNombre($nuevoNombe)  {
    $app = aplicacion::getSingleton();
    $mysqli = $app->conexionBd();
    $sql="UPDATE usuario SET Nombre='$nuevoNombe'
    WHERE Correo='$this->idCorreo'";
          	if (mysqli_query($mysqli, $sql)) {
              //$mysqli->close();
              return true;
            } else {
              //$mysqli->close();
              echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
              return false;
            }
  }
  public function cambiaDireccion($nuevaDireccion)  {
    $this->calle = $nuevaDireccion;
    
    $app = aplicacion::getSingleton();
    $mysqli = $app->conexionBd();
    $sql="UPDATE usuario SET Direccion='$nuevaDireccion'
    WHERE Correo='$this->idCorreo'";
          	if (mysqli_query($mysqli, $sql)) {
              //$mysqli->close();
              return true;
            } else {
              //$mysqli->close();
              echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
              return false;
            }
  }
  public function listarPedidos(){
   $pedidos=carritoObjeto::listaDePedidos($this->idCorreo);
    return $pedidos;
  }
  public function cambiaPassword($nuevoPassword)  {
    $this->password = password_hash($nuevoPassword, PASSWORD_DEFAULT);
    
    
    $app = aplicacion::getSingleton();
    $mysqli = $app->conexionBd();
    $sql="UPDATE usuario SET Contraseña='$this->password'
    WHERE Correo='$this->idCorreo'";
          	if (mysqli_query($mysqli, $sql)) {
              //$mysqli->close();
              return true;
            } else {
              //$mysqli->close();
              echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
              return false;
            }
  }
  public function precio(){
    return $this->carrito->precioTotal();
    //header("location:procesarCarrito.php");
  }
  public function muestraCarrito(){
    
    $array=$this->carrito->cargarCarrito($this->idCorreo);
    return $array;
    //header("location:procesarCarrito.php");
    

  }
  public function addCarrito($idProducto,$cantidad=1){
    //actualizo
    if(!$this->carrito->ComprutebaCantidadProducto($idProducto) && $cantidad===0){
      
        $this->carrito->AgregarCarrito($idProducto,0);
  
    }
    elseif($this->carrito->ComprutebaCantidadProducto($idProducto) && $cantidad===0){
      echo "aqui";
      $this->carrito->AgregarCarrito($idProducto,1);
    }
    else{
      $this->carrito->AgregarCarrito($idProducto,$cantidad);
  
    }
  }

  public function quitarCarrito($idProducto){
    $this->carrito->eliminarCarrito($idProducto);
    header("location:procesarCarrito.php");
  }

}
