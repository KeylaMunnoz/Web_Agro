<?php
include("../Config/Conexion.php");
$valoR=$_GET['valor'];

switch ($valoR) {
    case 1:
        $contador=0;
        $id=$_GET['id'];
        $sql = "SELECT * from productos WHERE idProducto='$id'";
        $resultado = mysqli_query($conexion, $sql);
        while($mostrar = mysqli_fetch_array($resultado)){
                $contador=$contador+1;
        }
        echo $contador;
    break;
    case 2:
        $contador=0;
        $nombre=$_GET['nombre'];
        $sql = "SELECT * from productos WHERE nombre='$nombre'";
        $resultado = mysqli_query($conexion, $sql);
        while($mostrar = mysqli_fetch_array($resultado)){
                $contador=$contador+1;
        }
        echo $contador;
    break;
}
?>
