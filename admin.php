<?php
session_start();

if(!isset($_SESSION['admin']) || $_SESSION['admin'] !== true){
    header("Location: ../index.php");
    exit();
}

include("../conexion.php"); // <-- CORREGIDO

$sql = "SELECT * FROM mensajes ORDER BY fecha DESC";
$resultado = mysqli_query($conexion, $sql);
?>
