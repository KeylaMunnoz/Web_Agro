<?php
    include("../Config/Conexion.php");
    $Id = $_POST['idC'];
    $Nombre = $_POST['nombreC'];
    
    $sql = "UPDATE categoria SET id='$Id', nombre='$Nombre' WHERE id='$Id'";
    $regre =  mysqli_query($conexion,$sql);
   
    if($regre){
        echo '<script>
        window.onload = function cargarPagina() { 
            alert("Categoría modificada correctamente.");
            window.location.replace("../View/categorias.php");            
        };
        </script>';
    }
?>