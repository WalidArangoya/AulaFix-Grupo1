<?php
    require 'conexion.php';

    $exito = null;

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
        $exito = $stmt->execute();

        if ($exito) {
            header("Location: index.php?creada=1");
            exit();
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Nueva incidencia</title>
</head>
<body>
    <?php require 'includes/header.php'?>
    <main>
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

            <?php if ($exito === true): ?>
                <div class="alert alert-success mt-3">Incidencia creada correctamente</div>
            <?php endif;?>

        </form>
    </main>
    <?php require 'includes/footer.php'?>
</body>
</html>