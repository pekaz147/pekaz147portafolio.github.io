<?php
// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "paginapersonal");

// Verifica si hay errores en la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Recoger los datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];

// Preparar y ejecutar la consulta
$sql = "INSERT INTO solicitudes (nombre, email, mensaje) VALUES (?, ?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("sss", $nombre, $email, $mensaje);

if ($stmt->execute()) {
    echo "¡Tu mensaje fue enviado con éxito!";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar conexión
$stmt->close();
$conexion->close();
?>