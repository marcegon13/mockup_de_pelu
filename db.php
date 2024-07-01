<?php
$servidor = "localhost";
$usuario = "root";
$pass = "";
$bd = "clientes_ns";

// Crear conexión
$conn = new mysqli($servidor, $usuario, $pass, $bd);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

