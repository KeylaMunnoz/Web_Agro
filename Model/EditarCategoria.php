<?php
include("../config/conexion.php");
$idCategoria = $_GET['id'];
$sql = "SELECT*FROM categoria where id='$idCategoria'";
$resultado = mysqli_query($conexion,$sql);
 
while($mostrar=mysqli_fetch_array($resultado)){
    ?>
            <?php $Id = $mostrar['id'];?> 
             <?php  $nombre = $mostrar['nombre']; ?> 
    <?php
}
//onclick="confirmacion()"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoria</title>
    <script src="../js/EdicionCateg.js"></script>
    <link rel="stylesheet" href="../css/estilos_administrador.css" />
 </head>
<body>
    <header>
        <div class="container-navbar">
            <nav class="navbar container">
                <i class="fa-solid fa-bars"></i>
                <a href="../View/administrador.php" id="logo">AGROMARKET </a>
            </nav>
        </div>
        </header>
        <main>

            <h1 id="titulo">EDITAR CATEGORIA</h1>
            <center>
            <form action="EditarVCategoria.php" method="POST">
            <table>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
            </tr>
             <tr>
                <td><input id="modificacionInput" readonly type="text" name="idC" value="<?php echo $Id?>"> </td>      
                <td><input id="modificacionInput" type="text" name="nombreC" value="<?php echo $nombre?>"></td> 
             </tr>
           </table>
           <input type="submit" class="EditarCateg" value="MODIFICAR" ></input>
         
        </form>
        </center>
        </main> 
        <footer class="footer">
            <p>©Administrador</p>
        </footer>
  
</body>
</html>