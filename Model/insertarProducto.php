<?php
include("../Config/Conexion.php");
$id=$_POST["id"];
$nombreP=$_POST["nombre"];
$precio=$_POST["precio"];
$cantidad=$_POST["cantidad"];
$descripcion=$_POST["descripcion"];
$categoria=$_POST["opcion"];
$imagen='';
if(isset($_FILES["imagen"])){
    $file=$_FILES["imagen"];
    $nombre=$file["name"];
    $tipo=$file["type"];
    $ruta_provisional=$file["tmp_name"];
    $size = $file["size"];
    $dimensiones = getimagesize ($ruta_provisional);
    $width = $dimensiones[0];
    $height=$dimensiones[1];
    $carpeta="../img/imagenesProd/";

    $src = $carpeta.$nombre;
    move_uploaded_file ($ruta_provisional, $src);
    $imagen=$carpeta.$nombre;       
}
$sql="INSERT into productos(idProducto,nombre,precio,cantidad,descripcion,categoria,imagen) values('$id','$nombreP','$precio','$cantidad','$descripcion','$categoria','$imagen')";
$regre=mysqli_query($conexion,$sql);
if($regre){
    header("location:../View/nuevoProducto.php?valor=1");
}else{
    header("location:../View/nuevoProducto.php?valor=2");
}
?>