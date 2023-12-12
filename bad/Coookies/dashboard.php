<?php
session_start();

// Verifica si la sesión está activa
if (!isset($_SESSION["username"]) && !isset($_COOKIE["username"])) {
    header("Location: index.php");
    exit();
}

// Si hay una cookie pero no hay una sesión, crea la sesión
if (!isset($_SESSION["username"]) && isset($_COOKIE["username"])) {
    $_SESSION["username"] = $_COOKIE["username"];
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
        <h2>Bienvenido, <?php echo $_SESSION["username"]; ?>!</h2>
        <p>Esta es tu página de inicio después de iniciar sesión.</p>
        <a href="cerrar_sesion.php">Cerrar Sesión</a>
    </div>

</body>
</html>
