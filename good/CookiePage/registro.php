<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="container">
        <h2>Registro</h2>
        <form action="registro_proceso.php" method="post">
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Registrarse</button>
        </form>

        <p>¿Ya tienes una cuenta? <a href="index.php">Inicia Sesión</a></p>
    </div>

</body>
</html>