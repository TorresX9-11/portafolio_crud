<?php
// Incluir el archivo de autenticación
include 'auth.php';
// Incluir el archivo de conexión a la base de datos
include 'db.php';

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $url_github = $_POST['url_github'];
    $url_produccion = $_POST['url_produccion'];

    // Obtener los datos de la imagen
    $imagen = $_FILES['imagen']['name'];
    $tmp = $_FILES['imagen']['tmp_name'];
    // Mover la imagen a la carpeta de uploads
    move_uploaded_file($tmp, "uploads/$imagen");

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO proyectos (titulo, descripcion, url_github, url_produccion, imagen) 
            VALUES ('$titulo', '$descripcion', '$url_github', '$url_produccion', '$imagen')";

    // Ejecutar la consulta
    $conn->query($sql);
    // Redirigir al usuario a la página principal
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Proyecto - Portafolio</title>
    <!-- Enlace a la hoja de estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body p-4">
                        <h4 class="card-title mb-4">Agregar Nuevo Proyecto</h4>
                        <!-- Formulario para agregar un nuevo proyecto -->
                        <form method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Título</label>
                                <input type="text" name="titulo" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descripción</label>
                                <textarea name="descripcion" class="form-control" rows="4" maxlength="200" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">URL GitHub</label>
                                <input type="url" name="url_github" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">URL Producción</label>
                                <input type="url" name="url_produccion" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Imagen</label>
                                <input type="file" name="imagen" class="form-control" required>
                            </div>
                            <div class="d-flex justify-content-between">
                                <!-- Enlace para cancelar la operación -->
                                <a href="index.php" class="btn btn-outline-secondary">Cancelar</a>
                                <!-- Botón para guardar el proyecto -->
                                <button type="submit" class="btn btn-primary">Guardar Proyecto</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enlace al bundle de JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
