<?php
// Conectar a la base de datos
$host = 'localhost';
$db = 'gamberli_db';
$user = 'root';
$pass = '12345';

$conexion = new mysqli($host, $user, $pass, $db);

// Verificar la conexión
if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

// Consultar los usuarios
$query = "SELECT nombre, apellido, tipo_documento, documento, fecha_registro, tipo_usuario FROM usuarios";
$resultado = $conexion->query($query);

$usuarios = array();

if ($resultado->num_rows > 0) {
    // Obtener todos los usuarios
    while ($fila = $resultado->fetch_assoc()) {
        $usuarios[] = $fila;
    }
}

// Devolver los datos en formato JSON
echo json_encode($usuarios);

// Cerrar la conexión
$conexion->close();
?>
