<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" 
    
    
    
    content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos_administrador2.css" />
    <title>Ingresar producto</title>
    <!-- <script src="../js/NuevoProducto.js"></script> -->
    <script src="../js/NuevProducto.js"></script>
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
                swal("Nuevo producto registrado correctamente")
                .then((value) => {
                window.location.replace("../View/nuevoProducto.php");            
                });
                        
        };
        </script>
        <?php
    }
    if ($valor == 2) {
        ?>
        <script>            
            window.onload = function cargarPagina(){ 
                swal("Se ha producido un error al ingresar el producto, verifique que el ID y/o el nombre no se encuentren ya registrados")
                .then((value) => {
                window.location.replace("../View/nuevoProducto.php");            
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

    <div class="contenedorPrincipal">
    <center><h1 class="titulo ">Ingresar nuevo producto</h1></center>
    <br><br>
    <form action="../Model/insertarProducto.php" method="post" enctype="multipart/form-data">
        <fieldset>
        
            <div class="datos">
                <label for="">ID</label>
                <input placeholder="Ingrese un ID de 4 dígitos" type="text" name="id" id="ID" onkeypress="ingresoID(event)" required><br><br>
                <label for="">Nombre</label>
                <input placeholder="Ingrese el nombre" type="text" name="nombre" id="NOMBRE" onkeypress="ingresoNombre(event)" required><br><br>
                <label for="">Precio</label>
                <input placeholder="Ingrese el precio" type="text" name="precio" id="PRECIO" onkeypress="ingresoPrecio(event)" required><br><br>
                <label for="">Cantidad</label>
                <input placeholder="Ingrese la cantidad" type="text" name="cantidad" id="CANTIDAD" onkeypress="ingresoCantidad(event)" required><br><br>
                <label for="">Descripción</label>
                <input placeholder="Ingrese la descripción" type="text" name="descripcion" id="DESCRIPCION" onkeypress="ingresoDescripcion(event)" required><br><br>
                <label for="">Categoría</label>
                <select name="opcion" id="miSelect">
                <?php
                include("../Config/Conexion.php");
                $sql = "SELECT * from categoria ";

                    $resultado = mysqli_query($conexion, $sql);
                    while ($mostrar = mysqli_fetch_array($resultado)) {
                    ?>                    
                    <option value="<?php echo $mostrar['id']; ?>"><?php echo $mostrar['nombre']; ?></option>
            
     
              
                    <?php
                    }
                    ?>

                </select>
                <br><br>
                <label for="">Selecciona una imagen</label>
                <input type="file" id="imagenProducto" name="imagen" accept="image/*" required>
                <img class="imagen-peq" id="imagenCargada" src="">
            </div>

            <center><input type="submit" value="Guardar" class="sub"></center>        
        </fieldset>

    </form>
</div>
<div class="espacio"></div>
<footer class="footer">
            <p>©Administrador</p>
        </footer>
 

<style>
        .imagen-peq{
                display:flex;
            width: 200px;
            height: auto;
        }
        .titulo{
        font-size: 3rem;
    }
    .contenedorPrincipal{
            width: 70%;
            margin: 20px auto;
        }
        fieldset{
        background-color: rgb(204, 224, 224);
        border-radius: 1rem;
        width: 50rem;
        font-size: 2rem;
    }
    form{
        display: flex;
        justify-content: center;
   
    }
    .sub{
        background-color: rgb(0, 255, 102);
        color: white;
        border:none;
        padding: 1.2rem 7rem;
        font-weight: bold;
        margin: 3rem 0;
        border-radius:2rem;
        font-size:1.7rem;
    }
    .sub:hover{
        background-color: rgb(17, 75, 40);
        cursor: pointer;
    }
    .datos{
        padding-top:3rem;
        padding-left:2rem;
        padding-right:2rem;
    }



  /* Estilos para los labels */
  .datos label {
    text-align: left;
    padding-right: 10px;
  }

  /* Estilos para los inputs */
  .datos input{
    display: inline;
    align-items: center;
    width: 250px; /* Ajusta el ancho según sea necesario */
    height: 3.5rem;
   
  }


  .espacio{
            margin-top:20rem;
        }


/* Select */
/* Estilos para el elemento select */
#miSelect {
  /* Cambiar el tamaño de fuente */
  font-size: 16px;
  /* Cambiar el color de fondo */
  background-color: #f2f2f2;
  /* Cambiar el color del texto */
  color: #333;
  /* Cambiar el relleno interno (padding) */
  padding: 5px;
  /* Cambiar el ancho del select si lo deseas */
  width: 200px;
  /* Cambiar el borde */
  border: 1px solid #ccc;
  /* Cambiar el cursor al pasar el mouse */
  cursor: pointer;
}

/* Estilos para las opciones (option) dentro del select */
#miSelect option {
  /* Cambiar el color de fondo */
  background-color: #fff;
  /* Cambiar el color del texto */
  color: #333;
  /* Cambiar el tamaño de fuente */
  font-size: 14px;
}

/* Cambiar el color de fondo cuando se selecciona una opción */
#miSelect option:checked {
  background-color: #007bff; /* Puedes ajustar el color a tu preferencia */
  color: #fff;
}

#ID{
    margin-left:9rem;
}

#NOMBRE{
    margin-left:3rem;
}

#PRECIO{
    margin-left:5rem;
}

#CANTIDAD{
    margin-left:2rem;
}

#DESCRIPCION{
    margin-left:0rem;
}
#miSelect{
    margin-left:1.9rem;
}





</style>

<script>
    // Cargar imágen
        const inputImagen = document.getElementById('imagenProducto');
        const imagenCargada = document.getElementById('imagenCargada');

        // Evento que se ejecuta cuando se selecciona una imagen
        inputImagen.addEventListener('change', function() {
            const file = inputImagen.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagenCargada.setAttribute('src', e.target.result);
                }

                reader.readAsDataURL(file);
            } else {
                imagenCargada.setAttribute('src', '#');
            }
        });
</script>
<script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>

</body>
</html>

