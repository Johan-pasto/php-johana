
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

ALTER TABLE usuario ADD imagen BLOB NOT NULL;


drop database restaurante;

