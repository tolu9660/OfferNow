<?php

require_once __DIR__.'/config.php';


class Usuario{

  public static function login($username, $password){
    //echo $username."  ";
    //echo $password;
    $user = self::buscaUsuario($username);
    //la clase usuario está creada:
    //echo "\ncorreo: ".$user->idCorreo();
    //echo "\nnombre: ".$user->nombre();
   //IR AL METODO DE COMPROBACION DE CONTRASEÑA:
   //echo "\n CONTRASEÑA: ".$user->contra();
  
    if ($user && $user->compruebaPassword($password)) {
      $conn = getConexionBD();
      //echo "entro aqui";
      //hacer consulta de premium y admin

      //si devuelve un 1 el usuario es administrador 
      $consultaEsAdmin=sprintf("SELECT US.Admin FROM usuario US WHERE US.Correo='%s'",
                                $conn->real_escape_string($username));
      //si devuelve un 1 el usuario es premium
      $consultaEsPremium=sprintf("SELECT US.Premium FROM usuario US WHERE US.Correo='%s'",
                                  $conn->real_escape_string($username));
      //echo $consultaEsAdmin; 
      //echo $consultaEsPremium;      
      $rs = $conn->query($consultaEsAdmin);
      $rs1 = $conn->query($consultaEsPremium);
      if ($rs && $rs1){
        $fila1 = $rs->fetch_assoc();
        $fila2 = $rs1->fetch_assoc();
        //echo "DATOS LEIDOS\n". "es admin:".$fila1['Admin']. "\t ".$fila2["Premium"];
        if($fila1['Admin']==1){
          $user->esAdmin();

        }
        else if($fila2['Premium']==1){
          $user->esPremium();
        }
        //para comprobar que los atributos se estan volcando correctamente
        //echo "esAdmin:".$user->getAdmin();
        //echo "esPremium:".$user->getPremium();
        $rs->free();
        $rs1->free();
      } 
      return $user;
    }
    return false;
     
  }

  public static function buscaUsuario($username){
  
    $conn = getConexionBD();
    $consultaUsuario = sprintf("SELECT * FROM usuario WHERE Correo='%s'",
                    $conn->real_escape_string($username));
 
    $rs = $conn->query($consultaUsuario);
    //echo "resultado de la consulta: ". $consultaUsuario;
    if($rs && $rs->num_rows == 1){
      $fila = $rs->fetch_assoc();
      //para ver los datos obtenidos de la BD
     /* echo "DATOS LEIDOS\n". "correo:".$fila['Correo']." "." nombre: ".$fila['Nombre'].'\n'.
      " contraseña:".$fila['Contraseña'].'\n'/*." Es premium: ". $fila['Premium'].'\n'.
      " es admin:". $fila['Admin']*/;
      

      $user = new Usuario($fila['Correo'], $fila['Nombre'],$fila['Contraseña']
                  /*, $fila['Premium'], $fila['Admin']*/);
      $rs->free();
     
      return $user;
    }
    return false;
  }

  public static function buscaPorId($idUsuario){
    $conn = getConexionBD();
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
  }

  private $idCorreo;

  private $nombre;

  private $password;


////////////
  private $esAdmin;
  private $esPremium;
////////////
   function __construct($correo, $nombre,$contraseña){
    $this->idCorreo = $correo;
    $this->nombre = $nombre;
    $this->password =  $this->password = password_hash($contraseña, PASSWORD_DEFAULT);
    $this->esAdmin=0;
    $this->esPremium=0;
  }
  //cogerlo con pinzas este constructor
  function __construct1($correo, $nombre,$contraseña,$premium,$admin){
    $this->idCorreo = $correo;
    $this->nombre = $nombre;
    $this->password = $contraseña;
    $this->esAdmin=$admin;
    $this->esPremium=$premium;
  }
 
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

  public function cambiaPassword($nuevoPassword)  {
    $this->password = password_hash($nuevoPassword, PASSWORD_DEFAULT);
  }
}
