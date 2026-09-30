<?php
    $respuesta = "";

    // Expresión regular que define el patrón que debe seguir un correo
    $patron_correo = "/^[a-zA-z0-9._+-%]+@[a-zA-z.-]+\.[a-zA-Z]{2}$/";

    // Expresión regular que valida si la edad ingresada es correcta
    $patron_edad = "/^[1-9][0-9]?$/";

    // Conexión con la base de datos usando PDO
    try{
        $pdo = new PDO("mysql:host=localhost;port=3307;dbname=estudiantes", "root", "");

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // Campos recibidos del formulario en HTML
            $nombre = $_POST["nombre"]; // Nombre
            $edad = $_POST["edad"]; // Edad
            $correo = $_POST["correo"]; // Correo

           // Sentencia preparada
            $sql = "INSERT INTO estudiantes(nombre, edad, correo) VALUES(?, ?, ?)";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nombre, $edad, $correo]);
        }


    }catch(PDOException $e){} // La excepción arrojada se debe a que no existe una base de datos levantada
    
    

    

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

        <input type="submit" value="Registrar"> <br>
    </form>
</body>
</html>