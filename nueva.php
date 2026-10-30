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
    echo 
        "<script>
            alert('Incidencia creada correctamente');
            window.location='index.php';
        </script>"
        ;
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

    <form method="POST" id="formNueva">

    <label>Título:</label>
    <input type="text" name="titulo" id="titulo" required>

    <br><br>

    <label>Descripción:</label>
    <textarea name="descripcion" id="descripcion" required></textarea>

    <br><br>

    <label>Aula:</label>
    <input type="text" name="aula" id="aula" required>

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

<script>
document.getElementById("formNueva").addEventListener("submit", function(event){

    let titulo = document.getElementById("titulo").value.trim();
    let descripcion = document.getElementById("descripcion").value.trim();
    let aula = document.getElementById("aula").value.trim();

    // Validar longitud del título
    if(titulo.length < 3){
        alert("El título debe tener al menos 3 caracteres.");
        event.preventDefault();
        return;
    }

    // Validar longitud de la descripción
    if(descripcion.length < 10){
        alert("La descripción debe tener al menos 10 caracteres.");
        event.preventDefault();
        return;
    }

    // Validar que el aula empiece por numero y termine en letras (ej: 2DAW)
    let patronAula = /^[0-9]+[A-Za-z]+$/;

    if(!patronAula.test(aula)){
        alert("El aula debe empezar por números y terminar por letras. Ejemplo: 1DAM o 2DAW.");
        event.preventDefault();
        return;
    }
});
</script>
</body>
</html>