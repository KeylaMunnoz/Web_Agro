<?php
    include("../Config/Conexion.php");
    $email_IS = $_POST['email_IS'];
    $clave_IS = sha1($_POST['contrasena_IS']);
    $sql = "SELECT * FROM cliente WHERE correo = '$email_IS'";
    $consulta = mysqli_query($conexion,$sql);
    $resultado = mysqli_fetch_array($consulta);

    if(mysqli_num_rows($consulta) == 1){
        if($resultado['clave'] == substr($clave_IS, 0, 15)){
            // Comprobar el dominio del correo
            $dominio = substr($email_IS, strpos($email_IS, '@') + 1);
            if ($dominio === 'agromarket.com') {
                header("location:../View/administrador.php");
            } else {
                header("location:../View/principalUsuario.php?nombreBase=$resultado[nombre]&correoBase=$resultado[correo]");
            }
        }else{
            header("location:../View/login.php?valor=1");            
        }
    }
    else{
        header("location:../View/login.php?valor=2");            
    }

?>