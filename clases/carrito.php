<?php
require '../Config/config.php';

if (isset($_POST['idProducto'])) {
    $id = $_POST['idProducto'];
    $cantidad = isset($_POST['cantidad'])?  $_POST['cantidad'] : 1;
    $token = $_POST['token'];

    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN); // Generar el token

    if ($token == $token_tmp && $cantidad > 0 && is_numeric($cantidad)) {

        if (isset($_SESSION['carrito']['productos'][$id])) {
            $_SESSION['carrito']['productos'][$id] += $cantidad;
        } else {
            $_SESSION['carrito']['productos'][$id] = $cantidad;
        }

        $datos['numero'] = count($_SESSION['carrito']['productos']);
        $datos['ok'] = true;

    } else {
        $datos['ok'] = false;
    }

} else {
    $datos['ok'] = false;
}

echo json_encode($datos);

?>
