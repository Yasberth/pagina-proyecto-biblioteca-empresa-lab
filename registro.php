<?php
include 'db_connect.php';  // Conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $tipo_usuario = $_POST['tipo-usuario'];
    $tipo_documento = $_POST['tipo-documento'];
    $documento = $_POST['documento'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);  // Encriptar la contraseña

    // Verificar si el documento ya está registrado
    $sql_check = "SELECT * FROM usuarios WHERE documento='$documento'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        echo "El documento ya está registrado. Por favor, intenta con otro.";
    } else {
        // Insertar usuario en la base de datos
        $sql = "INSERT INTO usuarios (nombre, apellido, tipo_usuario, tipo_documento, documento, password)
                VALUES ('$nombre', '$apellido', '$tipo_usuario', '$tipo_documento', '$documento', '$password')";

        if ($conn->query($sql) === TRUE) {
            // Mostrar alerta de usuario creado y redirigir
            echo "<script>
                    alert('Usuario creado exitosamente');
                    window.location.href='index.php';
                  </script>";
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();  // Cerrar la conexión
}
?>
