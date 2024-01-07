<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador | Categorias</title>
    <link rel="stylesheet" href="../css/estilos_administradorCat.css" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

<?php
if (isset($_GET['valor'])) {
    $valor = $_GET['valor'];
    if ($valor == 1) {
        ?>
        <script>            
            window.onload = function cargarPagina() { 
                swal("Categoría eliminada correctamente.")
                .then((value) => {
                window.location.replace("../View/categorias.php");            
                });                   
        };
        </script>
        <?php
    }
}

?>

<?php
if (isset($_GET['valor'])) {
    $valor = $_GET['valor'];
    if ($valor == 2) {
        ?>
        <script>             
            window.onload = function cargarPagina() { 
                swal("La categoria con ese código tiene productos, no es posible eliminar")
                .then((value) => {
                window.location.replace("../View/categorias.php");            
                });                   
        };
        </script>
        <?php
    }
}

?>


    <header>
        <div class="container-navbar">
            <nav class="navbar container">
                <i class="fa-solid fa-bars"></i>
                <a href="../View/administrador.php" id="logo">AGROMARKET </a>

                <a  id="ayudaBtn" href="../View/ayudaAdmin.html">
                    <i class="fa-solid fa-circle-info"></i>
                </a>
                <style>
                    #ayudaBtn i {
                        font-size: 2.5rem;
                        
                        color: #fff;
                    }
                </style>   
            </nav>
        </div>
        </header>
        <main>
            <h1 id="titulo">CATEGORÍAS</h1>
            <center>
           <table>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>EDITAR | ELIMINAR</th>
            </tr>
            <?php
                include("../Model/Categorias_EditarEliminar.php");
            ?>
           </table>
        </center>
        </main> 
        <footer class="footer">
            <p>©Administrador</p>
        </footer>
    <script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>
</body>
</html>