<?php
session_start();
session_unset();
session_destroy();

// ruta absoluta segura — ajustá "SITIO" si tu carpeta local se llama distinto
header("Location: http://localhost/SITIO/index.php");
exit;
