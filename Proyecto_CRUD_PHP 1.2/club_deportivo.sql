CREATE DATABASE club_deportivo;
USE club_deportivo;
CREATE TABLE socios (
    id_socio INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    telefono VARCHAR(20) NOT NULL,
    fecha_nacimiento DATE NOT NULL
);

CREATE TABLE eventos (
    id_evento INT AUTO_INCREMENT PRIMARY KEY,
    nombre_evento VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    fecha_evento DATE NOT NULL,
    lugar VARCHAR(255) NOT NULL
);

CREATE TABLE socios_eventos (
    id_socio_evento INT AUTO_INCREMENT PRIMARY KEY,
    id_socio INT,
    id_evento INT,
    FOREIGN KEY (id_socio) REFERENCES socios(id_socio),
    FOREIGN KEY (id_evento) REFERENCES eventos(id_evento)
);

-- Insertar Socios
INSERT INTO socios (nombre, apellido, email, telefono, fecha_nacimiento)
VALUES ('Juan', 'Pérez', 'juan.perez@example.com', '123456789', '1990-05-01'),
       ('Ana', 'Gómez', 'ana.gomez@example.com', '987654321', '1985-11-25');

-- Insertar Eventos
INSERT INTO eventos (nombre_evento, descripcion, fecha_evento, lugar)
VALUES ('Torneo de Fútbol', 'Torneo de fútbol anual del club', '2025-06-15', 'Estadio Municipal'),
       ('Conferencia de Salud', 'Conferencia sobre salud y bienestar', '2025-07-20', 'Salón de Eventos');

