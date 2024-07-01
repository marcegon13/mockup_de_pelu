<?php
session_start();
if (!isset($_SESSION['nombre'])) {
    // Si no hay sesión iniciada, redirigir a login.html
    header("Location: login.html");
    exit();
}

include 'db.php';

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$dni = $_POST['dni'];
$trabajo_realizado = $_POST['trabajo_realizado'];
$fecha = $_POST['fecha'];
$estilista = $_POST['estilista'];
$instagram = $_POST['instagram'];

// Depurar: verificar si los datos se reciben correctamente
var_dump($_POST);

// Preparar la consulta SQL para insertar los datos
$sql = "INSERT INTO crud (nombre, telefono, dni, trabajo_realizado, fecha, estilista, instagram) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $nombre, $telefono, $dni, $trabajo_realizado, $fecha, $estilista, $instagram);

// Ejecutar la consulta y verificar si fue exitosa
if ($stmt->execute()) {
    // Redirigir a la página de CRUD después de guardar
    header("Location: crud.php");
    exit();
} else {
    // Mostrar mensaje de error si la inserción falla
    echo "Error al guardar los datos: " . $stmt->error;
}

$stmt->close();
$conn->close();

