drop database if exists proyecto;
create database proyecto;
	use proyecto;

create table usuario (
	usu_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	usu_name varchar(80),
	usu_role int,
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
	sub_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	sub_name varchar(80),
	sub_categoria int NOT NULL,
	FOREIGN KEY (sub_categoria) REFERENCES categoria(cat_id)
);
ALTER TABLE subcategoria ENGINE=INNODB;

create table marca (
	mar_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	mar_name varchar(80),
	mar_subcategoria int NOT NULL,
	FOREIGN KEY (mar_subcategoria) REFERENCES subcategoria(sub_id)
);
ALTER TABLE categoria ENGINE=INNODB;

create table producto (
	prod_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	prod_nombre varchar(80),
	prod_descripcion text,
	prod_unidad text,
	prod_precio int,
	prod_stock int NOT NULL,
	prod_marca int NOT NULL,
	FOREIGN KEY (prod_marca) REFERENCES marca(mar_id),
	prod_imagen varchar(100) DEFAULT NULL,
	prod_url varchar(100) DEFAULT NULL,
	prod_estado boolean
);
ALTER TABLE producto ENGINE=INNODB;

CREATE TABLE ventas( 
	ven_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	ven_usuario int NOT NULL,
	FOREIGN KEY(ven_usuario) REFERENCES usuario(usu_id), 
	ven_fecha date,
	ven_costot int,
	ven_estado boolean
);
ALTER TABLE ventas ENGINE=INNODB;

CREATE TABLE deta_ventas( 
	deta_ventas int NOT NULL,
	deta_producto int NOT NULL,
	FOREIGN KEY(deta_ventas) REFERENCES ventas(ven_id), 
	FOREIGN KEY(deta_producto) REFERENCES producto(prod_id), 
	PRIMARY KEY(deta_ventas, deta_producto), 
	deta_cantidad int,
	deta_costot int,
	deta_estado boolean
);
ALTER TABLE deta_ventas ENGINE=INNODB;

INSERT INTO usuario(usu_name, usu_role, usu_usuario, usu_password, usu_telefono, usu_direccion,usu_estado)
VALUES ("admin", 2, "admin",  "81dc9bdb52d04dc20036dbd8313ed055", "999999999", "", 1),
("user", 1, "user",  "81dc9bdb52d04dc20036dbd8313ed055", "888888888", "Chimbote", 1);

INSERT INTO categoria(cat_name)
VALUES ("Electrogar"),
("Tecnología");

INSERT INTO subcategoria(sub_name, sub_categoria)
VALUES ("Lavadoras", 1),
("Licuadoras", 1),
("Cocinas", 1),
("Refrigeradoras", 1),
("Laptops", 2),
("Televisores", 2),
("Proyectores", 2),
("Celulares", 2),
("Equipos de Sonido", 2);

INSERT INTO marca(mar_name, mar_subcategoria)
VALUES ("Advance", 1),
("Mabe", 1),
("Daewoo", 1),
("Bosch", 1),
("Samsumg", 1),
("Oster", 2),
("Imaco", 2),
("Practika", 2),
("Indurama", 3),
("Bosch", 3),
("LG", 3),
("Electrolux", 3),
("LG", 4),
("Samsumg", 4),
("Bosch", 4),
("General Electric", 4),
("Acer", 5),
("Lenovo", 5),
("HP", 5),
("Asus", 5),
("Samsumg", 6),
("AOC", 6),
("LG", 6),
("Advance", 6),
("Sony", 7),
("Samsumg", 7),
("Asus", 8),
("Motorola", 8),
("Samsumg", 8),
("Huawei", 8),
("LG", 9),
("AOC", 9),
("Micronics", 9);
