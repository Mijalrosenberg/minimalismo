<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>

    <!-- ⬇️ LINK A TU CSS DEL SITIO -->
    <link rel="stylesheet" href="css/style.css">


</head>

<body class="register-page">

    <div class="register-box">

        <h2>Crear Cuenta</h2>

        <form action="registro.php" method="POST">

            <label>Nombre:</label>
            <input type="text" name="nombre" required>

            <label>Correo:</label>
            <input type="email" name="correo" required>

            <label>Contraseña:</label>
            <input type="password" name="contrasena" required>

            <button type="submit">Registrarme</button>
        </form>

        <p>¿Ya tenés cuenta?
            <a href="form_login.php">Iniciar Sesión</a>
        </p>

    </div>

</body>

</html>
