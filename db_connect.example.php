<?php
// Ejemplo de configuración (NO subir credenciales reales a GitHub)

$DB_HOST = "localhost";
$DB_USER = "tu_usuario";
$DB_PASS = "tu_contraseña";
$DB_NAME = "tu_base_de_datos";

$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
