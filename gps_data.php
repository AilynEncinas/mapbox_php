<?php
// Conexión a la base de datos
$servername = "154.12.254.242"; // Cambia por la IP o nombre de tu servidor
$username = "ratiosof74bo_uv_bd_user";  // Cambia por tu nombre de usuario de la base de datos
$password = "Estudiantes@2024"; // Cambia por tu contraseña de la base de datos
$dbname = "ratiosof74bo_uv_bd"; // Cambia por el nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verifica si los datos han sido enviados vía POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    // Valida los datos (aquí puedes agregar más validaciones según sea necesario)
    if (!empty($lat) && !empty($lng) && !empty($fecha) && !empty($hora)) {

        // Consulta SQL para insertar los datos en la tabla
        $sql = "INSERT INTO gps_data (latitude, longitude, date, time)
                VALUES ('$lat', '$lng', '$fecha', '$hora')";

        if ($conn->query($sql) === TRUE) {
            echo "Datos guardados correctamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: Datos incompletos.";
    }
}

// Cierra la conexión a la base de datos
$conn->close();
?>
