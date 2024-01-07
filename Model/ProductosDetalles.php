<?php 

include("../Config/Conexion.php");
$id=$_GET['id'];
$sql = "SELECT p.idProducto,p.descripcion,p.imagen, p.nombre AS nombreProducto, c.nombre AS nombreCategoria, p.cantidad, p.precio FROM productos p JOIN categoria c on p.categoria=c.id WHERE p.idProducto='$id'";
$resultado=mysqli_query($conexion,$sql);
while($mostrar=mysqli_fetch_array($resultado)){    
         $id=$mostrar['idProducto']; 
         $nombreProducto=$mostrar['nombreProducto']; 
         $nombreCategoria =$mostrar['nombreCategoria']; 
         $cantidad =$mostrar['cantidad']; 
         $precio =$mostrar['precio']; 
         $descripcion =$mostrar['descripcion']; 
         $imagen =$mostrar['imagen']; 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos_administrador22.css" />
    <title>Editar producto</title>
    <script src="../js/NuevoProducto.js"></script>
</head>
<body> 

<div class="container-navbar">
            <nav class="navbar container">
                <i class="fa-solid fa-bars"></i>
           
                
                <a href="../View/administrador.php" id="logo">AGROMARKET</a>
                
           
            </nav>

        </div>

    <div class="contenedorPrincipal">
    <br><br>
    <form action="../Model/editarProdSQL.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <br>
        <center><h1 class="titulo "><?php echo $nombreProducto?> - <?php echo $id?></h1>
        <br>
        <img class="imagen-peq" id="imagenCargada" src="<?php echo $imagen; ?>">
        </center>    
        <div class="datos">
                <label for=""><b>Descripción:</b></label>
                <label name="descripcion" id="DESCRIPCION"><?php echo $descripcion?></label><br><br>
                <label for=""><b>Precio:</b></label>
                <label name="precio" id="PRECIO" >$ <?php echo $precio?></label><br><br>
                <label for=""><b>Cantidad:</b></label>
                <label name="cantidad" id="CANTIDAD"><?php echo $cantidad?></label><br><br>
                <label for=""><b>Categoría:</b></label>
                <label name="categoria" id="CATEGORIA"><?php echo $nombreCategoria?></label><br><br>         
            </div>
        </fieldset>

    </form>
</div>
<div class="espacio"></div>
<footer class="footer">
            <p>©Administrador</p>
        </footer>
 

<style>
            .imagen-peq {
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

</body>
</html>

