<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="../css/estilos_administrador.css" />
    <script src="../js/CerrarSesion.js"></script>
</head>
<body>
    <header>
        

        <div class="container-navbar">
            <nav class="navbar container">
              
                
                <a href="" id="logo">AGROMARKET </a>
                <div class="cuentas">
               
                    <select name="" id="selector"  onchange="cerrar(this)">

                  <?php  
                  include("../Config/Conexion.php"); 
                  $sql = "SELECT*FROM cliente WHERE  correo LIKE '%agromarket.com'";
                  $resultado = mysqli_query($conexion, $sql);
                  while ($mostrar = mysqli_fetch_array($resultado)) {
                  ?> 
                    <option hidden><?php echo $mostrar['nombre'];?> <?php echo $mostrar['apellido'];?></option>
                  <?php
                  }
                  ?>
                    <option value ="cerrar">Cerrar Sesión </option>
               <!-- <a id ="logoutButton" href ="../Model/cerrarSesion.php"> Cerrar Sesión</a>-->
                    </select> 
                     
                    <label id="logocombo"><i id="userIcon" class="fa-solid fa-user"></i></label>
                    <style>
                        #userIcon{
                            color: white;
                            
                            font-size: 30px;
                        }
                      
                    </style>
                                    <!-- <form class="search-form" action="../View/ayuda.html">
                    <button type="submit" class="btn-search">
                        <i class="fa-solid fa-circle-info"></i>
                    </button>
				</form> -->
                    <a  id="ayudaBtn" href="../View/ayudaAdmin.html">
                        <i class="fa-solid fa-circle-info"></i>
                    </a>
                </div>
                    <style>
                    #logocombo {
                        margin-top: 10px;
                        font-size: 20px;
                     
                    }
                    .cuentas{
                        display: flex;
                        
                    }
                    option{
                        background-color:rgb(154, 208, 164);
                         
                    }
                    
                    #selector {
                        width: 250px;
                        height: 50px;
                        margin-right: 10px;
                        background-color: transparent;
                        border: none;
                        cursor: pointer;
                    }
                    #ayudaBtn i {
                        font-size: 2.5rem;
                        margin-top: 11px;
                        padding-left: 20px;
                        color: #fff;
                    }
                    
                </style>

             </nav>

        </div>
    </header>
        <main>

            <h1 id="titulo">BIENVENIDO</h1>
            
            <center>
<div id="opciones">
           <a href="productos.php">
                <button>Productos <br><h1>&#x1F33D;</h1></button>
           </a>
</div>
<div id="opciones">
            <a href="nuevoProducto.php">
                <button>Añadir producto <br><h1>&#43; &#x1F345;</h1>
                </button>
            </a>
</div>
<div id="opciones">
            <a  href="categorias.php">
                <button>Categorías <br><h1>🏷️</h1></button>
            </a>
</div>
<div id="opciones">
            <a href="Nuevacategoria.php">
                <button>Añadir categoría <h1>&#43;🏷️</h1></button>
            </a>
</div>
<div id="opciones">
            <a href="Reportes.html">
                <button>Reportes <h1>📋</h1></button>
            </a>
</div>

        </center>
        </main> 
        <footer class="footer">
            <p>©Administrador</p>
        </footer>
 
    <script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>
</body>
</html>