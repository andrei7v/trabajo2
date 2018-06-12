drop database if exists galeria;
create database galeria;
	use galeria;

create table usuario (
	usu_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	usu_role int,
	usu_name varchar(80),
	usu_usuario varchar(80),
	usu_password varchar(50),
	usu_telefono varchar(50),
	usu_direccion varchar(100)
);
-- ADECUACION DE LAS TABLAS
ALTER TABLE usuario ENGINE=INNODB;

create table categoria (
	cat_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	cat_name varchar(80)
);
-- ADECUACION DE LAS TABLAS
ALTER TABLE categoria ENGINE=INNODB;

create table pelicula (
	pel_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	pel_nombre varchar(80),
	pel_duracion int,
	pel_descripcion text,
	pel_anio int,
	pel_categoria int NOT NULL,
	pel_imagen varchar(100) DEFAULT NULL,
	pel_url varchar(100) DEFAULT NULL,
	FOREIGN KEY (pel_categoria) REFERENCES categoria(cat_id)
);
-- ADECUACION DE LAS TABLAS
ALTER TABLE pelicula ENGINE=INNODB;

INSERT INTO usuario (usu_role, usu_name, usu_usuario, usu_password, usu_telefono, usu_direccion)
VALUES (1, "Jorge Gonzales","admin", "21232f297a57a5a743894a0e4a801fc3", "94512687", "Las Palmas 404"),
(2, "Arcadio Gonzales","arcadio", "21232f297a57a5a743894a0e4a801fc3", "98545745", "Los Robles 505");

INSERT INTO categoria (cat_name)
VALUES ("Infantil"), ("Comedia"), ("Triller"), ("Miedo"), ("Clasica"), ("Musical");

INSERT INTO pelicula (pel_nombre, pel_duracion, pel_descripcion, pel_anio, pel_categoria)
VALUES ("El resplandor", 146, "En construcción", 1980, 4),
("Grease", 110, "En construcción", 1978, 6),
("Cars", 116, "En construcción", 1978, 6),
("Grease", 110, "En construcción", 2006, 1),
("Los otros", 110, "En construcción", 2006, 3);