<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $clave = $_POST['clave'];

    // Preparar y ejecutar la consulta
    $stmt = $conn->prepare("SELECT * FROM login WHERE nombre = ? AND clave = ?");
    $stmt->bind_param("ss", $nombre, $clave);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si se encontró un usuario con las credenciales proporcionadas
    if ($result->num_rows > 0) {
        $_SESSION['nombre'] = $nombre;
        header("Location: crud.php");
        exit();
    } else {
        echo "Nombre de usuario o clave incorrectos.";
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
}

