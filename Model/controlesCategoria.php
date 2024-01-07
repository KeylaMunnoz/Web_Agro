<?php
//valorR: valor recibido
//valor: es el nombre de la variable puesta en el index
include("../Config/Conexion.php");
$valorR =  $_GET['valor'];
   if($valorR==1){
        $con=0;
        $id=$_GET['id'];
        $sql = "SELECT * FROM categoria WHERE id='$id'";
        $resultado = mysqli_query($conexion, $sql);
        $con= mysqli_num_rows($resultado);
        echo $con;
   }else{
    if($valorR==2){
         $con=0;
         $nombre=$_GET['nombre'];
         $sql = "SELECT * FROM categoria WHERE nombre='$nombre'";
         $resultado = mysqli_query($conexion, $sql);
         $con= mysqli_num_rows($resultado);
         echo $con;
    }
   }
?>