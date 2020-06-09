<?php
include ("registro.php");

class DAOregistro{
    private $con;
    
    public function conectar(){
        try{
            $this->con= new mysqli("localhost","root","","inventools") or die ("Error al conectar");    
        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
        }        
    }
    
    public function desconectar(){
    $this->con->close();
    }
    
    public function registrar($obj){
        $prestamo = new registro();
        $prestamo = $obj;
        $sql = "insert into registro (fecha_registro,id_tipo_registro,codigo_herramienta,id_empleado,id_usuario)"
                . "values ('".$obj->getFecha_registro()."',".$obj->getId_tipo_registro().",".$obj->getCodigo_herramienta().",".$obj->getId_empleado().",".$obj->getId_usuario().");";
        $this->conectar();
        if ($this->con->query($sql)){
            echo "<script>swal({title: 'Exito',text: 'El prestamo fue registrado',icon: 'success'})</script>";
            
        }else{
            echo "<script>swal({title: 'Error',text: 'Algo salio mal, no se registro el prestamo',icon: 'error'})</script>";
        }
        $this->desconectar();
    }
    
    public function getRegistro(){
        $sql="select 
            reg.fecha_registro,
            herr.nombre_herramienta,
            emp.nombre_empleado,
            usuario.nombre_usuario
            from registro reg
            join empleado emp on reg.id_empleado = emp.id_empleado
            join usuario usuario on reg.id_usuario = usuario.id_usuario
            join herramienta herr on reg.codigo_herramienta = herr.codigo_herramienta
            order by reg.fecha_registro desc limit 1;";
        $this->conectar();
        $res = $this->con->query($sql);
        $this->desconectar();
        $tabla="<div style=' position:fixed; left:600px; top:700px; background-color: white; border-radius: 20px '>"
                . "<h3 style=' text-align: center'>Detalles del registro</h3>"
                . "<table class='table'>"
                ."<thead class='thead-dark'>";
        $tabla .="<tr>"
                    . "<th>Fecha de registro</th>"
                    . "<th>Herramienta</th>"
                    . "<th>Empleado que presto</th>"
                    . "<th>Registrado por</th>"
                . "</tr></thead><tbody>";
        while ($fila = mysqli_fetch_assoc($res)){
        $tabla .="<tr>"
                ."<td>".$fila["fecha_registro"]."</td>"
                ."<td>".$fila["nombre_herramienta"]."</td>"
                ."<td>".$fila["nombre_empleado"]."</td>"
                ."<td>".$fila["nombre_usuario"]."</td>"
                ."</tr>";
        }
        $tabla .="</tbody></table> </div>";
        $res->close();
        return $tabla;
        
    }
    
    
    
}