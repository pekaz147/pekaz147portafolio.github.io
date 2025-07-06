<?php
// Reemplaza esto con el correo al que quieras recibir los mensajes
$destinatario = "shonathan147@gmail.com";

// Verifica si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Limpia y recoge los datos del formulario
    $nombre = htmlspecialchars(trim($_POST["nombre"]));
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $mensaje = htmlspecialchars(trim($_POST["mensaje"]));

    // Asunto y cuerpo del correo
    $asunto = "Nuevo mensaje de contacto de $nombre";
    $cuerpo = "Nombre: $nombre\n";
    $cuerpo .= "Correo: $email\n";
    $cuerpo .= "Mensaje:\n$mensaje\n";

    // Cabeceras del correo
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Enviar el correo
    if (mail($destinatario, $asunto, $cuerpo, $headers)) {
        echo "Mensaje enviado correctamente.";
    } else {
        echo "Hubo un error al enviar el mensaje. Intenta de nuevo.";
    }
} else {
    echo "Acceso no autorizado.";
}
?>