<?php
// Conectar a la base de datos
$conn = new mysqli('localhost', 'root', '12345', 'gamberli_db');

if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
}

// Obtener los datos del formulario
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];
$libro = $_POST['libro'];

// Supongamos que $idUsuario es una variable obtenida por sesión (deberías implementarlo según tu flujo)
$idUsuario = 1; // Reemplazar por el ID del usuario real

// Obtener el ID del libro
$queryLibro = "SELECT id FROM libros WHERE nombre_libro = ?";
$stmtLibro = $conn->prepare($queryLibro);
$stmtLibro->bind_param('s', $libro);
$stmtLibro->execute();
$resultLibro = $stmtLibro->get_result();

if ($resultLibro->num_rows > 0) {
    $rowLibro = $resultLibro->fetch_assoc();
    $idLibro = $rowLibro['id'];
    
    // Insertar el préstamo en la base de datos
    $query = "INSERT INTO prestamos (id_usuario, id_libro, fecha_prestamo, fecha_devolucion, estado) VALUES (?, ?, ?, ?, 'pendiente')";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('iiss', $idUsuario, $idLibro, $fecha_inicio, $fecha_fin);
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['error' => 'Error al registrar el préstamo.']);
    }
} else {
    echo json_encode(['error' => 'Libro no encontrado.']);
}

$conn->close();
?>
