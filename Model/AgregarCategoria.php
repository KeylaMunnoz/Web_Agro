<?php

    include("../Config/Conexion.php");
    $Id = $_POST["idCat"];

    $nombre = $_POST["nomCat"];

    $sql = "INSERT INTO categoria(id, nombre) VALUES('$Id', '$nombre')";
    $resultado = mysqli_query($conexion, $sql);
     
    if($resultado){
        header("location:../View/Nuevacategoria.php?valor=1");
    }else{
        header("location:../View/Nuevacategoria.php?valor=2"); 
    }
    
?>