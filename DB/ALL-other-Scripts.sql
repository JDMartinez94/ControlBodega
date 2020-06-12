-- script para desplegar tabla herramientas
select * from herramienta;

-- script para desplegar tabla empleados
select * from empleado;

-- script para reporte herramientas defectuosas
select h.codigo_herramienta, h.fecha_ingreso, h.nombre_herramienta, c.nombre_categoria, u.status_uso, p.status_prestamo, cd.condicion
from herramienta h 
join categoria c on c.id_categoria = h.id_categoria
join status_uso u on u.id_status_uso = h.id_status_uso
join status_prestamo p on p.id_status_prestamo = h.id_status_prestamo
join condicion cd on cd.id_condicion = h.id_condicion
where h.id_condicion = 2;

-- script para reporte herramientas nuevas
select h.codigo_herramienta, h.fecha_ingreso, h.nombre_herramienta, c.nombre_categoria, u.status_uso, p.status_prestamo, cd.condicion
from herramienta h 
join categoria c on c.id_categoria = h.id_categoria
join status_uso u on u.id_status_uso = h.id_status_uso
join status_prestamo p on p.id_status_prestamo = h.id_status_prestamo
join condicion cd on cd.id_condicion = h.id_condicion
where h.id_status_uso = 1;

-- script para reporte de herramientas en uso
select h.codigo_herramienta, h.fecha_ingreso, h.nombre_herramienta, c.nombre_categoria, u.status_uso, p.status_prestamo, cd.condicion
from herramienta h 
join categoria c on c.id_categoria = h.id_categoria
join status_uso u on u.id_status_uso = h.id_status_uso
join status_prestamo p on p.id_status_prestamo = h.id_status_prestamo
join condicion cd on cd.id_condicion = h.id_condicion
where h.id_status_prestamo = 2; 

-- script para reporte de herramientas disponibles
select h.codigo_herramienta, h.fecha_ingreso, h.nombre_herramienta, c.nombre_categoria, u.status_uso, p.status_prestamo, cd.condicion
from herramienta h 
join categoria c on c.id_categoria = h.id_categoria
join status_uso u on u.id_status_uso = h.id_status_uso
join status_prestamo p on p.id_status_prestamo = h.id_status_prestamo
join condicion cd on cd.id_condicion = h.id_condicion
where h.id_status_prestamo = 1 and h.id_condicion = 1; 

-- script historial general de prestamos 
select r.id_registro, r.fecha_registro, tr.tipo_registro, r.codigo_herramienta, h.nombre_herramienta, r.id_empleado, e.nombre_empleado, r.id_usuario, u.nombre_usuario
from registro r 
join tipo_registro tr on tr.id_tipo_registro = r.id_tipo_registro
join herramienta h on h.codigo_herramienta = r.codigo_herramienta
join empleado e on e.id_empleado = r.id_empleado
join usuario u on u.id_usuario = r.id_usuario
where r.id_tipo_registro = 1; 



