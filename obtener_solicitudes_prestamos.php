<?php
// Conectar a la base de datos
$conn = new mysqli('localhost', 'root', '12345', 'gamberli_db');

if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
}

// Consulta para obtener las solicitudes de préstamo en estado pendiente
$query = "SELECT p.id, l.nombre_libro, p.fecha_prestamo, p.fecha_devolucion, p.estado
          FROM prestamos p
          JOIN libros l ON p.id_libro = l.id
          WHERE p.estado = 'pendiente'";
          
$result = $conn->query($query);

$solicitudes = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $solicitudes[] = $row;
    }
}

// Devolver los datos en formato JSON
echo json_encode($solicitudes);

$conn->close();
?>

