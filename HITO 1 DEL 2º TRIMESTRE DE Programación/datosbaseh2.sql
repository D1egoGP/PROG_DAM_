CREATE DATABASE streamweb;

USE streamweb;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    edad INT NOT NULL,
    plan_base ENUM('Básico', 'Estándar', 'Premium') NOT NULL,
    paquetes_adicionales VARCHAR(50),
    duracion ENUM('Mensual', 'Anual') NOT NULL,
    costo_total DECIMAL(10, 2) NOT NULL
);
