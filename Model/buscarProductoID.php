<?php



include("../Config/Conexion.php");
$valor=$_POST["valor"];
$opcion=$_POST["opcion"];
if($opcion=="opcion2"){
    $sql = "SELECT p.idProducto, p.nombre AS nombreProducto, c.nombre AS nombreCategoria, p.cantidad, p.precio FROM productos p JOIN categoria c on p.categoria=c.id WHERE p.nombre LIKE '$valor%'";
}else{
    $sql = "SELECT p.idProducto, p.nombre AS nombreProducto, c.nombre AS nombreCategoria, p.cantidad, p.precio FROM productos p JOIN categoria c on p.categoria=c.id WHERE p.idProducto LIKE '$valor%'";
}
$resultado = mysqli_query($conexion, $sql);
if(mysqli_num_rows($resultado) == 0){
    ?>
    <tr>
        <td colspan="6">
        <h1>Producto/s no encontrado/s</h1>
        </td>
        
    </tr>

    <?php
}

while ($mostrar = mysqli_fetch_array($resultado)) {
    ?>
    <tr>
        <td><?php echo $mostrar['idProducto'] ?></td>
        <td><a href="../Model/ProductosDetalles.php?id=<?php echo $mostrar['idProducto'] ?>"><?php echo $mostrar['nombreProducto'] ?></a></td>
        <td><?php echo $mostrar['nombreCategoria'] ?></td>
        <td><?php echo $mostrar['cantidad'] ?></td>
        <td><?php echo $mostrar['precio'] ?></td>
        <td>
            <center>
                <a href="../Model/EditarProducto.php.php?id=<?php echo $mostrar['idProducto'] ?>"><img src="../img/icons/editar.png" alt=""></a>
                ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ 
                <a href="../Model/EliminarProducto.php?id=<?php echo $mostrar['idProducto'] ?>"><img src="../img/icons/eliminar.png" alt=""></a>
            </center>
        </td>
    </tr>
    <style>
        img {
            width: 2rem;
        }
    </style>
<?php
}
?>
