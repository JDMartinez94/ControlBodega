-- script para reporte herramientas defectuosas
select * from herramienta where id_condicion = 2;

-- script para reporte herramientas nuevas
select * from herramienta where id_status_uso = 1;

-- script para reporte de herramientas en uso
select * from herramienta where id_status_prestamo = 2; 

-- script para reporte de herramientas disponibles
select * from herramienta where id_status_prestamo = 1 and id_condicion = 1; 

-- script historial general de prestamos 
select * from registro where tipo_registro = 1; 
