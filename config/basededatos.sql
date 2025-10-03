
CREATE DATABASE restaurante;
use restaurante

create Table usuario(
    id_usuario int (5) AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR (30),
    apellido VARCHAR (30),
    Correo varchar (20),
    Contrasena varchar (255),
    rol VARCHAR(10)

);
drop database restaurante;

