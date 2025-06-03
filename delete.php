<?php
// Incluir el archivo de autenticación
include 'auth.php';
// Incluir el archivo de conexión a la base de datos
include 'db.php';
// Obtener el ID del proyecto de la URL
$id = $_GET['id'];

// Eliminar el proyecto de la base de datos
$conn->query("DELETE FROM proyectos WHERE id=$id");
// Redirigir al usuario a la página principal
header("Location: index.php");
?>
