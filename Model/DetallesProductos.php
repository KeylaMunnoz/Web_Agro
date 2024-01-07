
<?php
require '../Config/config.php';
require '../Config/database.php';

$bd = new Database();
$con = $bd->conectar();

/* Creacion de token */

$id = isset($_GET['idProducto']) ? $_GET['idProducto'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : ''; 

if ($id == '' || $token == '') {
    echo 'Error al procesar la petición 1';
    exit;
} else {
    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN); 
    if ($token == $token_tmp) {

        /* Consultar información de los productos */

        $sqlP = $con->prepare("SELECT count(idProducto) FROM productos WHERE idProducto=?");
        $sqlP->execute([$id]);
        if ($sqlP->fetchColumn() > 0) {

            $sqlP = $con->prepare("SELECT nombre, precio, cantidad,imagen ,descripcion FROM productos WHERE idProducto=?");
            $sqlP->execute([$id]);
            $row = $sqlP->fetch(PDO::FETCH_ASSOC);
            $nombre = $row['nombre'];
			$cantidad=$row['cantidad'];
			$imagen=$row['imagen'];
            $descripcion = $row['descripcion'];
            $precio = $row['precio'];

        } else {
            echo 'Producto no encontrado 2';
        }
    } else {
        echo 'Error al procesar la petición 3';
        exit;
    }
}
//print_r($_SESSION);

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0"
		/>
		<title>Reservas</title>
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

					<div class="container-logo">
						<i class="fa-solid fa-wheat-awn"></i>
						<h1 class="logo">AgroMarket</h1>
					</div>

					<?php
						if(isset($_GET['nombre2'])){
							$nombreUsuario = $_GET['nombre2'];
						} 
						
						if(isset($_GET['correo2'])){
							$correo = $_GET['correo2'];
						}
						
					?>

					<div class="container-user">
					<label for="">Bienvenido <?php echo $nombreUsuario; ?></label>
						<div class="logout-container">
							<i class="fa-solid fa-user" id="user-icon"></i>
							<div class="logout-dropdown" id="logout-dropdown">
							<button onclick="logout()">Cerrar Sesión</button>
							</div>
						</div>
						<i class="fa-solid fa-basket-shopping"></i>
						<div class="content-shopping-cart">
						<div class="content-shopping-cart">
							<a href="../Model/checkout.php?&nombre2=<?php echo $nombreUsuario?>&correo2=<?php echo $correo?>">
								<span class="text">Carrito</span>
								<span class="number" id="num_cart"><?php echo $num_cart; ?></span>
							</a>
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
						<li><a href="../View/principalUsuario.php?&nombreBase=<?php echo $nombreUsuario?>&correoBase=<?php echo $correo?>">Inicio</a></li>
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

       

		 <!--Contenido-->

		 <main> 
          
          <div class="container">

              <div class="row">
					<div class="col-md-6 order-md-1" id="DDPP">
						<img class="imagenDetalle"  src="<?php echo $imagen; ?>" style="width: 700px; margin-top:100px">
				    </div>
                
				<style>
#DDPP{
	margin-right: 0px;
}
#DDPP img{
	margin-left: -50px;
}
					#informacion h2{
						font-size:50px;
					}

					h2.disponible {
					font-size: 24px;
					}  
					#informacion p{
						font-size:50px;
					}
					#informacion{
						margin-top:100px;
					}
					#reservarBtn, #reservarOtro{
						padding:20px;
						font-size:17px;
						 
					}
					#botonesC #reservarBtn{
						margin-left:-50px;
					}
					#informacion #agotado{
						font-size:18px;
					}
					.form-control{
						height:40px;
						width: 300px;
						font-size:16px;
					}
					#seleccionCant{
						font-size:16px;
					}
				 

				</style>

                <div id="informacion" class="col-md-6 order-md-2">

                   <h2><?php echo $nombre; ?></h2>
                   <h2><?php echo MONEDA . number_format($precio, 2, '.', ','); ?></h2>
                   <p class="lead">
                       <?php echo $descripcion; ?> <br>
					   <h2 style="font-size: 24px;">Disponible: <?php echo $cantidad; ?></h2>
                   </p>
                   
				   <div class="col-3 my-3">
						<?php if ($cantidad > 0): ?>
						<label id="seleccionCant">Seleccione la cantidad:</label>	
							<input class="form-control" id="cantidad" name="cantidad" type="number" min="1" max="<?php echo $cantidad; ?>" value="1" required onkeydown="validarNumero(event)">
						<?php else: ?>
						<p id="agotado">Producto agotado.</p>
						<?php endif; ?>
					</div>
					<br>
                    <div id="botonesC" class="g-grid gap-3 col-10 mx-auto">
					<button class="btn btn-outline-primary" type="button" id="reservarBtn" onclick="addProducto(<?php echo $id; ?>,cantidad.value,'<?php echo $token_tmp; ?>')">Reservar Producto</button>
                    <button class="btn btn-outline-primary" type="button" id="reservarOtro" onclick="window.location.href='../View/principalUsuario.php?nombreBase=<?php echo $nombreUsuario?>&correoBase=<?php echo $correo?>' ">Reservar otro producto</button>

                    </div>
                
                </div>

              </div>

          </div>
        </main>
			
		<script>

			//Generacion de token para agregar en el carrito

			function addProducto(idProducto,cantidad,token) {
				let url = '../clases/carrito.php';
				let formData = new FormData();
				formData.append('idProducto', idProducto);
				formData.append('cantidad', cantidad);
				formData.append('token', token);

				fetch(url, {
					method: 'POST',
					body: formData,
					mode: 'cors'
				}).then(response => response.json())
					.then(data => {
						console.log(data); // Agrega esta línea para depurar
						if (data.ok) {
							let elemento = document.getElementById("num_cart");
							elemento.innerHTML = data.numero; 
						}
					});
			} 

           //Validar el campo de cantidades del producto

			function validarNumero(event) {
				const input = event.target;
				if (event.key === "Enter") {
					event.preventDefault();
					try {
						let fieldValue = parseInt(input.value);

						if (isNaN(fieldValue)) {
							throw new Error("Ingreso no válido. Por favor, ingrese una cantidad.");
						}

						if (fieldValue <= 0 ) {
							throw new Error("Ingreso no válido. Por favor, ingrese una cantidad mayor a 0.");
						}

						if (fieldValue > <?php echo $cantidad; ?>) {
							throw new Error("Ingreso no válido. Por favor, ingrese una cantidad válida dentro del rango en stock.");
						}

						if (Object.is(fieldValue, -0)) {
							throw new Error("Ingreso no válido.");
						}

						if (input.value.includes(".")) {
							throw new Error("Ingreso no válido. Por favor debe ingresar cantidades enteras.");
						}
					} catch (error) {
						alert(error.message);
						input.value = "";
						input.focus();
					}
				}
			} 


			function validarClicBoton() {
				var boton = document.getElementById('reservarBtn');

				boton.addEventListener('click', function(event) {
					var idProducto = <?php echo $id; ?>;
					var cantidadS = document.getElementById('cantidad').value;

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

					xhttp.open("POST", "../clases/actualizarCantidadS.php", true);
					xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xhttp.send("idProducto=" + encodeURIComponent(idProducto) + "&cantidad=" + encodeURIComponent(cantidadS));
				});
				}
				// Llamar a la función para que se agregue el listener al botón
				validarClicBoton();

		</script>
        
		<style>
            
			
            .imagenDetalle{
				width:100%;
				 
			}

			.col-md-6 .order-md-1{
				 margin-right: 100px;
			}



		</style>


		<script
			src="https://kit.fontawesome.com/81581fb069.js"
			crossorigin="anonymous"
		></script>
	</body>
</html>