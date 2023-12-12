<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos (puedes cambiar estos datos según tu configuración)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "cookie";

    $conn = new mysqli($servername, $username, $password, $database);

    // Verifica la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Recibe los datos del formulario de registro
    $username = $_POST["username"];


    // Encrypt
    $password = $_POST["password"];
    
    // Decrypt
    
    
 // Se guarda la contraseña hasheada

    // Inserta los datos en la base de datos
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso. <a href='index.php'>Inicia Sesión</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>