<?php
// Archivo de configuración de la base de datos

// Host de la base de datos
$host = "localhost";
// Nombre de la base de datos
$db = "portafolio_db";
// Usuario de la base de datos
$user = "root";
// Contraseña de la base de datos
$pass = "";

// Crear una nueva conexión a la base de datos
$conn = new mysqli($host, $user, $pass, $db);
// Verificar si hay errores de conexión
if ($conn->connect_error) {
  // Si hay un error, mostrar un mensaje de error y detener la ejecución
  die("Error de conexión: " . $conn->connect_error);
}
?>
