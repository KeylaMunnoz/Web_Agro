<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Categoría</title>
    <link rel="stylesheet" href="../css/estilos_administradorCat.css" />
    <script src="../js/newCategoria.js"></script>
</head>
<body> 
    <header>
        <div class="container-navbar">
            <nav class="navbar container">
                <i class="fa-solid fa-bars"></i>
                <a href="../View/administrador.php" id="logo"> AGROMARKET </a>
         
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
        <h1 id="titulo">AÑADIR CATEGORÍA</h1>
          <div class="ingreso">

           <table id="tablaA">
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
            </tr>
            <?php
                include("../Model/AggCategoria.php");
            ?>
           </table>
       <hr class="linea"></hr>

       <form action="../Model/AgregarCategoria.php" method="POST">

       <fieldset class="ingresoDatosC">
        <legend><h2>Ingreso de datos</h2></legend>
         <label for="" >ID</label>
         <input type="text" name="idCat" placeholder="4 Dígitos" id="idCategoria" onkeypress="proceso1(event)" required><br><br>
         <label for="" >Nombre categoría</label>
         <input type="text" name ="nomCat" placeholder="Categoria" id="nombreCategoria" onkeypress="proceso2(event)" required>
        </fieldset>
       <input type="submit" id="Subir" value="Guardar" onclick="validacion2()">
       </form>
</div>
        </main> 
        <footer class="footer">
            <p>©Administrador</p>
        </footer>
        <script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>
<?php
        // include("../Config/Conexion.php");
         
         if (isset($_GET['valor'])) {
            $valorRec = $_GET['valor'];
            if($valorRec==1){
            ?>
        <script>            
        window.onload = function cargarPagina() { 
        swal("Categoría registrada correctamente")
                    .then((value) => {
                        window.location.replace("../View/NuevaCategoria.php");            
                    });
                    };
        </script>
        <?php
            }
            if($valorRec==2){
        ?>
            <script>            
                window.onload = function cargarPagina(){ 
                    swal("Se ha producido un error al ingresar la categoría, verifique que el ID y/o el nombre no se encuentren ya registrados.")
                    .then((value) => {
                        window.location.replace("../View/NuevaCategoria.php");            
                    });
                    };
            </script> 
        <?php
            }
        }
    ?>