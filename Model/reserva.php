<?php
echo "Entrando a la reserva";
require '../Config/config.php';
require '../Config/database.php';

$bd = new Database();
$con = $bd->conectar();

$nombreU = ""; // Variable para almacenar el nombre del usuario
$correoU = ""; // Variable para almacenar el correo del usuario

if (isset($_GET['nombreBase'])) {
    $nombreU = $_GET['nombreBase'];
}

if (isset($_GET['correoBase'])) {
    $correoU = $_GET['correoBase'];
}
						
	
if (isset($_POST['confirmar_reserva'])) {
    $correo = $_POST['correo'];
    
    // Obtén el último código de reserva del contador
    $sql_get_counter = $con->prepare("SELECT codigo FROM contador_reservas");
    $sql_get_counter->execute();
    $row_counter = $sql_get_counter->fetch(PDO::FETCH_ASSOC);

    if ($row_counter) {
        $codigoReserva = $row_counter['codigo'];
    } else {
        // Si no se obtiene ningún resultado, comenzamos el contador desde 1
        $codigoReserva = 1;
    }

    // Realiza la inserción en la tabla reserva para cada producto del carrito
    $productos = $_SESSION['carrito']['productos'];
    foreach ($productos as $idProducto => $cantidad) {
        // Ahora insertamos los datos en la tabla de reserva junto con el código de reserva
        $sql_insert = $con->prepare("INSERT INTO reserva (reserva, cliente, producto, cantidad) VALUES (?, ?, ?, ?)");
        $sql_insert->execute([$codigoReserva, $correo, $idProducto, $cantidad]);
    }

    // Actualiza el contador con el nuevo valor
    $codigoReserva = $row_counter['codigo'] + 1;
    $sql_update_counter = $con->prepare("UPDATE contador_reservas SET codigo = ?");
    $sql_update_counter->execute([$codigoReserva]);

    // Vacía el carrito después de confirmar la reserva
    unset($_SESSION['carrito']['productos']);

    header('Location:../View/principalUsuario.php?nombreBase=' . $nombreU . '&correoBase=' . $correoU);
    exit();
} else {
    header('Location:../View/principalUsuario.php?nombreBase=' . $nombreU . '&correoBase=' . $correoU);
    exit();
}
?>
