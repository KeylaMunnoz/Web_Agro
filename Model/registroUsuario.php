<?php
    include("../Config/Conexion.php");
    $nombre_RU = $_POST['nombre_RU'];
    $apellido_RU = $_POST['apellido_RU'];
    $fecha_nac_RU = $_POST['fecha_nac_RU'];
    $telefono_RU = $_POST['telefono_RU'];
    $email_RU = $_POST['email_RU'];
    $contrasena_RU = sha1($_POST['contrasena_RU']);


    //Primero se comprueba si existe alguna cuenta con el correo ingresado
    $sqlComprobacion = "SELECT * FROM cliente WHERE correo = '$email_RU'";
    $consulta = mysqli_query($conexion,$sqlComprobacion);
    if(mysqli_num_rows($consulta) == 1){
        header("location:../View/login.php?valor=3");            

    }
    else{
        $sql = "INSERT INTO cliente(correo,nombre,apellido,fecha_nacimiento,telefono,clave) values ('$email_RU','$nombre_RU','$apellido_RU','$fecha_nac_RU','$telefono_RU','$contrasena_RU')";
        mysqli_query($conexion, $sql);
        header("location:../View/login.php?valor=4");     
    }

?>