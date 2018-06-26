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
	prod_marca int NOT NULL,
	prod_descripcion text,
	prod_precio int,
	prod_stock int NOT NULL,
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
	ven_fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	ven_costot int,
	ven_estado boolean
);
ALTER TABLE ventas ENGINE=INNODB;

CREATE TABLE deta_ventas( 
	prod_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	deta_ventas int NOT NULL,
	deta_producto int NOT NULL,
	FOREIGN KEY(deta_ventas) REFERENCES ventas(ven_id), 
	FOREIGN KEY(deta_producto) REFERENCES producto(prod_id), 
	deta_cantidad int,
	deta_costo int,
	deta_subtotal int,
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


INSERT INTO producto(prod_nombre, prod_marca, prod_descripcion, prod_precio, prod_stock, prod_imagen, prod_url, prod_estado)
VALUES ("Minicomponente CM5760 1100 W", 31,
		"Duplica la fiesta para más diversión. Conecta 2 sistemas de forma inalámbrica para disfrutar el doble de potencia del doble de parlantes",
		549, 1,'minicomponente.jpg',"http://www.sodimac.com.pe/sodimac-pe/product/2623005/Minicomponente-CM5760-1100-W/2623005",1),
		("Televisor Smart LED Ultra HD 50pulg UN50MU6103GXPE", 21,
		"Experimenta un detalle vívido con 4 veces la resolución de la TV UHD. Todo lo que mires se verá mejor gracias al color realista y al brillo.",
		1599, 1,'televisor1.jpg',"http://www.sodimac.com.pe/sodimac-pe/product/2672413/Televisor-Smart-LED-Ultra-HD-50-UN50MU6103GXPE",1),
		("NB ACER G3-572-72PM", 17,
		"Intel Core i7 (7th Gen) i7-7700HQ Quad-core (4 Core) 2.80 GHz - 16 GB DDR4 SDRAM - 1 TB HDD - 256 GB SSD - Windows 10 Home 64-bit - 1920 x 1080 - Tecnología IPS de Variación en el Plano, Visión Confortable - Negro - NVIDIA GeForce GTX 1060 con 6 GB GDDR5 - Bluetooth - Español Teclado - Cámara Frontal/Cámara Web - IEEE 802.11ac - Gigabit Ethernet - Red (RJ-45) - HDMI - 1 x Puertos USB 3.",
		5999, 1,'laptop1.jpg',"http://www.sodimac.com.pe/sodimac-pe/product/2672413/Televisor-Smart-LED-Ultra-HD-50-UN50MU6103GXPE/2672413",1);




