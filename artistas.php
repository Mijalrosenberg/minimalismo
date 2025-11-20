<?php
session_start(); // SOLO UNO, siempre primero
include "../conexion.php";
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
    <title>Artistas</title>
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

<main class="artistas-page">

    <section class="intro">
        <h1>Artistas</h1>
    </section>

    <section class="buscador">
        <h2>Buscador de Artistas</h2>

        <form method="GET" action="">
            <input 
                type="text" 
                name="buscar" 
                placeholder="Buscar artista..." 
                value="<?php echo isset($_GET['buscar']) ? htmlspecialchars($_GET['buscar']) : ''; ?>"
            >
            <button type="submit">Buscar</button>
            <a class="btn-reset" href="artistas.php">Mostrar todos</a>
        </form>
    </section>

    <section class="resultados">

    <?php

    if (isset($_GET['buscar']) && $_GET['buscar'] !== "") {

        $busqueda = mysqli_real_escape_string($conexion, $_GET['buscar']);

        $consulta = "SELECT * FROM artistas WHERE nombre LIKE '$busqueda%'";
        $resultado = mysqli_query($conexion, $consulta);

        echo "<h3>Resultados para: '$busqueda'</h3>";

        if (mysqli_num_rows($resultado) > 0) {

            while ($fila = mysqli_fetch_assoc($resultado)) {

                echo "
                <div class='artista'>

                    <div class='artista-nombre'>
                        <h3>{$fila['nombre']} 
                            <span class='artista-fechas'>({$fila['anio']})</span>
                        </h3>
                    </div>

                    <div class='artista-foto'>
                        <img src='../imagenes/{$fila['imagen']}' alt='{$fila['nombre']}'>
                    </div>

                    <div class='artista-descripcion'>
                        <p>{$fila['biografia']}</p>
                    </div>

                </div>";
            }

        } else {
            echo "<p>No se encontraron artistas con ese nombre.</p>";
        }

    } else {

        $consulta = "SELECT * FROM artistas ORDER BY nombre ASC";
        $resultado = mysqli_query($conexion, $consulta);

        echo "<h3>Todos los artistas</h3>";

        while ($fila = mysqli_fetch_assoc($resultado)) {

            echo "
            <div class='artista'>

                <div class='artista-nombre'>
                    <h3>{$fila['nombre']} 
                        <span class='artista-fechas'>({$fila['anio']})</span>
                    </h3>
                </div>

                <div class='artista-foto'>
                    <img src='../imagenes/{$fila['imagen']}' alt='{$fila['nombre']}'>
                </div>

                <div class='artista-descripcion'>
                    <p>{$fila['biografia']}</p>
                </div>

            </div>";
        }
    }
    ?>

    </section>
</main>

<footer>
    <div class="footer-col">
        <h3>Redes Sociales</h3>
        <ul>
            <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
            <li><a href="#"><i class="fab fa-facebook-f"></i> Facebook</a></li>
            <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
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

</body>
</html>
