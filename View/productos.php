<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos_administrador22.css" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>Mostrar Datos</title>
</head>
<body> 

<?php
if (isset($_GET['valor'])) {
    $valor = $_GET['valor'];
    if ($valor == 1) {
        ?>
        <script>            
            window.onload = function cargarPagina() { 
                swal("El producto se modifico correctamente")
                .then((value) => {
                window.location.replace("../View/productos.php");            
                });
                        
        };
        </script>
        <?php
    }
    if ($valor == 2) {
        ?>
        <script>            
            window.onload = function cargarPagina(){ 
                swal("Se ha producido un error al modificar el producto, verifique que el ID y/o el nombre no se encuentren ya registrados")
                .then((value) => {
                window.location.replace("../View/productos.php");            
                });           
        };
        </script>
        <?php
    }
    if ($valor == 3) {
        ?>
        <script>            
            window.onload = function cargarPagina(){ 
                swal("Producto eliminado correctamente")
                .then((value) => {
                window.location.replace("../View/productos.php");            
                });           
        };
        </script>
        <?php
    }
}

?>


<div class="container-navbar">
            <nav class="navbar container">
                <i class="fa-solid fa-bars"></i>
           
                
                <a href="administrador.php" id="logo">AGROMARKET </a>
                
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


    <center><h1 class="titulo contenedorPrincipal">PRODUCTOS</h1></center>

    <!-- ComboBox Inicio -->
    <div class="contenedor">
    <div class="custom-select">
        <!-- Combo box con dos opciones -->
        <form action="" method="post">
        <select name="opcion">
            <option value="opcion1">Buscar por ID</option>
            <option value="opcion2">Buscar por Nombre</option>
        </select>

    </div>
    <div class="inputBuscar">
        <input type="text" id="inputT" name="valor" placeholder="Buscar producto" required>
        <input type="submit" value="Buscar" id="inputBtn">
    </div>
    </form>

    </div>
    <div class="contenedorPrincipal">
    <a id="inputBtnTP" href="productos.php">Mostrar todos los productos</a>
    <!-- <input type="submit" value="Mostrar todos los productos" id="inputBtnTP"> -->
    </div>
    <!-- ComboBoxFinal -->
<center>
    <table border="2px">
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>CATEGORÍA</th>
            <th>CANTIDAD</th>
            <th>PRECIO</th>
            <th>EDITAR‎‎‎ | ‎‎‎ ELIMINAR </th>
        </tr>
           <?php 
            if (isset($_POST["valor"])){
                include("../Model/BuscarProductoID.php");
            }else {
                include("../Model/Productos_Editar-Eliminar.php");
            }
            ?>
    </table>
    </center>

    <div class="espacio"></div>

    <style>
    table a{
        font-size: 1.5rem;
        text-decoration: underline;
    }
    table {
        border-collapse: collapse;
        width: 70%;
        font-size: 1.5rem;
    }
    .titulo{
        font-size: 5rem;
    }
    th {
        background-color: #00BFFF; /* Color de fondo celeste */
        color: white; /* Color de texto blanco */
        border: 2px solid black; /* Borde negro de 2px */
        
    }
    
    td {
        border: 1px solid black; /* Borde negro de 1px para las celdas */
        padding: 8px;
    }


    /* ComboBox */
    .custom-select {
            width:22%;
            /* position: relative; */
            color: #333;
            height:5rem;
            margin-right:3rem;

        }

        .custom-select select {
            /* appearance: none; 
            -webkit-appearance: none;
            -moz-appearance: none;  */
            display: block;
            width: 100%;
            padding: 10px 20px;
            background-color: #00cc66; /* Fondo verde */
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.5rem;
        }

        /* Estilos para las opciones */
        .custom-select select option {
            padding: 10px 20px;
            background-color: #00994d;
        }
        .contenedor {
            width: 70%;
            margin: 20px auto;
            display:flex;
        }
        .contenedorPrincipal{
            width: 70%;
            margin: 20px auto;
        }
        .inputBuscar{
            margin-left:-1rem;

        }
        #inputT{
            width:60rem;
            height:5rem;
        }
        #inputBtn{
            background-color: #00aadd; /* Fondo celeste */
            color: #fff; /* Letras color blanco */
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            height:5rem;
        }

        #inputBtn:hover{
            background-color: #0088bb;
        }

        select{
            background-color: #00cc66; /* Fondo verde */
            color: #fff; /* Letras color blanco */
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            height:5rem;
        }
        select:hover{
            background-color: #00994d;  
        }

        #inputBtnTP{
            background-color: #1a5276; /* Fondo celeste */
            color: #fff; /* Letras color blanco */
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            height:5rem;
            text-decoration: none;
        }

        #inputBtnTP:hover{
            background-color: #2471a3;
        }

        .espacio{
            margin-top:20rem;
        }

        .modal {
            display: none; /* Inicialmente oculta la ventana modal */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Fondo oscuro semitransparente */
        }

        /* Estilo para el contenido de la ventana modal */
        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>

<!-- Ventana Modal -->
<?php $p="ddd" ?>
<div class="modal">
        <div class="modal-content">
            <h2>Contenido de la Ventana Modal</h2>
            <p>Esto es una ventana modal sin usar ID.</p>
            <a href="#" class="close-modal-link"><?php echo $p?></a>
        </div>
    </div>

    <script>
           // Obtener todos los enlaces para abrir la ventana modal
           const openModalLinks = document.querySelectorAll('.open-modal-link');
        
        // Obtener la ventana modal
        const modal = document.querySelector('.modal');
        
        // Obtener el enlace para cerrar la ventana modal
        const closeModalLink = document.querySelector('.close-modal-link');
        
        // Función para abrir la ventana modal
        function openModal() {
            modal.style.display = 'block';
        }
        
        // Función para cerrar la ventana modal
        function closeModal() {
            modal.style.display = 'none';
        }
        
        // Agregar el evento para abrir la ventana modal a todos los enlaces
        openModalLinks.forEach(link => {
            link.addEventListener('click', openModal);
        });
        
        // Agregar el evento para cerrar la ventana modal al enlace correspondiente
        closeModalLink.addEventListener('click', closeModal);
    </script>


<footer class="footer">
            <p>©Administrador</p>
        </footer>
    <script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>
 
</body>
</html>