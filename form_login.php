<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>

    <!-- ⬇️ LINK A TU CSS DEL SITIO -->
    <link rel="stylesheet" href="/SITIO/css/style.css">

</head>

<body class="login-page">

    <div class="login-box">
        <h2>Iniciar Sesión</h2>

        <form action="login.php" method="POST">
            <label>Correo:</label>
            <input type="email" name="correo" required>

            <label>Contraseña:</label>
            <input type="password" name="contrasena" required>

            <button type="submit">Ingresar</button>
        </form>

        <p>¿No tienes cuenta?
            <a href="form_registro.php">Regístrate</a>
        </p>
    </div>

</body>



</html>
