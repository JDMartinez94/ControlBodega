<?php
include ("DAOempleado.php");
include ("credenciales.php");
$empleado = new DAOempleado();

class DAOreportes{
    private $con;
    
    public function conectar(){
        try{
        $this->con= new mysqli(SERVIDOR,USUARIO,CONTRA,BD) or die ("Error al conectar");
        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
        }        
    }
    
    public function desconectar(){
    $this->con->close();
    }

    public function reportesHerr($filtro,$titulo,$imprep){
        $sql="select h.codigo_herramienta, h.fecha_ingreso, h.nombre_herramienta, c.nombre_categoria, u.status_uso, p.status_prestamo, cd.condicion from herramienta h join categoria c on c.id_categoria = h.id_categoria join status_uso u on u.id_status_uso = h.id_status_uso join status_prestamo p on p.id_status_prestamo = h.id_status_prestamo join condicion cd on cd.id_condicion = h.id_condicion where $filtro ";
        $this->conectar();
        $res = $this->con->query($sql);
        $this->desconectar();
        $tabla="<br><div style='margin: auto; width: 90%; background-color: white; padding: 15px'>"
                . "<h3 style=' text-align: center'>".$titulo."</h3>"
                . "<table class='table'>"
                ."<thead class='thead-dark'>";
        $tabla .="<tr>"
                    . "<th>Codigo de la herramienta</th>"
                    . "<th>Fecha de ingreso</th>"
                    . "<th>Nombre de la herramienta</th>"
                    . "<th>Categoria</th>"
                    . "<th>Estado de uso</th>"
                    . "<th>Estado de prestamo</th>"
                    . "<th>Condicion</th>"
                . "</tr></thead><tbody>";
        while ($fila = mysqli_fetch_assoc($res)){
        $tabla .="<tr>"
                ."<td>".$fila["codigo_herramienta"]."</td>"
                ."<td>".$fila["fecha_ingreso"]."</td>"
                ."<td>".$fila["nombre_herramienta"]."</td>"
                ."<td>".$fila["nombre_categoria"]."</td>"
                ."<td>".$fila["status_uso"]."</td>"
                ."<td>".$fila["status_prestamo"]."</td>"
                ."<td>".$fila["condicion"]."</td>"
                ."</tr>";
        }
        $tabla .="</tbody></table>"
        ."<center>".$imprep.">Imprimir reporte</button></a></center></div>";
        $res->close();
        return $tabla;
    }

    public function historial(){
        $sql="select r.id_registro, r.fecha_registro, tr.tipo_registro, r.codigo_herramienta, h.nombre_herramienta, r.id_empleado, e.nombre_empleado, r.id_usuario, u.nombre_usuario from registro r join tipo_registro tr on tr.id_tipo_registro = r.id_tipo_registro join herramienta h on h.codigo_herramienta = r.codigo_herramienta join empleado e on e.id_empleado = r.id_empleado join usuario u on u.id_usuario = r.id_usuario where r.id_tipo_registro = 1;";
        $this->conectar();
        $res = $this->con->query($sql);
        $this->desconectar();
        $tabla="<br><div style='margin: auto; width: 90%; background-color: white; padding: 15px'>"
                ."<h3 style=' text-align: center'>Historial general de prestamos</h3>"
                ."<table class='table'>"
                ."<thead class='thead-dark'>";
        $tabla .="<tr>"
                    . "<th>ID Registro</th>"
                    . "<th>Fecha de registro</th>"
                    . "<th>Tipo de registro</th>"
                    . "<th>Codigo de herramienta</th>"
                    . "<th>Nombre de la herramienta</th>"
                    . "<th>ID empleado prestamista</th>"
                    . "<th>Nombre de empleado prestamista</th>"
                    . "<th>ID Usuario que registro</th>"
                    . "<th>Usuario que registro</th>"
                . "</tr></thead><tbody>";
        while ($fila = mysqli_fetch_assoc($res)){
        $tabla .="<tr>"
                ."<td>".$fila["id_registro"]."</td>"
                ."<td>".$fila["fecha_registro"]."</td>"
                ."<td>".$fila["tipo_registro"]."</td>"
                ."<td>".$fila["codigo_herramienta"]."</td>"
                ."<td>".$fila["nombre_herramienta"]."</td>"
                ."<td>".$fila["id_empleado"]."</td>"
                ."<td>".$fila["nombre_empleado"]."</td>"
                ."<td>".$fila["id_usuario"]."</td>"
                ."<td>".$fila["nombre_usuario"]."</td>"
                ."</tr>";
        }
        $tabla .="</tbody></table>"
        ."<center><a href=mpdf/repohistprestamo.php class='btn btn-info' target='_blank'>Imprimir reporte</a></button>
        </center></div>";
        $res->close();
        return $tabla;
    }

    public function historialdev(){
        $sql="select r.id_registro, r.fecha_registro, tr.tipo_registro, r.codigo_herramienta, h.nombre_herramienta, r.id_empleado, e.nombre_empleado, r.id_usuario, u.nombre_usuario from registro r join tipo_registro tr on tr.id_tipo_registro = r.id_tipo_registro join herramienta h on h.codigo_herramienta = r.codigo_herramienta join empleado e on e.id_empleado = r.id_empleado join usuario u on u.id_usuario = r.id_usuario where r.id_tipo_registro = 2;";
        $this->conectar();
        $res = $this->con->query($sql);
        $this->desconectar();
        $tabla="<br><div style='margin: auto; width: 90%; background-color: white; padding: 15px'>"
                ."<h3 style=' text-align: center'>Historial general de devoluciones</h3>"
                ."<table class='table'>"
                ."<thead class='thead-dark'>";
        $tabla .="<tr>"
                    . "<th>ID Registro</th>"
                    . "<th>Fecha de registro</th>"
                    . "<th>Tipo de registro</th>"
                    . "<th>Codigo de herramienta</th>"
                    . "<th>Nombre de la herramienta</th>"
                    . "<th>ID empleado que devuelve</th>"
                    . "<th>Nombre de empleado prestamista</th>"
                    . "<th>ID Usuario que registro</th>"
                    . "<th>Usuario que registro</th>"
                . "</tr></thead><tbody>";
        while ($fila = mysqli_fetch_assoc($res)){
        $tabla .="<tr>"
                ."<td>".$fila["id_registro"]."</td>"
                ."<td>".$fila["fecha_registro"]."</td>"
                ."<td>".$fila["tipo_registro"]."</td>"
                ."<td>".$fila["codigo_herramienta"]."</td>"
                ."<td>".$fila["nombre_herramienta"]."</td>"
                ."<td>".$fila["id_empleado"]."</td>"
                ."<td>".$fila["nombre_empleado"]."</td>"
                ."<td>".$fila["id_usuario"]."</td>"
                ."<td>".$fila["nombre_usuario"]."</td>"
                ."</tr>";
        }
        $tabla .="</tbody></table>"
        ."<center><a href=mpdf/repohistprestamo.php class='btn btn-info' target='_blank'>Imprimir reporte</a></button>
        </center></div>";
        $res->close();
        return $tabla;
    }

    public function herramientas(){
        $sql="select * from herramienta;";
        $this->conectar();
        $res = $this->con->query($sql);
        $this->desconectar();
        $tabla="<br><div style='margin: auto; width: 90%; background-color: white; padding: 15px'>"
                ."<h3 style=' text-align: center'>Contenido de la tabla herramienta</h3>"
                ."<table class='table'>"
                ."<thead class='thead-dark'>";
        $tabla .="<tr>"
                    . "<th>Codigo herramienta</th>"
                    . "<th>Fecha de ingreso</th>"
                    . "<th>Nombre de herramienta</th>"
                    . "<th>ID Categoria</th>"
                    . "<th>ID estado de uso</th>"
                    . "<th>ID estado de prestamo</th>"
                    . "<th>ID condicion</th>"
                    . "<th>Seleccionar</th>"                    
                . "</tr></thead><tbody>";
        while ($fila = mysqli_fetch_assoc($res)){
        $tabla .="<tr>"
                ."<td>".$fila["codigo_herramienta"]."</td>"
                ."<td>".$fila["fecha_ingreso"]."</td>"
                ."<td>".$fila["nombre_herramienta"]."</td>"
                ."<td>".$fila["id_categoria"]."</td>"
                ."<td>".$fila["id_status_uso"]."</td>"
                ."<td>".$fila["id_status_prestamo"]."</td>"
                ."<td>".$fila["id_condicion"]."</td>"
                ."<td><a href=\"javascript:cargarHerramienta('".$fila["codigo_herramienta"]."','".$fila["fecha_ingreso"]."','".$fila["nombre_herramienta"]."','".$fila["id_categoria"]."','".$fila["id_status_uso"]."','".$fila["id_status_prestamo"]."','".$fila["id_condicion"]."')\"><button type='button' class='btn btn-info' name='seleccionar'>Seleccionar</button></a></td>"                
                ."</tr>";
        }
        $tabla .="</tbody></table></div>";
        $res->close();
        return $tabla;
    }

    public function personal(){
        $sql="select * from empleado;";
        $this->conectar();
        $res = $this->con->query($sql);
        $this->desconectar();
        $tabla="<br><div style='margin: auto; width: 90%; background-color: white; padding: 15px'>"
                ."<h3 style=' text-align: center'>Contenido de la tabla empleado</h3>"
                ."<table class='table'>"
                ."<thead class='thead-dark'>";
        $tabla .="<tr>"
                    . "<th>ID empleado</th>"
                    . "<th>Nombre del empleado</th>"
                    . "<th>Direccion</th>"
                    . "<th>Telefono</th>"                    
                    . "<th>Seleccionar</th>"                    
                . "</tr></thead><tbody>";
        while ($fila = mysqli_fetch_assoc($res)){
        $tabla .="<tr>"
                ."<td>".$fila["id_empleado"]."</td>"
                ."<td>".$fila["nombre_empleado"]."</td>"
                ."<td>".$fila["direccion"]."</td>"
                ."<td>".$fila["telefono"]."</td>"
                ."<td><a href=\"javascript:cargarEmpleado('".$fila["id_empleado"]."','".$fila["nombre_empleado"]."','".$fila["direccion"]."','".$fila["telefono"]."')\"><button type='button' class='btn btn-info' name='seleccionar'>Seleccionar</button></a></td>"
                ."</tr>";
        }
        $tabla .="</tbody></table></div></div>";
        $res->close();
        return $tabla;
    }


    public function presxEmpleado($nomEmpleado){
        $sql="call PrestamoXEmpleado ('%".$nomEmpleado."%')";
        $this->conectar();
        $res = $this->con->query($sql);
        $this->desconectar();
        $tabla="<br><div style='margin: auto; width: 90%; background-color: white; padding: 15px'>"
                ."<h3 style=' text-align: center'>Préstamos por Empleado</h3>"
                ."<table class='table'>"
                ."<thead class='thead-dark'>";
        $tabla .="<tr>"
                    . "<th>ID registro</th>"
                    . "<th>Fecha de registro</th>"
                    . "<th>Tipo de registro</th>"
                    . "<th>Nombre Herramienta</th>" 
                    . "<th>Nombre Empleado</th>"
                    . "<th>Nombre Usuario</th>"                   
                    . "<th>Seleccionar</th>"                    
                . "</tr></thead><tbody>";
        while ($fila = mysqli_fetch_assoc($res)){
        $tabla .="<tr>"
                ."<td>".$fila["id_registro"]."</td>"
                ."<td>".$fila["fecha_registro"]."</td>"
                ."<td>".$fila["tipo_registro"]."</td>"
                ."<td>".$fila["nombre_herramienta"]."</td>"
                ."<td>".$fila["nombre_empleado"]."</td>"
                ."<td>".$fila["nombre_usuario"]."</td>"
                ."<td><button type='button' class='btn btn-info' name='seleccionar'>Seleccionar</button></td>"
                ."</tr>";
        }
        $tabla .="</tbody></table></div></div><script>$('#menuPersonal').attr('style', 'display:show');</script>";
        $res->close();
        return $tabla;
    }


    public function herrXCategoria($nomCategoria){
        $sql="call HerramientasXCategoria ('%".$nomCategoria."%')";
        $this->conectar();
        $res = $this->con->query($sql);
        $this->desconectar();
        $tabla="<br><div style='margin: auto; width: 90%; background-color: white; padding: 15px'>"
                ."<h3 style=' text-align: center'>Herramientas por Categoria</h3>"
                ."<table class='table'>"
                ."<thead class='thead-dark'>";
        $tabla .="<tr>"
                    . "<th>Código Herramienta</th>"
                    . "<th>Fecha de ingreso</th>"
                    . "<th>Nombre Herramienta</th>"
                    . "<th>Nombre Categoría</th>" 
                    . "<th>Status de uso</th>" 
                    . "<th>Status de préstamo</th>" 
                    . "<th>Condición de Herramienta</th>"                    
                    . "<th>Seleccionar</th>"                    
                . "</tr></thead><tbody>";
        while ($fila = mysqli_fetch_assoc($res)){
        $tabla .="<tr>"
                ."<td>".$fila["codigo_herramienta"]."</td>"
                ."<td>".$fila["fecha_ingreso"]."</td>"
                ."<td>".$fila["nombre_herramienta"]."</td>"
                ."<td>".$fila["nombre_categoria"]."</td>"
                ."<td>".$fila["status_uso"]."</td>"
                ."<td>".$fila["status_prestamo"]."</td>"
                ."<td>".$fila["condicion"]."</td>"
                ."<td><button type='button' class='btn btn-info' name='seleccionar'>Seleccionar</button></td>"
                ."</tr>";
        }
        $tabla .="</tbody></table></div></div><script>$('#menuPersonal').attr('style', 'display:show');</script>";
        $res->close();
        return $tabla;
    }
}


?>