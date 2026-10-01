<?php
    session_start(); // Iniciar sesión para usar $_SESSION

    // Generar un token Anti-CSRF seguro de 64 caracteres si no existe en la sesión
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    
    $respuesta = "";
    $color_respuesta = "black"; // Color por defecto de la respuesta del formulario

    // Expresión regular que define el patrón que debe seguir un correo
    $patron_correo = "/^[a-zA-Z0-9._+%-]+@[a-zA-Z\.-]+\.[a-zA-Z]{2,3}$/";

    // Expresión regular que valida si la edad ingresada es correcta
    $patron_edad = "/^[1-9][0-9]?$/";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Verificación estricta del token Anti-CSRF
        if (!isset($_POST["csrf_token"]) || !hash_equals($_SESSION["csrf_token"], $_POST["csrf_token"])) {
            $respuesta = "Petición no autorizada";
            $color_respuesta = "red";
        }
        else{
            // Campos recibidos del formulario en HTML con sanitización previa
            $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : ""; // Nombre
            $edad = isset($_POST["edad"]) ? trim($_POST["edad"]) : ""; // Edad
            $correo = isset($_POST["correo"]) ? trim($_POST["correo"]) : ""; // Correo

            // Validación de los datos obtenidos del formulario

            // No se ingresó el nombre
            if(empty($nombre)){
                $respuesta = "Ingrese el nombre del estudiante";
                $color_respuesta = "red";
            }

            elseif(empty($edad)){ // No se ingresó la edad
                $respuesta = "Ingrese la edad del estudiante";
                $color_respuesta = "red";
            }

            elseif(!preg_match($patron_edad, $edad) or !((int)$edad > 0 and (int)$edad <= 99) ){ // La edad no es un entero positivo
                $respuesta = "Ingrese la edad correctamente";
                $color_respuesta = "red";
            }

            elseif(empty($correo)){ // No se ingresó el correo electrónico
                $respuesta = "Ingrese el correo electrónico";
                $color_respuesta = "red";
            }
            
            elseif(!preg_match($patron_correo, $correo)){ // No se ingresó un correo válido
                $respuesta = "Correo electrónico inválido";
                $color_respuesta = "red";
            }

            else{ // Todos los datos cumplen con los requisitos
                $respuesta = "Estudiante registrado con éxito"; // Para un caso real, la respuesta de éxito y la asignación
                $color_respuesta = "green";                     // al color verde deben ir al final del bloque try

                // Conexión con la base de datos usando PDO
                try{
                    $pdo = new PDO("mysql:host=localhost;port=3307;dbname=estudiantes", "root", "");

                    // Sentencia preparada
                    $sql = "INSERT INTO estudiantes(nombre, edad, correo) VALUES(?, ?, ?)";

                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$nombre, $edad, $correo]);

                }catch(PDOException $e){ // La excepción arrojada se debe a que no existe una base de datos levantada
                    // $respuesta = "Error interno de la base datos";
                    // $color_respuesta = "red"
                } 
                
            }
        }
    }    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reto 2</title>
</head>
<body>
    <form action="index.php" method="post">
        <!-- Campo oculto con el Token Anti-CSRF para verificar que el usuario no sea un sitio malicioso de terceros-->
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8'); ?>">
        
        <label>Nombre: </label>  <br>
        <input type="text" name="nombre"> <br>

        <label>Edad: </label> <br>
        <input type="text" name="edad"> <br>

        <label>Correo: </label> <br>
        <input type="text" name="correo"> <br><br>

        <input type="submit" value="Registrar"> <br><br>

        <?php if(!empty($respuesta)): ?>
            <span style="color: <?php echo $color_respuesta; ?>; font-weight: bold;"> <!-- establecer color de respuesta -->
                <?php echo $respuesta; ?> <!-- Mostrar mensaje de éxito o error -->
            </span>
        <?php endif; ?>
</body>
</html>