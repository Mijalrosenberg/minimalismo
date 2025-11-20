<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minimalismo</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="icon" type="image/png" href="imagenes/logo m.png">
</head>
<body>

<header>
    <div class="logo">
        <a href="index.php">
            <img src="imagenes/logo m.png" alt="Logo Minimalismo">
        </a>
    </div>

<nav>
    <ul>
        <li><a href="paginas/origen.php">Origen</a></li>
        <li><a href="paginas/artistas.php">Artistas</a></li>
        <li><a href="paginas/galeria.php">Galería</a></li>
        <li><a href="paginas/actualidad.php">Actualidad</a></li>
        <li><a href="paginas/contacto.php">Contacto</a></li>

        <!-- SOLO EL ADMIN VE ESTE -->
        <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] === true): ?>
            <li><a href="paginas/listar_mensajes.php">Mensajes</a></li>
        <?php endif; ?>

        <!-- SI NO HAY SESIÓN → mostrar LOGIN -->
        <?php if(!isset($_SESSION['nombre'])): ?>
            <li><a href="form_login.php"><i class="fa-solid fa-user"></i></a></li>
        <?php endif; ?>

        <!-- SI HAY SESIÓN → mostrar CERRAR SESIÓN -->
        <?php if(isset($_SESSION['nombre'])): ?>
            <li><a href="salir.php"><i class="fa-solid fa-right-from-bracket"></i></a></li>
        <?php endif; ?>
    </ul>
</nav>


</header>


  </header>
    <main>
    <h1>Minimalismo</h1>
    <h2>"Menos es más"</h2>
       <!-- Carrusel de imágenes -->
<section class="carrusel">
  <div class="slides">
    <a href="paginas/origen.php" class="slide">
      <img src="imagenes/origen.jpg" alt="Origen del minimalismo">
      <span>Origen</span>
    </a>
    <a href="paginas/artistas.php" class="slide">
      <img src="imagenes/artistas.jpg" alt="Artistas del minimalismo">
      <span>Artistas</span>
    </a>
    <a href="paginas/galeria.php" class="slide">
      <img src="imagenes/galeria.jpg" alt="Galería de minimalismo">
      <span>Galería</span>
    </a>
    <a href="paginas/actualidad.php" class="slide">
      <img src="imagenes/actualidad.jpg" alt="Actualidad del minimalismo">
      <span>Actualidad</span>
    </a>
    <a href="paginas/contacto.php" class="slide">
      <img src="imagenes/contacto.jpg" alt="Contacto">
      <span>Contacto</span>
    </a>
  </div>
  <!-- Controles del carrusel -->
  <button class="prev">&#10094;</button>
  <button class="next">&#10095;</button>
</section>

      <section class="info">
      <h3>¿Qué es el minimalismo?</h3>
    <p>
      El minimalismo es una corriente artística nacida en los años sesenta que busca reducir las formas a lo esencial. 
      Su fuerza está en la simplicidad, la repetición y el uso del espacio vacío como protagonista. 
      Presente en el arte, la arquitectura y el diseño, su principio es simple: <em>menos es más</em>
    </p>
  </main>
  <footer>
    <div class="footer-col">
      <h3>Redes Sociales</h3>
      <ul>
        <li><a href="#"><i class="fab fa-instagram"></i>Instagram</a></li>
        <li><a href="#"><i class="fab fa-facebook-f"></i> Facebook</a></li>
        <li><a href="#"><i class="fab fa-twitter"></i>Twitter</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h3>Contacto</h3>
      <ul>
        <li>Tel: +54 11 6119-3764</li>
        <li>Email: info@sitioweb.com</li>
      </ul>
    </div>
    <div class="footer-col">
      <h3>Dirección</h3>
      <p>11 de Septiembre de 1888 2876<br>CABA, Buenos Aires</p>
    </div>
  </footer>
       <div class="copyright">
      <p>&copy; 2025 Minimalismo. Todos los derechos reservados. Sitio diseñado por Mijal Rosenberg.</p>
      </a>
    </div>

      <script>
    const slides = document.querySelector('.slides');
    const images = document.querySelectorAll('.slides img');
    const prevBtn = document.querySelector('.prev');
    const nextBtn = document.querySelector('.next');

    let index = 0;

    function showSlide(i) {
      index = (i + images.length) % images.length; // loop infinito
      slides.style.transform = `translateX(${-index * 100}%)`;
    }

    nextBtn.addEventListener('click', () => showSlide(index + 1));
    prevBtn.addEventListener('click', () => showSlide(index - 1));
  </script>
</body>
</html>