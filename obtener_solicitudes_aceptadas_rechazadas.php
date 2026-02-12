<?php
// Conectar a la base de datos
$host = 'localhost';
$db = 'gamberli_db';
$user = 'root';
$pass = '12345'; // Cambia esta contraseña si es necesario

$conexion = new mysqli($host, $user, $pass, $db);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consultar solicitudes aceptadas
$aceptadasQuery = "
    SELECT libros.nombre_libro, prestamos.fecha_prestamo, prestamos.fecha_devolucion, prestamos.estado
    FROM prestamos
    INNER JOIN libros ON prestamos.id_libro = libros.id
    WHERE prestamos.estado = 'aceptado'
";
$resultadoAceptadas = $conexion->query($aceptadasQuery);

if (!$resultadoAceptadas) {
    die("Error en la consulta de solicitudes aceptadas: " . $conexion->error);
}

$aceptadas = [];
if ($resultadoAceptadas->num_rows > 0) {
    while ($fila = $resultadoAceptadas->fetch_assoc()) {
        $aceptadas[] = $fila;
    }
}

// Consultar solicitudes rechazadas
$rechazadasQuery = "
    SELECT libros.nombre_libro, prestamos.fecha_prestamo, prestamos.fecha_devolucion, prestamos.estado
    FROM prestamos
    INNER JOIN libros ON prestamos.id_libro = libros.id
    WHERE prestamos.estado = 'rechazado'
";
$resultadoRechazadas = $conexion->query($rechazadasQuery);

if (!$resultadoRechazadas) {
    die("Error en la consulta de solicitudes rechazadas: " . $conexion->error);
}

$rechazadas = [];
if ($resultadoRechazadas->num_rows > 0) {
    while ($fila = $resultadoRechazadas->fetch_assoc()) {
        $rechazadas[] = $fila;
    }
}

// Devolver resultados en formato JSON
echo json_encode(['aceptadas' => $aceptadas, 'rechazadas' => $rechazadas]);

// Cerrar la conexión
$conexion->close();
?>
