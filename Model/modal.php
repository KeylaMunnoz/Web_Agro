<?php
// principalUsuarioDC.php
require '../Config/database.php'; 
require '../Config/config.php';

$bd = new Database();
$con = $bd->conectar();


/* Consultar información de las categorías */

$sqlC = $con->prepare("SELECT id, nombre FROM categoria"); 
$sqlC->execute(); 

$resultadoC = $sqlC->fetchAll(PDO::FETCH_ASSOC);

 
//Para consultar los productos de las categorias selecionadas

$resultadoP = array();

if (isset($_GET['id'])) {
    $categoriaId = $_GET['id'];

    // Consultar información de los productos asociados a la categoría especificada
    $sqlP = $con->prepare("SELECT idProducto, nombre, precio,imagen FROM productos WHERE categoria = :categoriaId"); 
    $sqlP->bindParam(':categoriaId', $categoriaId, PDO::PARAM_INT);
    $sqlP->execute();

    $resultadoP = $sqlP->fetchAll(PDO::FETCH_ASSOC);
}

print_r($_SESSION);


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
		<title>AgroMarket</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
		<!-- Cargar la librería de Bootstrap -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <!-- Cargar los scripts de JavaScript de Bootstrap -->
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> 

		<link rel="stylesheet" href="../css/principalUsuario.css" />
		<!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<!-- Owl Carousel CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

		<!-- Owl Carousel JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
	</head>
	<body>
		<header>
			<div class="container-hero" id="container-hero">
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
							$nombre = $_GET['nombre2'];
						} 
						
						if(isset($_GET['correo'])){
							$correo = $_GET['correo'];
						}
						
					?>
					<!--<div class="container-user">
						<label for="">Bienvenido <?php echo $nombre ?></label>
						<div class="logout-container">
							<i class="fa-solid fa-user" id="user-icon"></i>
							<div class="logout-dropdown" id="logout-dropdown">
							<button onclick="logout()">Cerrar Sesión</button>
							</div>
						</div>
						<i class="fa-solid fa-basket-shopping"></i>
						<div class="content-shopping-cart">
                            <a href="../Model/checkout.php">
								<span class="text">Carrito</span>
								<span class="number" id="num_cart"><?php echo $num_cart; ?></span>
							</a>
						</div>
					</div>-->
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
  alert('Cerrar Sesión'); // Esto es solo un mensaje de ejemplo, reemplázalo con la lógica real de cierre de sesión
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
						<li><a href="#container-hero">Inicio</a></li>
						<li><a href="#container top-categories">Categorías</a></li>
						<li><a href="#container top-products">Productos</a></li>
						<li><a href="#galeria">Galería</a></li>
						<li><a href="#container blogs">Por qué elegirnos</a></li>
						<li><a href="#footer">Contacto</a></li>
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

		<section class="banner">
			<div class="content-banner">
				<p>Productos Agrícolas</p>
				<h2>100% Orgnánicos</h2>
			</div>
		</section>

		<main class="main-content">
			<!-- <section class="container container-features">
				<div class="card-feature">
					<i class="fa-solid fa-plane-up"></i>
					<div class="feature-content">
						<span>Envío gratuito a nivel mundial</span>
						<p>En pedido superior a $150</p>
					</div>
				</div>

				<div class="card-feature">
					<i class="fa-solid fa-wallet"></i>
					<div class="feature-content">
						<span>Contrareembolso</span>
						<p>100% garantía de devolución de dinero</p>
					</div>
				</div>
				<div class="card-feature">
					<i class="fa-solid fa-gift"></i>
					<div class="feature-content">
						<span>Tarjeta regalo especial</span>
						<p>Ofrece bonos especiales con regalo</p>
					</div>
				</div>
				<div class="card-feature">
					<i class="fa-solid fa-headset"></i>
					<div class="feature-content">
						<span>Servicio al cliente 24/7</span>
						<p>LLámenos 24/7 al 123-456-7890</p>
					</div>
				</div>
			</section> -->

	   <!-- Consultar las categorias de la base de datos -->
		
			<section class="container top-categories" id="container top-categories">
				<h1 class="heading-1">Categorías</h1>
				<div class="carousel-wrapper">
					<div class="container-categories" id="category-carousel">
                        <div class="card-category category-prod">
                                <br><br><br>
                                <p>Todos los productoss</p><br>
                                <a class="ver-mas" href="../View/principalUsuario.php?nombreBase=<?php echo $nombre?>">Mostrar</a>
                         </div>

                        <!-- Mostrar las categorías obtenidas desde la base de datos -->
						<?php foreach ($resultadoC as $row) { ?>

							<div class="card-category category-prod">
								<br><br><br>
								<p><?php echo $row['nombre']; ?></p><br>
								<a class="ver-mas" href="../Model/principalUsuario2.php?id=<?php echo $row['id']; ?>&nombre2=<?php echo $nombre?>">Mostrar</a>
							</div>
						<?php } ?>
					</div>
					<button class="carousel-btn prev-btn" onclick="moveCarousel(-1)">&#10094;</button>
					<button class="carousel-btn next-btn" onclick="moveCarousel(1)">&#10095;</button>
				</div>
			</section>


	<!-- JavaScript para activar el carrusel -->
			<script>
				let carouselIndex = 0;
				const itemsPerPage = 3; 

				function showPage(index) {
					const cards = document.querySelectorAll('.card-category');
					const maxIndex = cards.length - itemsPerPage;

					carouselIndex = index > maxIndex ? maxIndex : index < 0 ? 0 : index;

					cards.forEach((card, idx) => {
						card.style.display = idx >= carouselIndex && idx < carouselIndex + itemsPerPage ? 'block' : 'none';
					});
				}

				function moveCarousel(step) {
					showPage(carouselIndex + step * itemsPerPage);
				}

				document.addEventListener('DOMContentLoaded', () => {
					showPage(carouselIndex);
				});

			</script>


			<section class="container top-products" id="container top-products">
				<h1 class="heading-1">Productos</h1>

				<!-- <div class="container-options">
					<span class="active">Destacados</span>
					<span>Más recientes</span>
					<span>Mejores Vendidos</span>
				</div> -->

	


<!-- Cargar los productos de la base de datos -->

<<section class="container-products">
  <?php foreach ($resultadoP as $row) { ?>
    <div class="card-product">
      <div class="container-img">
        <img src="<?php echo $row['imagen']; ?>" alt="Cafe Irish" />
        <div class="button-group">
          <span>
            <i class="fa-regular fa-eye"></i>
          </span>
          <span>
            <i class="fa-regular fa-heart"></i>
          </span>
          <span>
            <i class="fa-solid fa-code-compare"></i>
          </span>
        </div>
      </div>
      <div class="content-card-product">
        <div class="stars">
          <!-- <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-regular fa-star"></i> -->
        </div>
        <h3><?php echo $row['nombre']; ?></h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-<?php echo $row['idProducto']; ?>">
          Detalles del producto
        </button>
        <p class="price">$<?php echo $row['precio']; ?></p>
      </div>
    </div>
    <div class="modal fade" id="modal-<?php echo $row['idProducto']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-<?php echo $row['idProducto']; ?>-label" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modal-<?php echo $row['idProducto']; ?>-label"><?php echo $row['nombre']; ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <img src="<?php echo $row['imagen']; ?>" class="img-fluid" alt="<?php echo $row['nombre']; ?>">
            <p><?php echo $row['descripcion']; ?></p>
            <p class="price">$<?php echo $row['precio']; ?></p>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
</section>


	
			<h1 class="heading-1" id="galeria">Galería</h1>
			<section class="gallery">
				<img
					src="https://images.pexels.com/photos/2252584/pexels-photo-2252584.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
					alt="Gallery Img1"
					class="gallery-img-1"
				/><img
					src="https://images.pexels.com/photos/1719669/pexels-photo-1719669.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
					alt="Gallery Img2"
					class="gallery-img-2"
				/><img
					src="https://images.pexels.com/photos/4919718/pexels-photo-4919718.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
					alt="Gallery Img3"
					class="gallery-img-3"
				/><img
					src="https://images.pexels.com/photos/7129145/pexels-photo-7129145.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
					alt="Gallery Img4"
					class="gallery-img-4"
				/><img
					src="https://images.pexels.com/photos/5273044/pexels-photo-5273044.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
					alt="Gallery Img5"
					class="gallery-img-5"
				/>
			</section>

			<!-- <section class="container specials">
				<h1 class="heading-1">Especiales</h1>

				<div class="container-products"> -->
					<!-- Producto 1 -->
					<!-- <div class="card-product">
						<div class="container-img">
							<img src="../img/cafe-irish.jpg" alt="Cafe Irish" />
							<span class="discount">-13%</span>
							<div class="button-group">
								<span>
									<i class="fa-regular fa-eye"></i>
								</span>
								<span>
									<i class="fa-regular fa-heart"></i>
								</span>
								<span>
									<i class="fa-solid fa-code-compare"></i>
								</span>
							</div>
						</div>
						<div class="content-card-product">
							<div class="stars">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-regular fa-star"></i>
							</div>
							<h3>Cafe Irish</h3>
							<span class="add-cart">
								<i class="fa-solid fa-basket-shopping"></i>
							</span>
							<p class="price">$4.60 <span>$5.30</span></p>
						</div>
					</div> -->
					<!-- Producto 2 -->
					<!-- <div class="card-product">
						<div class="container-img">
							<img
								src="../img/cafe-ingles.jpg"
								alt="Cafe incafe-ingles.jpg"
							/>
							<span class="discount">-22%</span>
							<div class="button-group">
								<span>
									<i class="fa-regular fa-eye"></i>
								</span>
								<span>
									<i class="fa-regular fa-heart"></i>
								</span>
								<span>
									<i class="fa-solid fa-code-compare"></i>
								</span>
							</div>
						</div>
						<div class="content-card-product">
							<div class="stars">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-regular fa-star"></i>
								<i class="fa-regular fa-star"></i>
							</div>
							<h3>Cafe Inglés</h3>
							<span class="add-cart">
								<i class="fa-solid fa-basket-shopping"></i>
							</span>
							<p class="price">$5.70 <span>$7.30</span></p>
						</div>
					</div> -->
					<!--  -->
					<!-- <div class="card-product">
						<div class="container-img">
							<img src="../img/cafe-viena.jpg" alt="Cafe Viena" />
							<span class="discount">-30%</span>
							<div class="button-group">
								<span>
									<i class="fa-regular fa-eye"></i>
								</span>
								<span>
									<i class="fa-regular fa-heart"></i>
								</span>
								<span>
									<i class="fa-solid fa-code-compare"></i>
								</span>
							</div>
						</div>
						<div class="content-card-product">
							<div class="stars">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
							</div>
							<h3>Cafe Viena</h3>
							<span class="add-cart">
								<i class="fa-solid fa-basket-shopping"></i>
							</span>
							<p class="price">$3.85 <span>$5.50</span></p>
						</div>
					</div> -->
					<!--  -->
					<!-- <div class="card-product">
						<div class="container-img">
							<img src="../img/cafe-liqueurs.jpg" alt="Cafe Liqueurs" />
							<div class="button-group">
								<span>
									<i class="fa-regular fa-eye"></i>
								</span>
								<span>
									<i class="fa-regular fa-heart"></i>
								</span>
								<span>
									<i class="fa-solid fa-code-compare"></i>
								</span>
							</div>
						</div>
						<div class="content-card-product">
							<div class="stars">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-regular fa-star"></i>
							</div>
							<h3>Cafe Liqueurs</h3>
							<span class="add-cart">
								<i class="fa-solid fa-basket-shopping"></i>
							</span>
							<p class="price">$5.60</p>
						</div>
					</div>
				</div>
			</section> -->

			<section class="container blogs" id="container blogs">
				<h1 class="heading-1">Por qué elegirnos...</h1>

				<div class="container-blogs">
					<div class="card-blog">
						<div class="container-img">
							<img src="https://images.pexels.com/photos/8540921/pexels-photo-8540921.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Imagen Blog 1" />
							<!-- <div class="button-group-blog">
								<span>
									<i class="fa-solid fa-magnifying-glass"></i>
								</span>
								<span>
									<i class="fa-solid fa-link"></i>
								</span>
							</div> -->
						</div>
						<div class="content-blog">
							<h3>Calidad garantizada de productos frescos y saludables</h3>
							<p>
								Nos comprometemos a ofrecer exclusivamente productos agrícolas 
								orgánicos y naturales de la más alta calidad.
								Nuestros clientes pueden 
								estar seguros de que cada artículo que reserven será 
								fresco, delicioso y, lo más importante, beneficioso 
								para su salud y la del medio ambiente.
							</p>
							<!-- <div class="btn-read-more">Leer más</div> -->
						</div>
					</div>
					<div class="card-blog">
						<div class="container-img">
							<img src="https://images.pexels.com/photos/5842510/pexels-photo-5842510.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Imagen Blog 2" />
						</div>
						<div class="content-blog">
							<h3>Variedad y selección cuidadosa de productos</h3>
							<p>
								Contamos con una amplia gama de productos agrícolas 
								orgánicos y naturales, desde frutas y verduras hasta 
								granos y productos lácteos. Además, nuestra selección 
								de productos se realiza cuidadosamente para garantizar 
								que cumplan con nuestros rigurosos estándares de calidad 
								y sostenibilidad. Los clientes pueden disfrutar de una 
								variedad de opciones frescas y de temporada, lo que les 
								permite llevar una dieta equilibrada y nutritiva.
							</p>
						</div>
					</div>
					<div class="card-blog">
						<div class="container-img">
							<img src="https://images.pexels.com/photos/4042579/pexels-photo-4042579.png?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Imagen Blog 3" />
						</div>
						<div class="content-blog">
							<h3>Apoyo a la agricultura local y al desarrollo sostenible</h3>
							<p>
								Al elegir reservar productos a través de nuestra plataforma, 
								los clientes contribuyen directamente al apoyo de 
								agricultores locales y a la promoción de prácticas agrícolas 
								sostenibles. Trabajamos estrechamente con pequeños 
								productores y agricultores de la región, brindándoles 
								una plataforma para comercializar sus productos de manera 
								justa y sostenible.
							</p>
						</div>
					</div>
				</div>
			</section>
		</main>

		<!-- <footer class="footer">
			<div class="container container-footer">
				<div class="menu-footer">
					<div class="contact-info">
						<p class="title-footer">Información de Contacto</p>
						<ul>
							<li>
								Dirección: 71 Pennington Lane Vernon Rockville, CT
								06066
							</li>
							<li>Teléfono: 123-456-7890</li>
							<li>Fax: 55555300</li>
							<li>EmaiL: baristas@support.com</li>
						</ul>
						<div class="social-icons">
							<span class="facebook">
								<i class="fa-brands fa-facebook-f"></i>
							</span>
							<span class="twitter">
								<i class="fa-brands fa-twitter"></i>
							</span>
							<span class="youtube">
								<i class="fa-brands fa-youtube"></i>
							</span>
							<span class="pinterest">
								<i class="fa-brands fa-pinterest-p"></i>
							</span>
							<span class="instagram">
								<i class="fa-brands fa-instagram"></i>
							</span>
						</div>
					</div>

					<div class="information">
						<p class="title-footer">Información</p>
						<ul>
							<li><a href="#">Acerca de Nosotros</a></li>
							<li><a href="#">Información Delivery</a></li>
							<li><a href="#">Politicas de Privacidad</a></li>
							<li><a href="#">Términos y condiciones</a></li>
							<li><a href="#">Contactános</a></li>
						</ul>
					</div>

					<div class="my-account">
						<p class="title-footer">Mi cuenta</p>

						<ul>
							<li><a href="#">Mi cuenta</a></li>
							<li><a href="#">Historial de ordenes</a></li>
							<li><a href="#">Lista de deseos</a></li>
							<li><a href="#">Boletín</a></li>
							<li><a href="#">Reembolsos</a></li>
						</ul>
					</div>

					<div class="newsletter">
						<p class="title-footer">Boletín informativo</p>

						<div class="content">
							<p>
								Suscríbete a nuestros boletines ahora y mantente al
								día con nuevas colecciones y ofertas exclusivas.
							</p>
							<input type="email" placeholder="Ingresa el correo aquí...">
							<button>Suscríbete</button>
						</div>
					</div>
				</div>

				<div class="copyright">
					<p>
						Desarrollado por Programación para el mundo &copy; 2022
					</p>

					<img src="../img/payment.png" alt="Pagos">
				</div>
			</div>
		</footer> -->

		<footer class="footer" id="footer">
			<div class="container container-footer">
				<div class="menu-footer">
					<div class="contact-info">
						<p class="title-footer">Información de Contacto</p>
						<ul>
							<li>
								Dirección: Panamericana Sur km 1 1/2, Riobamba-Ecuador
							</li>
							<li>Teléfono: 123-456-7890</li>
							<li>Fax: 55555300</li>
							<li>EmaiL: agromarket@support.com</li>
						</ul>
						<div class="social-icons">
							<span class="facebook">
								<i class="fa-brands fa-facebook-f"></i>
							</span>
							<span class="twitter">
								<i class="fa-brands fa-twitter"></i>
							</span>
							<span class="youtube">
								<i class="fa-brands fa-youtube"></i>
							</span>
							<span class="pinterest">
								<i class="fa-brands fa-pinterest-p"></i>
							</span>
							<span class="instagram">
								<i class="fa-brands fa-instagram"></i>
							</span>
						</div>
					</div>

					<div class="information">
						<p class="title-footer">Información</p>
						<ul>
							<li><a href="#">Acerca de Nosotros</a></li>
							<li><a href="#">Politicas de Privacidad</a></li>
						</ul>
					</div>

					<div class="newsletter">
						<p class="title-footer">Para saber más</p>

						<div class="content">
							<p>
								Si desea conocer más sobre la relevancia de los productos orgánicos visite la siguiente página
							</p>
							<br>
							<a href="https://www.bmicos.com/blog/todo-lo-que-tienes-que-saber-sobre-los-alimentos-organicos/" target="_blank">
							<button>+ Información</button>
							</a>
						</div>
					</div>
				</div>

				<div class="copyright">
					<p>
						Desarrollado por CIAMA &copy; 2023
					</p>
				</div>
			</div>
		</footer>


		<div id="modal1" class="modal">
		<div class="modal-content">
			<h2>AgroMarket</h2>
			<p>
				En AgroMarket, nos apasiona promover un estilo de vida saludable y sostenible a través de la conexión directa con la naturaleza y la oferta de productos agrícolas orgánicos y naturales de la más alta calidad. 
				<br>
				<b>Nuestra Misión</b>
				<br>
				Nuestra misión es facilitar el acceso a alimentos frescos y cultivados de manera sostenible, apoyando a agricultores locales comprometidos con prácticas agrícolas respetuosas con la tierra y el ecosistema. Creemos que una alimentación saludable y equilibrada es esencial para una vida plena y vibrante, y estamos comprometidos a ofrecer opciones de productos que contribuyan al bienestar de nuestros clientes y del planeta.
				<br>
				<b>Nuestra Selección</b>
				<br>
				Trabajamos en estrecha colaboración con agricultores locales que comparten nuestros valores y estándares de calidad. Nuestra selección de productos agrícolas orgánicos y naturales es rigurosa, asegurándonos de ofrecer a nuestros clientes solo lo mejor de cada temporada. 
				<br>
				<b>Compromiso con la Sostenibilidad</b>
				<br>
				En AgroMarket, la sostenibilidad es uno de nuestros pilares fundamentales. Nos enorgullecemos de fomentar prácticas agrícolas que protejan y restauren la tierra, promoviendo la biodiversidad y minimizando el impacto ambiental.
				<br>
				<b>Nuestro Equipo</b>
				<br>
				Detrás de AgroMarket hay un equipo apasionado y comprometido que se esfuerza por brindar la mejor experiencia a nuestros clientes. Desde el equipo de selección y logística hasta nuestro servicio de atención al cliente, todos compartimos la misma visión de promover un estilo de vida saludable y sostenible a través de la conexión con los alimentos naturales y orgánicos.
				<br>
				¡Gracias por visitarnos y ser parte del cambio hacia un mundo más verde y saludable!
			</p>
			<a href="#" class="modal-close">Cerrar</a>
		</div>
		</div>

		<div id="modal2" class="modal">
		<div class="modal-content">
			<h2>Política de Privacidad de AgroMarket</h2>
			<p>
				<br>
				<b>Fecha de última actualización:</b> 22/07/2023<br><br>
				<b>1. Información que recopilamos:</b><br>
				<b>Información personal:</b> Podemos recopilar su nombre, dirección de correo electrónico, número de teléfono u otra información personal que usted nos proporcione voluntariamente cuando se registre en nuestro sitio web, realice una compra, complete un formulario o se comunique con nosotros.
				<br>
				<b>2. Uso de la información:</b><br>
					<li>Procesar y gestionar sus reservas de productos.</li>
					<li>Responder a sus consultas.</li>
				<b>3. Protección de la información:</b><br>
				<p>Mantenemos medidas de seguridad razonables para proteger la información personal que recopilamos. Sin embargo, ninguna transmisión de datos a través de internet o almacenamiento en línea puede garantizarse como 100% segura. Hacemos todo lo posible para proteger sus datos, pero no podemos garantizar la seguridad completa de la información transmitida o almacenada en nuestro sitio web.</p>

				<b>4. Compartir información:</b><br>
				<p>No vendemos, intercambiamos ni transferimos su información personal a terceros sin su consentimiento, excepto cuando sea necesario para brindar servicios o productos solicitados por usted. Podemos compartir su información con proveedores de servicios de confianza que nos ayuden en el funcionamiento de nuestro sitio web o en la prestación de servicios. Estos proveedores están obligados a mantener la confidencialidad de su información.</p>

				<b>5. Enlaces externos:</b><br>
				<p>Nuestro sitio web puede contener enlaces a sitios de terceros. No nos hacemos responsables de las prácticas de privacidad o contenido de dichos sitios. Le recomendamos leer las políticas de privacidad de estos sitios antes de proporcionar cualquier información personal.</p>

				<b>6. Cambios en la política de privacidad:</b><br>
				<p>Nos reservamos el derecho de modificar esta Política de Privacidad en cualquier momento. Cualquier cambio será efectivo al ser publicado en esta página. Le recomendamos revisar periódicamente esta política para estar informado sobre cómo protegemos su información.</p>

				<p>Si tiene alguna pregunta o inquietud sobre nuestra Política de Privacidad o sobre la información que tenemos sobre usted, no dude en contactarnos a través de agromarket@support.com</p>
			</p>
			<a href="#" class="modal-close">Cerrar</a>
		</div>
		</div>

		<div id="modal3" class="modal">
		<div class="modal-content">
			<h2>AgroMarket</h2>
			<p>
				En AgroMarket, nos apasiona promover un estilo de vida saludable y sostenible a través de la conexión directa con la naturaleza y la oferta de productos agrícolas orgánicos y naturales de la más alta calidad. 
				<br>
				<b>Nuestra Misión</b>
				<br>
				Nuestra misión es facilitar el acceso a alimentos frescos y cultivados de manera sostenible, apoyando a agricultores locales comprometidos con prácticas agrícolas respetuosas con la tierra y el ecosistema. Creemos que una alimentación saludable y equilibrada es esencial para una vida plena y vibrante, y estamos comprometidos a ofrecer opciones de productos que contribuyan al bienestar de nuestros clientes y del planeta.
				<br>
				<b>Nuestra Selección</b>
				<br>
				Trabajamos en estrecha colaboración con agricultores locales que comparten nuestros valores y estándares de calidad. Nuestra selección de productos agrícolas orgánicos y naturales es rigurosa, asegurándonos de ofrecer a nuestros clientes solo lo mejor de cada temporada. 
				<br>
				<b>Compromiso con la Sostenibilidad</b>
				<br>
				En AgroMarket, la sostenibilidad es uno de nuestros pilares fundamentales. Nos enorgullecemos de fomentar prácticas agrícolas que protejan y restauren la tierra, promoviendo la biodiversidad y minimizando el impacto ambiental.
				<br>
				<b>Nuestro Equipo</b>
				<br>
				Detrás de AgroMarket hay un equipo apasionado y comprometido que se esfuerza por brindar la mejor experiencia a nuestros clientes. Desde el equipo de selección y logística hasta nuestro servicio de atención al cliente, todos compartimos la misma visión de promover un estilo de vida saludable y sostenible a través de la conexión con los alimentos naturales y orgánicos.
				<br>
				¡Gracias por visitarnos y ser parte del cambio hacia un mundo más verde y saludable!
			</p>
			<a href="#" class="modal-close">Cerrar</a>
		</div>
		</div>



		<script
			src="https://kit.fontawesome.com/81581fb069.js"
			crossorigin="anonymous"
		></script>
	</body>
</html>
