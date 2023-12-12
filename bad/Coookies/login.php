<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos (ajusta estos datos según tu configuración)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "cookie";

    $conn = new mysqli($servername, $username, $password, $database);

    // Verifica la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Recibe los datos del formulario de inicio de sesión
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Busca el usuario en la base de datos
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Verifica la contraseña
        if ($password== $row["password"]) {
            $_SESSION["username"] = $username;

            // Establece una cookie para recordar la sesión durante 30 días (ajusta según tus necesidades)
            setcookie("username", $username, time() + (30 * 24 * 60 * 60), "/");

            header("Location: dashboard.php"); // Redirige a la página después de iniciar sesión
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "Usuario no encontrado";
    }

    $conn->close();
}
?>
