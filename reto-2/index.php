<?php
    $respuesta = "";

    // Expresión regular que define el patrón que debe seguir un correo
    $patron_correo = "/^[a-zA-Z0-9._+%-]+@[a-zA-Z\.-]+\.[a-zA-Z]{2,3}$/";

    // Expresión regular que valida si la edad ingresada es correcta
    $patron_edad = "/^[1-9][0-9]?$/";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Campos recibidos del formulario en HTML
        $nombre = $_POST["nombre"]; // Nombre
        $edad = $_POST["edad"]; // Edad
        $correo = $_POST["correo"]; // Correo

        // Validación de los datos obtenidos del formulario

        // No se ingresó el nombre
        if(empty($nombre)){
            $respuesta = "Ingrese el nombre del estudiante";
        }

        elseif(empty($edad)){ // No se ingresó la edad
            $respuesta = "Ingrese la edad del estudiante";
        }

        elseif(!preg_match($patron_edad, $edad) or !((int)$edad > 0 and (int)$edad <= 99) ){ // La edad no es un entero positivo
            $respuesta = "Ingrese la edad correctamente";
        }

        elseif(empty($correo)){ // No se ingresó el correo electrónico
            $respuesta = "Ingrese el correo electrónico";
        }
        
        elseif(!preg_match($patron_correo, $correo)){ // No se ingresó un correo válido
             $respuesta = "Correo electrónico inválido";
        }

        else{ // Todos los datos cumplen con los requisitos
            $respuesta = "Estudiante registrado con éxito";

            // Conexión con la base de datos usando PDO
            try{
                $pdo = new PDO("mysql:host=localhost;port=3307;dbname=estudiantes", "root", "");

                // Sentencia preparada
                $sql = "INSERT INTO estudiantes(nombre, edad, correo) VALUES(?, ?, ?)";

                $stmt = $pdo->prepare($sql);
                $stmt->execute([$nombre, $edad, $correo]);

            }catch(PDOException $e){} // La excepción arrojada se debe a que no existe una base de datos levantada
            
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
        <label>Nombre: </label>  <br>
        <input type="text" name="nombre"> <br>

        <label>Edad: </label> <br>
        <input type="text" name="edad"> <br>

        <label>Correo: </label> <br>
        <input type="text" name="correo"> <br><br>

        <input type="submit" value="Registrar"> <br><br>

        <?php
            echo $respuesta;
        ?>
    </form>
</body>
</html>