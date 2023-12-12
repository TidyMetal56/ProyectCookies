<?php
session_start();
$claveSecreta = 'Admin243';


// Verifica si la sesión está activa
if (!isset($_SESSION["username"]) && !isset($_COOKIE["miCookie"])) {
    header("Location: index.php");
    exit();
}
$cookieData =($_COOKIE['miCookie']);
// Extraer el IV y los datos cifrados
$iv = openssl_random_pseudo_bytes(16); 
$datosDescifrados = openssl_decrypt($_COOKIE['miCookie'], 'AES-256-CBC', $claveSecreta, 0, $iv);
if (!isset($_SESSION["username"]) && isset($_COOKIE["miCookie"])) {
    $_SESSION["username"] = $datosDescifrados;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="container">
        <h2>Bienvenido, <?php echo  $_SESSION["username"]; ?>!</h2>
        <p>Esta es tu página de inicio después de iniciar sesión.</p>
        <a href="cerrarsesion.php">Cerrar Sesión</a>
    </div>

</body>
</html>
