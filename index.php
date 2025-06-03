<?php
include 'auth.php';
include 'db.php';
$result = $conn->query("SELECT * FROM proyectos ORDER BY created_at DESC");
?>
link rel="stylesheet" type="text/css" href="<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">">
<a href="add.php">+ Agregar Proyecto</a> | <a href="logout.php">Cerrar sesión</a>
<h2>Proyectos</h2>
<?php while($row = $result->fetch_assoc()): ?>
  <div row class="mb-4">
    <h3><?= $row['titulo'] ?></h3>
    <p><?= $row['descripcion'] ?></p>
    <img src="uploads/<?= $row['imagen'] ?>" width="150"><br>
    <a href="<?= $row['url_github'] ?>">GitHub</a> |
    <a href="<?= $row['url_produccion'] ?>">Enlace</a><br>
    <a href="edit.php?id=<?= $row['id'] ?>">Editar</a> |
    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('¿Seguro?')">Eliminar</a>
  </div>
  <hr>
<?php endwhile; ?>