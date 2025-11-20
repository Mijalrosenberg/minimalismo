<?php
session_start(); // SOLO UNO, siempre primero

// Verificar si NO hay sesión
if (!isset($_SESSION['nombre'])) {
    header("Location: ../form_login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto del Minimalismo</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="icon" type="image/png" href="../imagenes/logo m.png">
</head>
<body>

<header>
    <div class="logo">
        <a href="../index.php">
            <img src="../imagenes/logo m.png" alt="Logo Minimalismo">
        </a>
    </div>

<nav>
    <ul>
        <li><a href="origen.php">Origen</a></li>
        <li><a href="artistas.php">Artistas</a></li>
        <li><a href="galeria.php">Galería</a></li>
        <li><a href="actualidad.php">Actualidad</a></li>
        <li><a href="contacto.php">Contacto</a></li>

        <!-- SOLO EL ADMIN VE ESTE -->
        <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] === true): ?>
            <li><a href="listar_mensajes.php">Mensajes</a></li>
        <?php endif; ?>

        <!-- SI NO HAY SESIÓN → mostrar LOGIN -->
        <?php if(!isset($_SESSION['nombre'])): ?>
            <li><a href="../form_login.php"><i class="fa-solid fa-user"></i></a></li>
        <?php endif; ?>

        <!-- SI HAY SESIÓN → mostrar CERRAR SESIÓN -->
        <?php if(isset($_SESSION['nombre'])): ?>
            <li><a href="../salir.php"><i class="fa-solid fa-right-from-bracket"></i></a></li>
        <?php endif; ?>
    </ul>
</nav>
</header>


    <main class="contacto-page">
        <h1 class="contacto-titulo">Contacto</h1>

        <div class="contacto-cuerpo">
            <p><b>¡No dudes en escribirnos!</b> Nos encantará recibir tus consultas, comentarios o propuestas, y te responderemos lo antes posible. Tu mensaje es importante para nosotros y puede abrir nuevas oportunidades de colaboración</p>

            <!-- Mensaje de éxito -->
            <p id="successMessage" class="success-message">¡Tu mensaje fue enviado correctamente!</p>

       <form class="contact-form" method="POST" action="procesar_contacto.php">

    <div class="form_input">
        <label for="nombre">Nombre</label>
        <input type="text" placeholder="Tu nombre" id="nombre" name="nombre" required>
    </div>

    <div class="form_input">
        <label for="email">Email</label>
        <input type="email" placeholder="tunombre@gmail.com" id="email" name="email" required>
    </div>

    <div class="form_input">
        <label for="telefono">Teléfono</label>
        <input type="tel" placeholder="11 2222-3333" id="telefono" name="telefono">
    </div>

    <div class="form_input">
        <label for="mensaje">Mensaje</label>
        <textarea rows="5" maxlength="300" placeholder="Deja tu mensaje" id="mensaje" name="mensaje" required></textarea>
    </div>

    <input type="submit" class="btn-form" value="Enviar">
</form>

            </div>
        </div>
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
    </div>

        <script>
const form = document.querySelector('.contact-form');
const successMessage = document.getElementById('successMessage');

form.addEventListener('submit', function() {
    successMessage.style.display = 'block';
    successMessage.style.opacity = 1;

    setTimeout(() => {
        successMessage.style.opacity = 0;
        setTimeout(() => {
            successMessage.style.display = 'none';
        }, 500);
    }, 4000);
});
</script>


</body>
</html>