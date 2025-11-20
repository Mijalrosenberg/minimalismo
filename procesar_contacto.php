<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (
        empty($_POST['nombre']) ||
        empty($_POST['email']) ||
        !isset($_POST['mensaje'])
    ) {
        die("Error: todos los campos son obligatorios.");
    }

    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $mensaje = trim($_POST['mensaje']);

    if ($mensaje === "") {
        die("Error: el mensaje no puede estar vacío.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Error: el correo no es válido.");
    }

    require "../conexion.php";

    $sql = "INSERT INTO contacto (nombre, email, mensaje) VALUES (?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sss", $nombre, $email, $mensaje);

    if ($stmt->execute()) {
        header("Location: contacto.php?ok=1");
        exit();
    } else {
        echo "Error al enviar el mensaje.";
    }

    $stmt->close();
    $conexion->close();
}
?>

