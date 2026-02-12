<?php
session_start();
include 'db_connect.php';  // Conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $documento = $_POST['documento'];
    $password = $_POST['password'];
    $tipo_usuario = $_POST['tipo-usuario'];

    // Verificar si el usuario existe en la base de datos
    $sql = "SELECT * FROM usuarios WHERE documento='$documento' AND tipo_usuario='$tipo_usuario'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // El usuario existe, verificar la contraseña
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Contraseña correcta, iniciar sesión
            $_SESSION['usuario'] = $row['nombre'];
            $_SESSION['tipo_usuario'] = $row['tipo_usuario'];

            // Redirigir según el tipo de usuario
            if ($row['tipo_usuario'] == 'administrativo') {
                header("Location: admin_dashboard.php");  // Redirigir al dashboard de administrador
                exit();
            } else {
                header("Location: user_dashboard.php");  // Redirigir al dashboard de usuario
                exit();
            }
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "No se encontró un usuario con ese documento y tipo.";
    }

    $conn->close();  // Cerrar la conexión
}
?>
