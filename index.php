<?php

session_start();
include("PHP/credenciales.php");


function existe($user,$pass){    
    $mysqli=new mysqli(SERVIDOR,USUARIO,CONTRA,BD);
    if($mysqli->connect_errno){
        print "Error al conectar ".$mysqli->connect_error;
    }
    $sql="SELECT id_rol FROM usuario WHERE nombre_usuario = '".$user."' and contrasena = '".$pass."'";
    
    $res = $mysqli->query($sql);
    $fila=mysqli_fetch_row($res);
    $id_rol = $fila[0];
    return $id_rol;
}
if(isset($_REQUEST["cmdLoguear"])){
    $user=$_REQUEST["txtUsuario"];
    $pass=$_REQUEST["txtContrasena"];
    if(existe($user,$pass)==1){
        $_SESSION["user"]["id_rol"]=1;
        $_SESSION["user"]["nombre"]=$user;
        header("Location:hubManager.php");
    }else if(existe($user,$pass)==2){
        $_SESSION["user"]["id_rol"]=2;
        $_SESSION["user"]["nombre"]=$user;
        header("location:hubOperario.php");
    }else if(existe($user,$pass)==0){
        $_SESSION["user"]["id_rol"]=3;
        $_SESSION["user"]["nombre"]=$user;
        header("location:index.php");
    }
}
if(isset($_REQUEST["estado"])){
    if($_REQUEST["estado"]=="cerrado"){
        session_destroy();
        //print "Debe iniciar sesion";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>InvenTools Control</title>
</head>
<body>
    <body class="hub">
    <div class="contenedorFlex ">   
        <div class="bgMenu">
            <div class="titulo">
                <p>InvenTools Control</p>
            </div>
            <div class="formulario">
                <form action="#" method="POST">
                    <input type="text" name="txtUsuario"  placeholder="Usuario" class="input"><br><br>
                    <input type="password" name="txtContrasena"  placeholder="Contraseña" class="input">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <input type="submit" value="Ingresar" class="btnIngresar" name="cmdLoguear">
                       </form>
                </div>
           </div>
    </div>
      </body>
</html>