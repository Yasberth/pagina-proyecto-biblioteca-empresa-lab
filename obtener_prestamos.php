<?php
// Conectar a la base de datos
$conn = new mysqli('localhost', 'root', '12345', 'gamberli_db');

if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
}

// Consulta para obtener todos los préstamos y su información
$query = "SELECT p.id, l.nombre_libro, p.fecha_prestamo, p.fecha_devolucion, p.estado
          FROM prestamos p
          JOIN libros l ON p.id_libro = l.id";
          
$result = $conn->query($query);

$prestamos = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $prestamos[] = $row;
    }
}

// Devolver los datos en formato JSON
echo json_encode($prestamos);

$conn->close();
?>
