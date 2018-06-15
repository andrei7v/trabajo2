drop database if exists proyecto;
create database proyecto;
	use proyecto;

create table usuario (
	usu_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	usu_role int,
	usu_name varchar(80),
	usu_usuario varchar(80),
	usu_password varchar(50),
	usu_telefono varchar(50),
	usu_direccion varchar(100),
	usu_estado boolean
);
ALTER TABLE usuario ENGINE=INNODB;

create table categoria (
	cat_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	cat_name varchar(80)
);
ALTER TABLE categoria ENGINE=INNODB;

create table subcategoria (
	scat_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	scar_name varchar(80)
);
ALTER TABLE categoria ENGINE=INNODB;

create table marca (
	mrk_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	mrk_name varchar(80)
);
ALTER TABLE categoria ENGINE=INNODB;

create table producto (
	prod_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	prod_nombre varchar(80),
	prod_descripcion text,
	prod_precio int,
	prod_stock int,
	prod_categoria int NOT NULL,
	prod_subcategoria int NOT NULL,
	prod_marca int NOT NULL,
	prod_imagen varchar(100) DEFAULT NULL,
	prod_url varchar(100) DEFAULT NULL,
	prod_estado boolean,
	FOREIGN KEY (prod_categoria) REFERENCES categoria(cat_id),
	FOREIGN KEY (prod_subcategoria) REFERENCES subcategoria(scat_id),
	FOREIGN KEY (prod_marca) REFERENCES marca(mrk_id)
);
ALTER TABLE prodicula ENGINE=INNODB;


--arreglar
CREATE TABLE ventas(
	ven_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	ven_usuario int NOT NULL,
	FOREIGN KEY(ven_usuario) REFERENCES usuario(usu_id),
	ven_fecha date,
	ven_costot int,
	mat_estado boolean
);
ALTER TABLE ventas ENGINE=INNODB;


CREATE TABLE deta_ventas(
	deta_ventas int NOT NULL,
	deta_producto int NOT NULL,
	FOREIGN KEY(deta_ventas) REFERENCES ventas(ven_id),
	FOREIGN KEY(deta_producto) REFERENCES producto(prod_id),
	PRIMARY KEY(deta_ventas, deta_producto),
	deta_estado boolean
);
ALTER TABLE deta_ventas ENGINE=INNODB;












INSERT INTO usuario (usu_role, usu_name, usu_usuario, usu_password, usu_telefono, usu_direccion)
VALUES (1, "Jorge Gonzales","admin", "21232f297a57a5a743894a0e4a801fc3", "94512687", "Las Palmas 404"),
(2, "Arcadio Gonzales","arcadio", "21232f297a57a5a743894a0e4a801fc3", "98545745", "Los Robles 505");

INSERT INTO categoria (cat_name)
VALUES ("Infantil"), ("Comedia"), ("Triller"), ("Miedo"), ("Clasica"), ("Musical");

INSERT INTO prodicula (prod_nombre, prod_duracion, prod_descripcion, prod_anio, prod_categoria)
VALUES ("El resplandor", 146, "En construcción", 1980, 4),
("Grease", 110, "En construcción", 1978, 6),
("Cars", 116, "En construcción", 1978, 6),
("Grease", 110, "En construcción", 2006, 1),
("Los otros", 110, "En construcción", 2006, 3);