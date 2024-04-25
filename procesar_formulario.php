<?php
// Incluir el archivo de la base de datos
include 'database.php';

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Determinar qué formulario se envió
    $form_type = $_POST['form_type'];

    // Si es un formulario de registro
    if ($form_type === 'register') {
        $nombre = htmlspecialchars($_POST['nombre']);
        $email = htmlspecialchars($_POST['email']);
        $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT); // Encriptar la contraseña

        // Insertar los datos en la base de datos
        $sql = "INSERT INTO usuarios (nombre, email, contraseña) VALUES ('$nombre', '$email', '$contraseña')";
        if ($conn->query($sql) === TRUE) {
            echo "Registro exitoso.";
        } else {
            echo "Error en el registro: " . $conn->error;
        }
    }

    // Si es un formulario de inicio de sesión
    elseif ($form_type === 'login') {
        $usuario = htmlspecialchars($_POST['usuario']);
        $contraseña = $_POST['contraseña'];

        // Verificar los datos en la base de datos
        $sql = "SELECT * FROM usuarios WHERE nombre = '$usuario'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Obtener los datos del usuario
            $user = $result->fetch_assoc();
            
            // Verificar la contraseña
            if (password_verify($contraseña, $user['contraseña'])) {
                // Inicio de sesión exitoso
                echo "Inicio de sesión exitoso. ¡Bienvenido, " . $user['nombre'] . "!";

                // Redirigir a la página principal
                header("Location: index.html");
                exit();
            } else {
                echo "Contraseña incorrecta.";
            }
        } else {
            echo "No se encontró una cuenta con ese usuario.";
        }
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
