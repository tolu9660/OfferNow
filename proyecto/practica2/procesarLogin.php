<?php
session_start();
$username = htmlspecialchars(trim(strip_tags($_REQUEST["username"])));
$password = htmlspecialchars(trim(strip_tags($_REQUEST["password"])));
$email = htmlspecialchars(trim(strip_tags($_REQUEST["email"])));

if ($username == "user" && $password == "userpass") {
$_SESSION["login"] = true;
$_SESSION["nombre"] = $username;
header("Location:contenido.php");
}
else if ($username == "admin" && $password == "adminpass") {
$_SESSION["login"] = true;
$_SESSION["nombre"] = $username;
$_SESSION["esAdmin"] = true;
header("Location: admin.php");
}
else{
	$_SESSION["login"] = null;
	$_SESSION["esAdmin"] = null;
}
?>
<!DOCTYPE html>
<html>
<head>
<div id="contenedor">
<?php
require("cabecera.php");
require("sidebarIzq.php");
?>
<main id="contenido">
<?php
if (!isset($_SESSION["login"])) { //Usuario incorrecto
echo "<h1>ERROR</h1>";
echo "<p>El usuario o contraseña no son válidos.</p>";
}
else { //Usuario registrado
echo "<h1>Bienvenido {$_SESSION['nombre']}</h1>";
echo "<p>Usa el menú de la izquierda para navegar.</p>";
}
?>
</main>
<?php
include("sidebarDer.php");
include("pie.php");
?>
</div> <!-- Fin del contenedor -->
</body></html>
