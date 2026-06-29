CREATE DATABASE ecomirador_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE ecomirador_db;

-- 1. Tabla de Responsables de Áreas (Andres Flores)
CREATE TABLE responsables (
    id_responsable INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    correo VARCHAR(100) UNIQUE NOT NULL,
    telefono VARCHAR(20),
    area_asignada VARCHAR(50) NOT NULL, -- Ej: 'Senderos', 'Avistamiento', 'Glamping'
    rol VARCHAR(30) DEFAULT 'Operador', -- Ej: 'Admin', 'Guía', 'Operador'
    PASSWORD VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=INNODB;

-- 2. Tabla de Clientes (Visitantes / Turistas)
CREATE TABLE clientes (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    documento_identidad VARCHAR(20) UNIQUE,
    correo VARCHAR(100) UNIQUE NOT NULL,
    telefono VARCHAR(20),
    procedencia VARCHAR(100), -- País o ciudad de origen
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=INNODB;

-- 3. Tabla de Agenda de Reservas
CREATE TABLE agenda_reservas (
    id_reserva INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    id_responsable INT NOT NULL, -- Guía o responsable asignado para la actividad
    paquete_turistico VARCHAR(100) NOT NULL, -- Nombre del paquete elegido
    fecha_ingreso DATE NOT NULL,
    fecha_salida DATE NOT NULL,
    cantidad_personas INT NOT NULL,
    estado_reserva ENUM('Pendiente', 'Confirmada', 'Cancelada') DEFAULT 'Pendiente',
    observaciones TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente) ON DELETE CASCADE,
    FOREIGN KEY (id_responsable) REFERENCES responsables(id_responsable) ON DELETE RESTRICT
) ENGINE=INNODB;`ecomirador_db`
- 3. Tabla de para usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` INT AUTO_INCREMENT PRIMARY KEY,
  `cedula` VARCHAR(15) NOT NULL UNIQUE,
  `nombre` VARCHAR(50) NOT NULL,
  `apellido` VARCHAR(50) NOT NULL,
  `usuario` VARCHAR(30) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;