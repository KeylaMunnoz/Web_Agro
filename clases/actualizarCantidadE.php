<?php
require '../Config/database.php';

$bd = new Database();
$con = $bd->conectar();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recuperar los valores enviados desde JavaScript
    $idProducto = $_POST['idProducto'];
    $cantidadE = $_POST['cantidad'];

    // Realizar la actualización de la cantidad
    $sqlUpdateCantidad = $con->prepare("UPDATE productos SET cantidad = cantidad + ? WHERE idProducto = ?");
    $sqlUpdateCantidad->execute([$cantidadE, $idProducto]);

    // Enviar una respuesta de éxito al cliente
    //echo "Cantidad actualizada correctamente";
}
?>