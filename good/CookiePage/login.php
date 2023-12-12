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
        $claveSecreta = 'Admin243';

        // Busca el usuario en la base de datos
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {

            $row = $result->fetch_assoc();
            $_SESSION["username"] = $username;

            // Establece una cookie para recordar la sesión durante 30 días (ajusta según tus necesidades)
            // Verifica la 
            if ($password == $row["password"]) {
                $iv = openssl_random_pseudo_bytes(16); 
                $datosCifrados = openssl_encrypt($username, 'AES-256-CBC', $claveSecreta,0,$iv);
                setcookie('miCookie', $datosCifrados, time() + 3600, '/');
               
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
