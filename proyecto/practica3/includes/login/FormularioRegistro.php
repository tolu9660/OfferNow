

<?php
require_once __DIR__.'/form.php';
require_once __DIR__.'/../usuario/usuarioBD.php';


class FormularioRegistro extends Form{

    public function __construct() {
        parent::__construct('formRegistro');
    }

    protected function generaCamposFormulario($datos){
     
        $nombreUsuario = '';
        $nombre = '';
        if ($datos) {
            $nombreUsuario = isset($datos['nombreUsuario']) ? $datos['nombreUsuario'] : $nombreUsuario;
            $nombre = isset($datos['nombre']) ? $datos['nombre'] : $nombre;
        }
        $html = <<<EOF
        <div id=contenedor>
            <h1>Registro de usuario</h1>
           
            <p><label> Usuario:  </label> <input type="text" name="username"/></p>
       
            <p><label>E-mail:</label> <input type="text" name="email" /></p>
           
            <p><label>Contraseña:</label> <input type="password" name="password1" /></p>
            
             <p><label>Confirmar contraseña:</label> <input type="password" name="password2" /></p>
            
            <input type="checkbox" name="cb-terminosservicio" required> Acepto los términos del servicio<br>
            <input type="submit" value="crear">
        </form>
        </div>
        EOF;
      /*
        $html = <<<EOF
		<fieldset>
			<div class="grupo-control">
				<label>Nombre de usuario:</label> <input class="control" type="text" name="nombreUsuario" value="$nombreUsuario" />
			</div>
			<div class="grupo-control">
				<label>Nombre completo:</label> <input class="control" type="text" name="nombre" value="$nombre" />
			</div>
			<div class="grupo-control">
				<label>Password:</label> <input class="control" type="password" name="password" />
			</div>
			<div class="grupo-control"><label>Vuelve a introducir el Password:</label> <input class="control" type="password" name="password2" /><br /></div>
			<div class="grupo-control"><button type="submit" name="registro">Registrar</button></div>
		</fieldset>
EOF;*/

        return $html;
    }
    
    protected function procesaFormulario($datos){
        $result = array();
        
        $nombreUsuario = isset($datos["username"]) ? $datos["username"] : null;
        
        if ( empty($nombreUsuario) || mb_strlen($nombreUsuario) < 5 ) {
            $result[] = "El nombre de usuario tiene que tener una longitud de al menos 5 caracteres.";
        }
        
        $correo = isset($datos["email"]) ? $datos["email"] : null;
        if ( empty($correo) || mb_strlen($correo) < 5 ) {
            $result[] = "El nombre tiene que tener una longitud de al menos 5 caracteres.";
        }
        
        $password1 = isset($datos["password1"]) ? $datos["password1"] : null;
        if ( empty($password1) || mb_strlen($password1) < 5 ) {
            $result[] = "El password tiene que tener una longitud de al menos 5 caracteres.";
        }
        $password2 = isset($datos['password2']) ? $datos['password2'] : null;
        if ( empty($password2) || strcmp($password1, $password2) !== 0 ) {
            $result[] = "Los passwords deben coincidir";
        }

      
        if (count($result) === 0) {
        //echo "contraseña: ".$password1;
           if(usuario::altaNuevoUsuario($correo,$nombreUsuario,$password1,$password2)){
            $result ="Usuario registrado con exito!";
            ////////////////////////////////////////////
            //necesito darle valores de admin y premium.
            $_SESSION['login'] = true;
            $_SESSION['nombre'] = $nombreUsuario;
			$_SESSION["correo"] = $correo;
            $_SESSION["esPremium"] = false;
            $_SESSION["esAdmin"] = false;
            $result = 'index.php';
            }
            else{
                $result[]="Error en el registro!";
            }
            
            // $user = usuario::crea($nombreUsuario, $nombre, $password, 'user');
            /*if ( ! $user ) {
                $result[] = "El usuario ya existe";
            } else {
                $_SESSION['login'] = true;
                $_SESSION['nombre'] = $nombreUsuario;
                $result = 'index.php';
            }*/
        }
        return $result;
    }
}
?>