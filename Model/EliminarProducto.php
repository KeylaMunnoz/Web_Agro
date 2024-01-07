<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $v = false;
    if (isset($_GET["confirm"])) {
        // Si se ha confirmado la eliminación, establece la variable PHP $v en true
        $v = true;
    }
    
    if ($v) {
        include("../Config/Conexion.php");
        $id = $_GET["id"];
        $sql = "DELETE FROM productos WHERE idProducto = '$id'";
        $regre = mysqli_query($conexion, $sql);
        if ($regre) {
            header("location:../View/productos.php?valor=3");
            exit; // Importante: terminar la ejecución del script después de la redirección
        } else {
            header("location:../View/productos.php");
            exit; // Importante: terminar la ejecución del script después de la redirección
        }
    }
}
?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    window.onload = function cargarPagina() {
        if (confirm("¿Está seguro que desea eliminar ese producto?")) {
            // Si el usuario confirma, agregar el parámetro "confirm" a la URL y recargar la página
            window.location.href = window.location.href + "&confirm=true";
        } else {
            swal("No se ha eliminado el producto")
                .then((value) => {
                window.location.replace("../View/productos.php");            
                });
        }
    };
</script>
