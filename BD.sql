CREATE DATABASE escuela;
USE escuela;

CREATE TABLE t_alumno (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50),
    apellido VARCHAR(50),
    year INT,
    carrera VARCHAR(100),
    fech_nac VARCHAR(50),
    PRIMARY KEY (ID)
);

CREATE TABLE t_usuario (
    ID INT NOT NULL AUTO_INCREMENT,
    usuario VARCHAR(50),
    password VARCHAR(255),
    rol VARCHAR(20),
    PRIMARY KEY (ID)
);
