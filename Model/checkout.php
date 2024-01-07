
<?php
require '../Config/config.php';
require '../Config/database.php';

$bd = new Database();
$con = $bd->conectar();

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

$lista_carrito = array();

if ($productos != null) {
    foreach ($productos as $clave => $cantidadP) {
        $sqlP = $con->prepare("SELECT idProducto, nombre, precio, $cantidadP AS cantidad FROM productos WHERE idProducto=?");
        $sqlP->execute([$clave]);
        $lista_carrito[] = $sqlP->fetch(PDO::FETCH_ASSOC);
    }
}

//session_destroy();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product</title>
    <link rel="stylesheet" href="../css/principalUsuario.css" />
    <!-- Cargar la librería de Bootstrap -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <!-- Cargar los scripts de JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> 
    
</head>
<body>
    <header>
    <div class="container-hero">
				<div class="container hero">
					<div class="customer-support">
						<i class="fa-solid fa-headset"></i>
						<div class="content-customer-support">
							<span class="text">Soporte al cliente</span>
							<span class="number">123-456-7890</span>
						</div>
					</div>
					<?php
						if(isset($_GET['nombre2'])){
							$nombreU = $_GET['nombre2'];
						} 
						
						if(isset($_GET['correo2'])){
							$correo = $_GET['correo2'];
						}
						
					?>
					<div class="container-logo">
						<i class="fa-solid fa-wheat-awn"></i>
						<h1 class="logo"><a href="../View/principalUsuario.php?nombreBase=<?php echo $nombreU?>&correoBase=<?php echo $correo?>">AgroMarket</a></h1>
					</div>



					<div class="container-user">
                        <label for="">Bienvenido <?php echo $nombreU ?></label>
						<div class="logout-container">
							<i class="fa-solid fa-user" id="user-icon"></i>
							<div class="logout-dropdown" id="logout-dropdown">
							<button onclick="logout()">Cerrar Sesión</button>
							</div>
						</div>
						<i class="fa-solid fa-basket-shopping"></i>
						<div class="content-shopping-cart">
						<div class="content-shopping-cart">
                            <span class="text">Carrito</span>
							<span class="number" id="num_cart"><?php echo $num_cart; ?></span>
						</div>
						</div>
					</div>
				</div>
			</div>

<script>
// Función para mostrar u ocultar el desplegable
function toggleDropdown() {
  const dropdown = document.getElementById('logout-dropdown');
  dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
}

// Función para cerrar sesión (reemplaza esto con la lógica real de cierre de sesión)
function logout() {
	window.location.href = "../Model/cerrarSesion.php";
}

// Event listener para el clic en el ícono de usuario
document.getElementById('user-icon').addEventListener('click', toggleDropdown);

// Event listener para cerrar el desplegable cuando se haga clic fuera de él
document.addEventListener('click', function(event) {
  const dropdown = document.getElementById('logout-dropdown');
  if (event.target.closest('.logout-container') === null) {
    dropdown.style.display = 'none';
  }
});

</script>
			<div class="container-navbar">
				<nav class="navbar container">
					<i class="fa-solid fa-bars"></i>
					<ul class="menu">
						<li><a href="../View/principalUsuario.php?nombreBase=<?php echo $nombreU?>&correoBase=<?php echo $correo?>">Inicio</a></li>
						<!-- <li><a href="#">Moca Helado</a></li>
						<li><a href="#">Expreso</a></li>
						<li><a href="#">Capuchino</a></li>
						<li><a href="#">Más</a></li>
						<li><a href="#">Blog</a></li> -->
					</ul>

					<form class="search-form" action="../View/ayuda.html">
						<!-- <input type="search" placeholder="Buscar..." /> -->
						<button type="submit" class="btn-search">
							<i class="fa-solid fa-circle-info"></i>
						</button>
					</form>
				</nav>
			</div>
    </header>
<CENTER>
    <main class="tablaReserva">
    <h1>CESTA DE RESERVA</h1><br>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover tablaGrande">
                <thead>
                    <tr>
                        <th scope="col">Producto</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($lista_carrito == null) {
                        echo '<tr><td colspan="5" class="text-center"><b>Lista Vacia</b></td></tr>';
                    } else {
                        $total = 0;
                        foreach ($lista_carrito as $producto) {
                            $_id = $producto['idProducto'];
                            $nombre = $producto['nombre'];
                            $precio = $producto['precio'];
                            $cantidad = $producto['cantidad'];
                            $subtotal = $cantidad * $precio;
                            $total += $subtotal;
                    ?>
                    <tr>
                        <td><?php echo $nombre; ?></td>
                        <td><?php echo MONEDA . number_format($precio, 2, '.', ','); ?></td>
                        <td><?php echo $cantidad; ?></td>
                        <td>
                            <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]"><?php echo MONEDA . number_format($subtotal, 2, '.', ','); ?></div>
                        </td>
                        <td>
                            <a href="#" class="btn btn-warning btn-sm btn-custom1" data-bs-id="<?php echo $_id; ?>" <?php $idCaptura=$_id;?> data-bs-toggle="modal" data-bs-target="#eliminaModal">Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="3"></td>
                        <td colspan="2">
                            <p class="h3" id="total"><?php echo MONEDA . number_format($total, 2, '.', ','); ?></p>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <br>

        <style>
            .btn-custom {
                width: 250px;
            }
        </style>

        <?php if ($lista_carrito != null) { ?>
        <div class="row">
            <div class="col-md-5 offset-md-7 d-grid gap-2">
                <form action="reserva.php?nombreBase=<?php echo $nombreU?>&correoBase=<?php echo $correo?>" method="post">
                    <input type="hidden" name="correo" value="<?php echo $correo; ?>">
                    <input type="hidden" name="nombreU" value="<?php echo $nombreU; ?>">
                    <button type="submit" class="btn btn-primary btn-custom" name="confirmar_reserva" onclick="return confirmar()">Confirmar Reserva</button>
                </form>
            </div>
        </div>
        <?php } ?>

    </div>
</main>
</CENTER>

 <!-- Modal -->
<div class="modal fade" id="eliminaModal" tabindex="-1" role="dialog" aria-labelledby="eliminaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminaModalLabel">Alerta</h5>
            </div>
            <div class="modal-body">
                <p>Está seguro de que desea eliminar este producto de la lista?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button id="btn-elimina" type="button" class="btn btn-danger" onclick="eliminar()">Eliminar</button>
            </div>
        </div>
    </div>
</div>


    <style>

.modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    width: 100% !important;
    height: 100% !important;
    z-index: 1040;
    background-color: rgba(0, 0, 0, 0.5);
}
    
    #eliminaModal {
        margin-top: 0px;
    }

    #eliminaModal .modal-dialog {
        max-width: 600px;
    }

    #eliminaModal .modal-content {
        border: none;
        border-radius: 10px;
    }

    #eliminaModal .modal-header {
        background-color: white;
        color: #721c24;
    }

    #eliminaModal .modal-body {
        background-color: white;
        font-size: 18px;
    }

    #eliminaModal .modal-footer {
        background-color: white;
    }

    .tablaGrande {
        width: 100%;
        max-width: 1000px;
        font-size: 20px;
    }

    .tablaGrande th,
    .tablaGrande td {
        padding: 10px;
    }

    .tablaGrande th:nth-child(2),
    .tablaGrande td:nth-child(2) {
        width: 200px;
    }

    .btn-custom1 {
        width: 100px;
        font-size: 15px; /* Tamaño de fuente del botón */
        padding: 10px 20px; /* Espacio interno del botón (vertical horizontal) */
    }

    .btn-custom {
        width: 235px;
        font-size: 15px; /* Tamaño de fuente del botón */
        padding: 10px 20px; /* Espacio interno del botón (vertical horizontal) */
    }

    .tablaReserva{
        margin-top: 100px;
    }

        </style>

        <script>
                let eliminaModal=document.getElementById('eliminaModal');
                eliminaModal.addEventListener('show.bs.modal',function(event){
                    let button=event.relatedTarget
                    let id=button.getAttribute('data-bs-id')
                    let buttonElimina = eliminaModal.querySelector('.modal-footer #btn-elimina')
                    buttonElimina.value=id
                })

                function eliminar(){
                    let botonElimina =document.getElementById('btn-elimina')
                    let id=botonElimina.value

                    let url ='../clases/eliminar_carrito.php'
                    let formData = new FormData()
                    formData.append('action','eliminar')
                    formData.append('idProducto',id)

                    fetch(url, {
                        method: 'POST',
                        body: formData,
                        mode:'cors'

                    }).then(response =>response.json())
                    .then(data => {
                        if(data.ok){
                            location.reload()
                        }
                    })
                } 

                function confirmar(){
                return confirm('Está seguro de que desea confirmar la reserva?');
                }

               
              
                //Para  sumar la cantidad  en caso de que el usuario borro su solicitud

                function validarClicBoton() {
                    var boton = document.getElementById('btn-elimina');
				   boton.addEventListener('click', function(event) {
					var idProducto = <?php echo $idCaptura;?>

                    //Para saber la cantidad

                    <?php 

                       $cantidadE=0;

                        if($lista_carrito !=null){

                            foreach($lista_carrito as $producto){

                                if($idCaptura == $producto['idProducto']){
                                    $cantidadE=$producto['cantidad'];
                                }
                            }
                        }
                    ?>
                    
                    var cantidadE=<?php echo $cantidadE; ?>

					// Realizar una solicitud Ajax para enviar el idProducto y cantidad a PHP
					var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						// En caso de que la actualizacion se ha realizo correctamente
						//alert(this.responseText);

						// Para recargar la pagina una vez hecho la actialiacion
						setTimeout(function() {
						window.location.reload();
						}, 500);
					}
					};

					xhttp.open("POST", "../clases/actualizarCantidadE.php", true);
					xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xhttp.send("idProducto=" + encodeURIComponent(idProducto) + "&cantidad=" + encodeURIComponent(cantidadE));
				});
				}
				// Llamar a la función para que se agregue el listener al botón
				validarClicBoton();

            </script>


    <script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>
</body>
</html>
