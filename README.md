# Proyecto MVC en PHP (CRUD de Productos)

## Descripción del proyecto
Este proyecto implementa el patrón MVC (Modelo–Vista–Controlador) en PHP para gestionar productos dentro de un sistema de almacén.  
Incluye funcionalidades para crear, listar, editar y eliminar productos utilizando una estructura organizada, separación de responsabilidades y conexión a MySQL.

## Estructura del proyecto
```
mvc_proyecto/
│
├── index.php
│
├── controladores/
│   ├── Controlador.php
│   ├── InicioControlador.php
│   └── ProductoControlador.php
│
├── modelos/
│   ├── Conexion.php
│   ├── Modelo.php
│   └── productoModelo.php
│
├── vistas/
│   ├── html.php
│   ├── Inicio/
│   │   └── home.php
│   └── Producto/
│       ├── crear.php
│       ├── actualizar.php
│       ├── exito.php
│       └── todo.php
│
├── js/
│   └── logica.js
│
└── css/
    └── estilos.css
```

## Tecnologías utilizadas
- PHP 7+
- MySQL o MariaDB
- Bootstrap 4
- jQuery
- Servidor local XAMPP

## Funcionamiento del patrón MVC

### 1. Modelo
El modelo maneja:
- La conexión a la base de datos.
- El mapeo de atributos.
- Las validaciones.
- Las consultas SQL.

### 2. Controlador
Interpreta acciones desde la URL y envía datos a las vistas.

### 3. Vistas
Contienen el HTML con los datos enviados por el controlador.

### 4. Enrutador (index.php)
Interpreta rutas como:
```
index.php/controlador/accion
```

## Base de datos
```sql
CREATE DATABASE almacen_mvc;
USE almacen_mvc;

CREATE TABLE Producto (
    idProducto INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    cantidad INT NOT NULL,
    precio DECIMAL(10,2) NOT NULL
);
```

## Rutas principales
- index.php/inicio/home  
- index.php/producto/todo  
- index.php/producto/crear  
- index.php/producto/actualizar?id=1  

## Autor
Proyecto práctico para aprendizaje del patrón MVC en PHP.
