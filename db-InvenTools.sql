-- CREANDO BASE DE DATOS Y SELECCIONANDO PARA SU USO 

CREATE DATABASE InvenTools;

Use InvenTools;

---------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------

-- CREANDO TABLAS PRINCIPALES (SIN LLAVES FORÁNEAS)

create table categoria(
	id_categoria int not null auto_increment,
	nombre_categoria varchar(50),
	primary key (id_categoria)
);

create table status_uso(
	id_status_uso int not null,
	status_uso varchar(15),
	primary key (id_status_uso)
);

create table status_prestamo(
	id_status_prestamo int not null,
	status_prestamo varchar(25),
	primary key (id_status_prestamo)
);

create table condicion(
	id_condicion int not null,
	condicion varchar(25),
	primary key (id_condicion)
);

create table tipo_registro(
	id_tipo_registro int not null,
	tipo_registro varchar(20),
	primary key (id_tipo_registro)
);

create table rol(
	id_rol int not null,
	rol varchar(10),
	primary key (id_rol)
);

create table empleado(
	id_empleado int not null auto_increment,
	nombre_empleado varchar(60),
    direccion varchar(100),
	telefono varchar(20),
	primary key (id_empleado)
);

---------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------

-- CREANDO TABLAS CON LLAVES FORÁNEAS

create table usuario(
	id_usuario int not null auto_increment,
	nombre_usuario varchar(40) not null unique,
	contrasena varchar (30),
	id_empleado int not null,
	id_rol int not null,
	primary key (id_usuario),
	FOREIGN KEY (id_empleado) REFERENCES empleado(id_empleado) on delete cascade on update cascade,
	FOREIGN KEY (id_rol) REFERENCES rol(id_rol) on delete no action on update cascade
	);

create table herramienta(
	codigo_herramienta int not null auto_increment,
	fecha_ingreso datetime,
	nombre_herramienta varchar (75),
	id_categoria int not null,
	id_status_uso int not null,
    id_status_prestamo int not null,
    id_condicion int not null,
	primary key (codigo_herramienta),
	FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria) on delete no action on update cascade,
	FOREIGN KEY (id_status_uso) REFERENCES status_uso(id_status_uso) on delete no action on update cascade,
    FOREIGN KEY (id_status_prestamo) REFERENCES status_prestamo(id_status_prestamo) on delete no action on update cascade,
    FOREIGN KEY (id_condicion) REFERENCES condicion(id_condicion) on delete no action on update cascade
	);


create table registro(
	id_registro int not null auto_increment,
	fecha_registro datetime,
	id_tipo_registro int not null,
	codigo_herramienta int not null,
	id_empleado int not null,
    id_usuario int not null,
	primary key (id_registro),
	FOREIGN KEY (id_tipo_registro) REFERENCES tipo_registro(id_tipo_registro) on delete no action on update cascade,
	FOREIGN KEY (codigo_herramienta) REFERENCES herramienta(codigo_herramienta) on delete no action on update cascade,
    FOREIGN KEY (id_empleado) REFERENCES empleado(id_empleado) on delete no action on update cascade,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario) on delete no action on update cascade
	);

---------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------

-- AÑADIR VALORES A LAS TABLAS

Insert into rol values
(1, 'Admin'),
(2, 'Regular');

Insert into status_uso values
(1, 'Nueva'),
(2, 'Usada');

Insert into status_prestamo values
(1, 'Disponible'),
(2, 'En préstamo');

Insert into condicion values
(1, 'Buena condición'),
(2, 'Defectuosa');

Insert into tipo_registro values
(1, 'Nuevo préstamo'),
(2, 'Devolución');

Insert into empleado (nombre_empleado, direccion, telefono) values
('Gloria Andrea Chacon Castillo', '123 Calle Itca, Sta. Tecla, La Libertad', '2222-3333'),
('Josué Daniel Martínez Sánchez', '456 Calle Itca, Sta. Tecla, La Libertad', '2222-4444'),
('Alcides José Medina Avelar', '789 Calle Itca, Sta. Tecla, La Libertad', '2222-5555');

Insert into usuario (nombre_usuario, contrasena, id_empleado, id_rol) values
('achacon', 'a12345', '1', '1'),
('jmartinez', 'j12345', '2', '2'),
('amedina', 'm12345', '3', '2');

Insert into categoria (nombre_categoria) values
('Herramientas de Construcción'),
('Herramientas Agrícolas'),
('Herramientas de Corte'),
('Herramientas de Jardinería'),
('Herramientas de Electrónica'),
('Herramientas de Carpintería'),
('Herramientas de Cantería'),
('Herramientas Manuales'),
('Herramientas Portátiles');
























