<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="estilo.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="/css/styles.css?v=<?php echo time(); ?>" />
        <script src="/js/functions.js?v=<?php echo time(); ?>"></script>
        <title>Registrar usuario</title>
    </head>
    <body>
		<div="contenedor">
			<?php
				require_once __DIR__.'/includes/config.php';
				
				$email = htmlspecialchars(trim(strip_tags($_REQUEST["email"])));
				$username = htmlspecialchars(trim(strip_tags($_REQUEST["username"])));
				$password1 = htmlspecialchars(trim(strip_tags($_REQUEST["password1"])));
				$password2 = htmlspecialchars(trim(strip_tags($_REQUEST["password2"])));
				
				if($password1 != $password2){
					echo "<h3>Las contraseñas no coinciden!</h3>";
				}
				else{
					$mysqli = getConexionBD();
					//Insert into inserta en la tabla comentarios y las columnas entre parentesis los valores en VALUES
					$sql = "INSERT INTO usuario (Correo, Nombre, Contraseña, Premium, Admin)
								VALUES ('$email', '$username', '$password1', 0, 0)";
					
					if (mysqli_query($mysqli, $sql)) {
						echo "<h3>Usuario registrado con exito!</h3>";
					} else {
						echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
					}
					mysqli::close();
				}
			?>
		</div>
	</body>
</html>