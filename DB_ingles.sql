CREATE DATABASE Ingles;
use Ingles;

CREATE TABLE Persona (
  id_persona INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(150) NOT NULL,
  apellidos VARCHAR(150) NOT NULL,
  correo VARCHAR(150) NOT NULL,
  password VARCHAR(50) NOT NULL,
  tipo VARCHAR(30) NOT NULL,
  PRIMARY KEY (id_persona));


CREATE TABLE Carrera (
  id_carrera INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(150) NOT NULL,
  PRIMARY KEY (id_carrera));

CREATE TABLE Alumno (
  id_alumno INT NOT NULL,
  no_control BIGINT NOT NULL,
  telefono VARCHAR(20) NULL,
  id_carrera INT NOT NULL,
  semestre INT NOT NULL,
  PRIMARY KEY (id_alumno),
  FOREIGN KEY (id_carrera) REFERENCES Carrera (id_carrera),
  FOREIGN KEY (id_alumno) REFERENCES Persona (id_persona));

CREATE TABLE Maestro (
  id_maestro INT NOT NULL,
  cedula INT NOT NULL,
  PRIMARY KEY (id_maestro),
  FOREIGN KEY (id_maestro) REFERENCES Persona (id_persona));

CREATE TABLE Grupo (
  id_grupo INT NOT NULL AUTO_INCREMENT,
  ciclo INT NOT NULL,
  nivel VARCHAR(45) NOT NULL,
  grupo_numero INT NOT NULL,
  horario VARCHAR(45) NOT NULL,
  dias VARCHAR(45) NOT NULL,
  anio YEAR NOT NULL,
  id_maestro INT NOT NULL,
  PRIMARY KEY (id_grupo),
  FOREIGN KEY (id_maestro) REFERENCES Maestro (id_maestro));

CREATE TABLE Movimiento (
  id_movimiento INT NOT NULL AUTO_INCREMENT,
  id_grupo_anterior INT NOT NULL,
  id_alumno INT NOT NULL,
  tipo VARCHAR(45) NULL,
  estado VARCHAR(45) NULL,
  PRIMARY KEY (id_movimiento),
  FOREIGN KEY (id_grupo_anterior) REFERENCES Grupo (id_grupo),
  FOREIGN KEY (id_alumno) REFERENCES Alumno (id_alumno));

CREATE TABLE Calificacion (
  id_alumno INT NOT NULL,
  unidad1 FLOAT NOT NULL,
  unidad2 FLOAT NOT NULL,
  unidad3 FLOAT NOT NULL,
  cursado INT NOT NULL,
  id_grupo INT NOT NULL,
  PRIMARY KEY (id_alumno, id_grupo),
  FOREIGN KEY (id_alumno) REFERENCES Alumno (id_alumno),
  FOREIGN KEY (id_grupo) REFERENCES Grupo (id_grupo));
