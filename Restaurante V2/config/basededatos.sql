
CREATE DATABASE restaurante;
use restaurante;

create Table usuario(
    id_usuario int (5) AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR (30),
    apellido VARCHAR (30),
    Correo varchar (20),
    Contrasena varchar (255),
    rol VARCHAR(10),
    imagen BLOB NOT NULL

);

create Table plato(
    id_menu int (5) AUTO_INCREMENT PRIMARY KEY,
    nombre_plato VARCHAR (30),
    descripcion VARCHAR (100),
    precio DECIMAL (6,2),
    disponible boolean,
    imagen blob
);
CREATE TABLE menu (
    id_menu INT(5) AUTO_INCREMENT PRIMARY KEY,
    nombre_plato VARCHAR(50) NOT NULL,
    descripcion VARCHAR(255),
    precio DECIMAL(6,2) NOT NULL,
    disponible BOOLEAN DEFAULT TRUE,
    imagen BLOB
);
ALTER TABLE menu DISCARD TABLESPACE;
ALTER TABLE usuario ADD imagen BLOB NOT NULL;
DROP TABLE restaurante.menu DISCARD TABLESPACE;
DROP TABLE restaurante.menu DISCARD TABLESPACE;
ALTER TABLE usuario ADD imagen BLOB;
DROP TABLE IF EXISTS restaurante.menu;
drop table if exists Menu;
DROP TABLE IF EXISTS restaurante.menu;
drop database restaurante;

