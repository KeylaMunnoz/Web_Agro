<?php
session_start(); // Asegurarse de iniciar la sesión antes de usar $_SESSION

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $id = isset($_POST['idProducto']) ? $_POST['idProducto'] : 0;

    if ($action == 'eliminar') {
        $datos['ok'] = eliminar($id);
    } else {
        $datos['ok'] = false;
    }
} else {
    $datos['ok'] = false;
}

echo json_encode($datos); // Agregar punto y coma al final de la línea

function eliminar($id) {
    if (isset($_SESSION['carrito']['productos'][$id])) {
        unset($_SESSION['carrito']['productos'][$id]);
        return true;
    } else {
        return false;
    }
}

