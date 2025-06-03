<?php
// Incluir el archivo de autenticación
include 'auth.php';
// Incluir el archivo de conexión a la base de datos
include 'db.php';

// Obtener el ID del proyecto de la URL
$id = $_GET['id'];
// Obtener los datos del proyecto de la base de datos
$proyecto = $conn->query("SELECT * FROM proyectos WHERE id=$id")->fetch_assoc();

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $url_github = $_POST['url_github'];
    $url_produccion = $_POST['url_produccion'];

    // Verificar si se ha subido una nueva imagen
    if ($_FILES['imagen']['name']) {
        // Obtener los datos de la imagen
        $imagen = $_FILES['imagen']['name'];
        // Mover la imagen a la carpeta de uploads
        move_uploaded_file($_FILES['imagen']['tmp_name'], "uploads/$imagen");
        // Crear la parte de la consulta SQL para actualizar la imagen
        $img_sql = ", imagen='$imagen'";
    } else {
        // Si no se ha subido una nueva imagen, no actualizar la imagen
        $img_sql = "";
    }

    // Actualizar los datos del proyecto en la base de datos
    $sql = "UPDATE proyectos SET titulo='$titulo', descripcion='$descripcion', url_github='$url_github', url_produccion='$url_produccion' $img_sql WHERE id=$id";
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
    <title>Editar Proyecto - Portafolio</title>
    <!-- Enlace a la hoja de estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body p-4">
                        <h4 class="card-title mb-4">Editar Proyecto</h4>
                        <!-- Formulario para editar un proyecto -->
                        <form method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Título</label>
                                <input type="text" name="titulo" class="form-control" value="<?= $proyecto['titulo'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descripción</label>
                                <textarea name="descripcion" class="form-control" rows="4"><?= $proyecto['descripcion'] ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">URL GitHub</label>
                                <input type="url" name="url_github" class="form-control" value="<?= $proyecto['url_github'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">URL Producción</label>
                                <input type="url" name="url_produccion" class="form-control" value="<?= $proyecto['url_produccion'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Imagen</label>
                                <input type="file" name="imagen" class="form-control">
                                <small class="text-muted">Dejar vacío para mantener la imagen actual</small>
                            </div>
                            <div class="d-flex justify-content-between">
                                <!-- Enlace para cancelar la operación -->
                                <a href="index.php" class="btn btn-outline-secondary">Cancelar</a>
                                <!-- Botón para actualizar el proyecto -->
                                <button type="submit" class="btn btn-primary">Actualizar Proyecto</button>
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
