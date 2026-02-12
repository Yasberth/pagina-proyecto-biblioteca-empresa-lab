<?php
// Conectar a la base de datos
$conn = new mysqli('localhost', 'root', '12345', 'gamberli_db');

if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
}

// Obtener los datos del POST
$idSolicitud = $_POST['id'];
$nuevoEstado = $_POST['estado'];

// Actualizar el estado del préstamo
$query = "UPDATE prestamos SET estado = ? WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('si', $nuevoEstado, $idSolicitud);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}

$conn->close();
?>
