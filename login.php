<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "nombre_de_usuario";
$password = "contraseña";
$dbname = "nombre_de_la_base_de_datos";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

// Consultar la base de datos
$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND clave = '$clave'";
$resultado = $conn->query($sql);

// Verificar si se encontró un usuario con los datos ingresados
if ($resultado->num_rows > 0) {
    // Iniciar sesión
    session_start();
    $_SESSION['usuario'] = $usuario;

    // Redireccionar a la página de inicio
    header("Location: index.php");
} else {
    // Si no se encontró un usuario, mostrar mensaje de error
    echo "Usuario o clave incorrectos";
}

// Cerrar la conexión a la base de datos
$conn->close
