<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Portafolio</title>
    <!-- Enlace a la hoja de estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center min-vh-100 align-items-center">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body p-4">
                        <h4 class="card-title text-center mb-4">Iniciar Sesión</h4>
                        <!-- Formulario de inicio de sesión -->
                        <form method="post">
                            <div class="mb-3">
                                <input type="text" name="username" class="form-control" placeholder="Usuario" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
                        </form>
                        <?php // Mostrar mensaje de error si existe 
                        if (isset($error)): ?>
                            <div class="alert alert-danger mt-3" role="alert">
                                <?= $error ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    // Iniciar la sesión
    session_start();
    // Incluir el archivo de conexión a la base de datos
    include 'db.php';

    // Verificar si el formulario ha sido enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener el nombre de usuario y la contraseña del formulario
        $username = $_POST['username'];
        // Encriptar la contraseña usando MD5
        $password = md5($_POST['password']);

        // Consulta SQL para verificar las credenciales del usuario
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);

        // Si se encuentra un usuario con las credenciales proporcionadas
        if ($result->num_rows === 1) {
            // Establecer la variable de sesión 'user'
            $_SESSION['user'] = $username;
            // Redirigir al usuario a la página principal
            header("Location: index.php");
        } else {
            // Si las credenciales son incorrectas, establecer la variable de error
            $error = "Credenciales incorrectas.";
        }
    }
    ?>

    <!-- Enlace al bundle de JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
