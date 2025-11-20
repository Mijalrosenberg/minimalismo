<?php
session_start();

// Redirigir si NO ES admin
if(!isset($_SESSION['admin']) || $_SESSION['admin'] !== true){
    header("Location: ../index.php");
    exit();
}

include '../conexion.php';

// Cambiamos la tabla de 'mensajes' a 'contacto'
$consulta = "SELECT * FROM contacto ORDER BY id DESC"; 
$resultado = mysqli_query($conexion, $consulta);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mensajes enviados</title>
    <link rel="stylesheet" href="../css/style.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            background: #fff;
            font-family: sans-serif;
            margin: 0;
            padding: 0;
        }

        header, footer {
            background: #444;
            color: #fff;
            padding: 15px 0;
            text-align: center;
        }

        .contenedor {
            width: 90%;
            max-width: 1000px;
            margin: 50px auto;
        }

        h1 {
            text-align: center;
            color: #000;
            margin-bottom: 30px;
        }

        .tabla-mensajes {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        .tabla-mensajes th {
            background: #444;
            color: #fff;
            padding: 15px;
            text-align: left;
            font-size: 16px;
        }

        .tabla-mensajes td {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        tr:hover {
            background: #fce4f2;
        }

        .volver {
            display: inline-block;
            margin-top: 25px;
            padding: 10px 20px;
            background: #444;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            transition: 0.2s;
        }

        .volver:hover {
            background: #444;
        }

    </style>
</head>
<body>

<header>
    <h2>Panel de administración</h2>
</header>

<div class="contenedor">
    <h1>Mensajes enviados</h1>

    <table class="tabla-mensajes">
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Mensaje</th>
            <th>Fecha</th>
        </tr>

        <?php while($fila = mysqli_fetch_assoc($resultado)): ?>
        <tr>
            <td><?php echo htmlspecialchars($fila['nombre']); ?></td>
            <td><?php echo htmlspecialchars($fila['email']); ?></td>
            <td><?php echo nl2br(htmlspecialchars($fila['mensaje'])); ?></td>
            <td><?php echo isset($fila['fecha']) ? $fila['fecha'] : '-'; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <a class="volver" href="../index.php">Volver al inicio</a>
</div>

<footer>
    &copy; 2025 Minimalismo. Todos los derechos reservados.
</footer>

</body>
</html>