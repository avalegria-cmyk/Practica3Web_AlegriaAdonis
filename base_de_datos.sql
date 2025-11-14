CREATE DATABASE IF NOT EXISTS almacen_mvc CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE almacen_mvc;

CREATE TABLE IF NOT EXISTS Producto (
    idProducto INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    cantidad INT NOT NULL,
    precio DECIMAL(10,2) NOT NULL
);
