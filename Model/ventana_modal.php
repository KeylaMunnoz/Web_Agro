<?php
    include("../Config/Conexion.php");
    $sql = "SELECT nombre, precio,descripcion,cantidad,categoria FROM producto";
    $resultado = mysqli_query($conexion, $sql);
    while($mostrar = mysqli_fetch_array($resultado)){
        ?>
        <tr>
            
            <td><?php echo $mostrar['nombre']?></td>
            <td><?php echo $mostrar['precio']?></td>
            <td><?php echo $mostrar['descripcion']?></td>
            <td><?php echo $mostrar['categoria']?></td>
            <td><?php echo $mostrar['cantidad']?></td>
        </tr>
        <?php
    }
?>