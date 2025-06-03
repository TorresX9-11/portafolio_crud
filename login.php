<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
  <div class="row justify-content-center min-vh-100 align-items-center">
    <div clas= col md-6>
      <form method="post">  
      <input type="text" name="username" placeholder="Usuario" required><br>
      <input type="password" name="password" placeholder="Contraseña" required><br>
      <button type="submit">Iniciar Sesión</button>
    </form>
    </div>
    
  </div>
  
<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $result = $conn->query($sql);

  if ($result->num_rows === 1) {
    $_SESSION['user'] = $username;
    header("Location: index.php");
  } else {
    echo "Credenciales incorrectas.";
  }
}
?>
  
</body>
</html>
