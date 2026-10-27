<?php
require 'conexion.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $titulo = $_POST["titulo"] ?? '';
    $descripcion = $_POST["descripcion"]?? '';
    $aula = $_POST["aula"]?? '';
    $prioridad = $_POST["prioridad"]?? '';

    $stmt = $cn->prepare("
        INSERT INTO incidencias
        (titulo, descripcion, aula, prioridad)
        VALUES (?, ?, ?, ?)
    ");

    $stmt->bind_param(
        "ssss",
        $titulo,
        $descripcion,
        $aula,
        $prioridad
    );

    if($stmt->execute()){
        echo "Incidencia creada correctamente";
    } else {
        echo "Error al crear la incidencia";
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva incidencia</title>
</head>
<body>
    <h1>Nueva incidencia</h1>

    <form method="POST">

    <label>Título:</label>
    <input type="text" name="titulo" required>

    <br><br>

    <label>Descripción:</label>
    <textarea name="descripcion" required></textarea>

    <br><br>

    <label>Aula:</label>
    <input type="text" name="aula" required>

    <br><br>

    <label>Prioridad:</label>

    <select name="prioridad">
        <option value="Baja">Baja</option>
        <option value="Media">Media</option>
        <option value="Alta">Alta</option>
    </select>

    <br><br>

    <button type="submit">
        Guardar incidencia
    </button>

</form>
</body>
</html>