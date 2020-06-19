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
('Alcides José Medina Avelar', '789 Calle Itca, Sta. Tecla, La Libertad', '2222-5555'),
('Carlos Antonio Mena Gómez', '789 Calle Itca, Sta. Tecla, La Libertad', '2222-6666'),
('Gracia María Montoya Cruz', '789 Calle Itca, Sta. Tecla, La Libertad', '2222-7777');

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

Insert into herramienta (fecha_ingreso, nombre_herramienta, id_categoria, id_status_uso, id_status_prestamo, id_condicion) values
('2020-04-10 05:15:14', 'Martillo',1,1,1,1),
('2020-01-05 13:21:18', 'Cincel',1,2,1,1),
('2020-02-20 08:09:11', 'Yugo',2,2,2,1),
('2020-03-01 15:15:15', 'Descompactador',2,2,1,2),
('2020-04-11 10:55:23', 'Tenaza',3,2,1,2),
('2020-05-30 11:40:01', 'Cortapuros',3,1,1,1),
('2019-12-09 06:02:33', 'Podadora',4,2,1,1),
('2020-01-22 18:39:44', 'Pala',4,2,2,1),
('2019-11-14 12:36:13', 'Ponchadora',5,2,1,2),
('2020-02-23 09:49:08', 'Cable Puente',5,2,1,2),
('2019-08-02 07:56:45', 'Escuadra',6,1,1,1),
('2019-10-23 09:10:00', 'Sierra de mano',6,2,1,1),
('2020-05-07 19:58:18', 'Taladro',7,2,2,1),
('2020-03-31 13:13:14', 'Bujarda',7,2,1,2),
('2019-10-31 21:00:02', 'Espátula',8,2,1,2),
('2020-06-01 05:03:59', 'Alicate',8,1,1,1),
('2019-09-28 16:01:00', 'Cuchillo de Bolsillo',9,2,1,1),
('2020-06-01 15:50:51', 'Plumas',9,2,2,1);

insert into registro (fecha_registro, id_tipo_registro, codigo_herramienta, id_empleado, id_usuario) values
("2020-01-11 19:48:26", 1, 1, 4, 1), 
("2020-02-20 10:22:45", 1, 10, 5, 2), 
("2020-01-20 09:30:15", 2, 1, 4, 3), 
("2020-04-05 12:00:01", 1, 18, 4, 1), 
("2020-03-01 15:11:08", 2, 10, 5, 2), 
("2020-06-11 21:55:01", 2, 18, 4, 3);

---------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------

-- STORED PROCEDURES

-- SP para ingresar registros de préstamos
DELIMITER // ;
 Create PROCEDURE InsertarNuevoPrestamo(IN p_fecha_ingreso datetime, IN p_id_tipo_registro int, IN p_codigo_herramienta int, IN p_id_empleado int, IN p_id_usuario int)
 BEGIN
 insert into registro (fecha_registro, id_tipo_registro, codigo_herramienta, id_empleado, id_usuario) select p_fecha_ingreso, p_id_tipo_registro, p_codigo_herramienta, p_id_empleado, p_id_usuario where (select id_condicion from herramienta where codigo_herramienta=p_codigo_herramienta)=1 and (select id_status_prestamo from herramienta where codigo_herramienta=p_codigo_herramienta)=1;
if (select id_condicion from herramienta where codigo_herramienta=p_codigo_herramienta)=1 and (select id_status_prestamo from herramienta where codigo_herramienta=p_codigo_herramienta)=1 then
	update herramienta set id_status_uso = 2 where codigo_herramienta = p_codigo_herramienta; 
end if;
if (select id_condicion from herramienta where codigo_herramienta=p_codigo_herramienta)=1 and (select id_status_prestamo from herramienta where codigo_herramienta=p_codigo_herramienta)=1 then
	update herramienta set id_status_prestamo = 2 where codigo_herramienta = p_codigo_herramienta; 
end if;
END // ;

-- SP para ingresar registros de devoluciones
DELIMITER // ;
 Create PROCEDURE InsertarNuevaDevolucion(IN p_fecha_ingreso datetime, IN p_id_tipo_registro int, IN p_codigo_herramienta int, IN p_id_empleado int, IN p_id_usuario int)
 BEGIN
 insert into registro (fecha_registro, id_tipo_registro, codigo_herramienta, id_empleado, id_usuario) select p_fecha_ingreso, p_id_tipo_registro, p_codigo_herramienta, p_id_empleado, p_id_usuario where (select id_status_prestamo from herramienta where codigo_herramienta=p_codigo_herramienta)=2;
 update herramienta set id_status_prestamo = 1 where codigo_herramienta = p_codigo_herramienta; 
END // ;

-- SP para reporte préstamos por empleado
DELIMITER // ;
 Create PROCEDURE PrestamoXEmpleado(IN p_nombre_empleado varchar(60))
 BEGIN
	select r.id_registro, r.fecha_registro, tp.tipo_registro, h.nombre_herramienta, e.nombre_empleado, u.nombre_usuario
	from registro r 
	join tipo_registro tp on tp.id_tipo_registro = r.id_tipo_registro
	join herramienta h on h.codigo_herramienta = r.codigo_herramienta
	join empleado e on e.id_empleado = r.id_empleado
	join usuario u on u.id_usuario = r.id_usuario
	where r.id_tipo_registro = 1
	and e.nombre_empleado like p_nombre_empleado;
END // ;

-- SP para reporte herramientas por categoria
DELIMITER // ;
 Create PROCEDURE HerramientasXCategoria(IN p_nombre_categoria varchar(50))
 BEGIN
	Select h.codigo_herramienta, h.fecha_ingreso, h.nombre_herramienta, c.nombre_categoria, u.status_uso, p.status_prestamo, cd.condicion
	from herramienta h 
	join categoria c on c.id_categoria = h.id_categoria
	join status_uso u on u.id_status_uso = h.id_status_uso
	join status_prestamo p on p.id_status_prestamo = h.id_status_prestamo
	join condicion cd on cd.id_condicion = h.id_condicion
	where c.nombre_categoria like p_nombre_categoria;
END // ;

-- SP para cambiar la condicion de una herramienta
DELIMITER // ;
Create PROCEDURE actualizarHerramienta(IN p_id_condicion int, IN p_codigo_herramienta int)
BEGIN
update herramienta set id_status_prestamo = 1 where codigo_herramienta = p_codigo_herramienta; 
update herramienta set id_condicion = p_id_condicion where codigo_herramienta = p_codigo_herramienta;
END;