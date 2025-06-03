Este es mi portafolio CRUD, capaz de agregar, editar y eliminar proyectos, ingresandolos desde una interfaz de usuario. 
Esta implementado localmente en xamp, para que funcione debes de implementar este codigo SQL:

-- Crear la base de datos portafolio_db
CREATE DATABASE IF NOT EXISTS portafolio_db;
-- Usar la base de datos portafolio_db
USE portafolio_db;

-- Crear la tabla users
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL
);

-- Crear la tabla proyectos
CREATE TABLE IF NOT EXISTS proyectos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(100) NOT NULL,
  descripcion TEXT NOT NULL,
  url_github VARCHAR(255),
  url_produccion VARCHAR(255),
  imagen VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insertar un usuario de prueba (usuario: admin, contraseña: 123456)
INSERT INTO users (username, password) VALUES ('admin', MD5('123456'));


Uso de IA: se utilizo la iA para aplicar y corregir bootstrap5, aparte a esto comentar el codigo.
