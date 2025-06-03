<?php
// Incluir el archivo de autenticación
include 'auth.php';
// Incluir el archivo de conexión a la base de datos
include 'db.php';
// Realizar una consulta a la base de datos para obtener todos los proyectos ordenados por fecha de creación descendente
$result = $conn->query("SELECT * FROM proyectos ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio - Dashboard</title>
    <!-- Enlace a la hoja de estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <!-- Enlace al título del portafolio -->
            <a class="navbar-brand" href="#">Portafolio</a>
            <div class="d-flex">
                <!-- Enlace para agregar un nuevo proyecto -->
                <a href="add.php" class="btn btn-success me-2">+ Agregar Proyecto</a>
                <!-- Enlace para cerrar sesión -->
                <a href="logout.php" class="btn btn-outline-light">Cerrar sesión</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <?php 
            // Bucle para recorrer cada fila del resultado de la consulta
            while($row = $result->fetch_assoc()): ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100">
                        <!-- Imagen del proyecto -->
                        <img src="uploads/<?= $row['imagen'] ?>" class="card-img-top" alt="<?= $row['titulo'] ?>">
                        <div class="card-body">
                            <!-- Título del proyecto -->
                            <h5 class="card-title"><?= $row['titulo'] ?></h5>
                            <!-- Descripción del proyecto -->
                            <p class="card-text"><?= $row['descripcion'] ?></p>
                        </div>
                        <div class="card-footer bg-white border-top-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <!-- Enlace al repositorio de GitHub -->
                                    <a href="<?= $row['url_github'] ?>" class="btn btn-sm btn-outline-secondary" target="_blank">GitHub</a>
                                    <!-- Enlace al sitio en producción -->
                                    <a href="<?= $row['url_produccion'] ?>" class="btn btn-sm btn-outline-primary" target="_blank">Ver sitio</a>
                                </div>
                                <div>
                                    <!-- Enlace para editar el proyecto -->
                                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                                    <!-- Enlace para eliminar el proyecto -->
                                    <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <!-- Enlace al bundle de JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
