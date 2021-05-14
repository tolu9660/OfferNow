<?php

require_once __DIR__.'/../config.php';
require_once __DIR__.'/../../clases/carrito.php';



class usuario{
	
	private $idCorreo;
	private $nombre;
	private $password;

  public static function login($username, $password){
    //echo "nombre usuario ".$username."  ";
    //echo $password;
    $user = self::buscaUsuario($username);
    //la clase usuario está creada:
    //echo "\ncorreo: ".$user->idCorreo();
    //echo "\nnombre: ".$user->nombre();
   //IR AL METODO DE COMPROBACION DE CONTRASEÑA:
   //echo "\n CONTRASEÑA: ".$user->contra();
  
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
        //echo "DATOS LEIDOS\n". "es admin:".$fila1['Admin']. "\t ".$fila2["Premium"];
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
      
	
      $user = new usuario($fila['Correo'], $fila['Nombre'],''
                  /*, $fila['Premium'], $fila['Admin']*/);
      $user->setPass($fila['Contraseña']);
      $rs->free();
     
      return $user;
    }
    return false;
  }
  // FUNCION DUPLICADA... NO SE USA -> QUE EL CONSTRUCTOR1 TAMPOCO SE USE.
/*
  public static function buscaPorId($idUsuario){
    $app = Aplicacion::getSingleton();
		  $conn = $app->conexionBd();
    $query = sprintf("SELECT * FROM usuario WHERE Correo='%s'",
                      $conn->real_escape_string($idUsuario));
   
    $rs = $conn->query($query);
    if ($rs && $rs->num_rows == 1) {
      $fila = $rs->fetch_assoc();
      $user = new Usuario($fila['Correo'], $fila['Nombre'], 
                      $fila['Contraseña'],$fila['Premium'],$fila['Admin']);
      $rs->free();

      return $user;
    }
    return false;
  }*/

	public static function altaNuevoUsuario($email,$username,$password1,$password2){

		
		if($password1 != $password2){
			return false;
		}
		else{
       //creo un objeto de tipo usuario para poder usarlo en caso de que el 
      //usuario quisiera seguir navegando y al mismo tiempo  guardo la contraseña encriptada

      $user = new usuario($email, $username,$password1);
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
      
			$sql="INSERT INTO usuario (Correo, Nombre,Contraseña,Premium,Admin)
					VALUES ('$correoFiltrado','$usuarioFiltrado','$passFiltrado',0,0)";
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
  private $esAdmin;
  private $esPremium;
  private $carrito;
////////////
   function __construct($correo, $nombre,$contraseña){
    $this->idCorreo = $correo;
    $this->nombre = $nombre;
    $this->password =password_hash($contraseña, PASSWORD_DEFAULT);
    $this->esAdmin=0;
    $this->esPremium=0;
    $this->carrito= new carrito( $this->idCorreo);
  }
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


  public function nombre()
  {
    return $this->nombre;
  }

  public function compruebaPassword($password)  {
    //echo "contraseña que llega:".$password;
    //falla aqui no realiza bien la comprobacion
   
    return password_verify($password, $this->password);
  }
  public function setPass($pass){
    $this->password= $pass;
  }


  public function cambiaPassword($nuevoPassword)  {
    $this->password = password_hash($nuevoPassword, PASSWORD_DEFAULT);
  }
  public function precio(){
    return $this->carrito->precioTotal();
  }
  public function muestraCarrito(){
    
    $array=$this->carrito->cargarCarrito($this->idCorreo);
    
    return $array;

  }
}
