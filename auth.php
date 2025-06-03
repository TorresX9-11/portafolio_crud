<?php
// Iniciar la sesión
session_start();
// Verificar si la variable de sesión 'user' no está establecida
if (!isset($_SESSION['user'])) {
  // Redirigir al usuario a la página de inicio de sesión
  header("Location: login.php");
  // Salir del script
  exit;
}
?>
