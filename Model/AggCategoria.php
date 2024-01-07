<?php
    include("../Config/Conexion.php");
    $sql = "SELECT*FROM categoria";
    $resultado = mysqli_query($conexion, $sql);
    while($mostrar = mysqli_fetch_array($resultado)){
        ?>
        <tr>
            <td><?php echo $mostrar['id']?></td>
            <td><?php echo $mostrar['nombre']?></td>
            
        </tr>
        <?php
    }
?>