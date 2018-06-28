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
("user", 1, "user",  "81dc9bdb52d04dc20036dbd8313ed055", "888888888", "Chimbote", 1),
("user2", 1, "user2",  "81dc9bdb52d04dc20036dbd8313ed055", "777777777", "Chimbote", 1);

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
		549, 7,'minicomponente.jpg',"http://www.sodimac.com.pe/sodimac-pe/product/2623005/Minicomponente-CM5760-1100-W/2623005",1),
		("Televisor Smart LED Ultra HD 50pulg UN50MU6103GXPE", 21,
		"Experimenta un detalle vívido con 4 veces la resolución de la TV UHD. Todo lo que mires se verá mejor gracias al color realista y al brillo.",
		1599, 4,'televisor1.jpg',"http://www.sodimac.com.pe/sodimac-pe/product/2672413/Televisor-Smart-LED-Ultra-HD-50-UN50MU6103GXPE",1),
		("Licuadora 2L BLSTVB G00-051", 6,
		"Licuadora de alto rendimiento, potencia y precisión, con funciones automáticas pre-programadas, que te permiten preparar bebidas y recetas que se adaptan a un estilo de vida más sano.",
		809, 9,'licuadora1.jpg',"http://www.sodimac.com.pe/sodimac-pe/product/259479X/Licuadora-2L-BLSTVB-G00-051/259479X",1),
		("Lavadora 9kg WAT28404PE", 4,
		"EcoSilence Drive: Bajo consumo de energía y funcionamiento silencioso. Indicador de Consumo de energía en el programa seleccionado. VarioPerfect: por fin puedes elegir resultados de lavado perfectos un 65% más rápido o ahorrando un 50% de agua y energía.",
		3099, 4,'lavadora1.jpg',"http://www.sodimac.com.pe/sodimac-pe/product/2698617/Lavadora-9kg-WAT28404PE/2698617",1),
		("Refrigeradora 438L LT44SGP", 13,
		"Refrigeradora con Inverter Linear Compressor (10 años de garantía) y 438 L de capacidad. Bandejas de vidrio templado, cajon verdulero y cajón free zone. Panel táctil con luz led. Enfriamiento uniforme. Elimina bacterias hasta en 99.999%. Fresh 0 Zone se mantiene en una temperatura alredededor de 0? para que puedas almacenar carnes que desees cocinar al momento, sin tener que esperar a que descongelen. Con el sistema de múltiple flujo de aire, cada esquina del conservador tendrá la misma temperatura.",
		2799, 1,'refrigeradora1.jpg',"http://www.sodimac.com.pe/sodimac-pe/product/2576031/Refrigeradora-438L-LT44SGP/2576031",1),
		("Proyector Multimedia VPL-DX220", 25,
		"El proyector VPL-DX220 XGA es una elección rentable y totalmente equipada de funciones para conseguir presentaciones claras y brillantes en oficinas, salas de reuniones y aulas de centros de enseñanza. Compacto, ligero y con un bajo consumo energético, es fácil de configurar y conectar con otros dispositivos.El inicio automático detecta las señales de una fuente HDMI o VGA conectada al encender la lámpara del proyector, de modo que todo esté preparado para comenzar a presentar.",
		2015, 0,'proyector1.jpg',"http://www.sodimac.com.pe/sodimac-pe/product/2671506/Proyector-Multimedia-VPL-DX220/2671506",1),
		("Televisor Smart Super Ultra HD 4K 49pulg 49UJ7500", 23,
		"LG Super UHD TV supera los métodos convencionales como adoptar luces LED o añadir color con láminas Quantum Dot. Ahora se integra directamente la tecnología Nano Cell, lo último en LCD, al panel para mejorar la calidad de imagen.",
		2199, 7,'televisor2.jpg',"http://www.sodimac.com.pe/sodimac-pe/product/2622920/Televisor-Smart-Super-Ultra-HD-4K-49p-49UJ7500-",1),
		("NB ACER G3-572-72PM", 17,
		"Intel Core i7 (7th Gen) i7-7700HQ Quad-core (4 Core) 2.80 GHz - 16 GB DDR4 SDRAM - 1 TB HDD - 256 GB SSD - Windows 10 Home 64-bit - 1920 x 1080 - Tecnología IPS de Variación en el Plano, Visión Confortable - Negro - NVIDIA GeForce GTX 1060 con 6 GB GDDR5 - Bluetooth - Español Teclado - Cámara Frontal/Cámara Web - IEEE 802.11ac - Gigabit Ethernet - Red (RJ-45) - HDMI - 1 x Puertos USB 3.",
		5999, 0,'laptop1.jpg',"http://www.sodimac.com.pe/sodimac-pe/product/2672413/Televisor-Smart-LED-Ultra-HD-50-UN50MU6103GXPE/2672413",1);

INSERT INTO ventas(ven_usuario, ven_fecha, ven_costot, ven_estado)
VALUES (3, "2018-06-27 23:37:00", 18339, 1),
(3, "2018-06-27 23:37:55", 2799, 1),
(2, "2018-06-28 00:03:20", 6565, 1);


INSERT INTO deta_ventas(deta_ventas, deta_producto, deta_cantidad, deta_costo, deta_subtotal, deta_estado)
VALUES (1, 4, 4, 3099, 12396,1),
(1, 2, 2, 1599, 3198, 1),
(1, 1, 5, 549, 2745, 1),
(2, 5, 1, 2799, 2799, 1),
(3, 2, 1, 1599, 1599, 1),
(3, 1, 1, 549, 549, 1),
(3, 5, 1, 2799, 2799, 1),
(3, 3, 2, 809, 1618, 1);