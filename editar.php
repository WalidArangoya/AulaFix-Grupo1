<?php
    require 'conexion.php';

    $id = $_GET['id'] ?? '';
    
    if(empty($id)){
        die("ID no válido");
    }
    
    // 1. CARGAR LOS DATOS ACTUALES

    $stmt = $cn->prepare("
    SELECT * FROM incidencias WHERE id = ?");
    
    $stmt -> bind_param("i", $id);
    $stmt -> execute();

    $resultado = $stmt ->get_result();
    $incidencia = $resultado-> fetch_assoc();
    
    if(!$incidencia) {
        die("Incidencia no encontrada");
    }

    // 2. GUARDAR CAMBIOS

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $titulo= trim($_POST["titulo"] ?? '');
        $descripcion = trim($_POST["descripcion"] ?? '');
        $prioridad = trim($_POST["prioridad"] ?? '');
        $estado = trim($_POST["estado"] ?? '');

        if(
            empty($titulo) ||
            empty($descripcion) ||
            empty($prioridad) ||
            empty($estado)
        ) {
            die("Todos los campos son obligatorios");
        } else{

        $stmt = $cn-> prepare("
            UPDATE incidencias 
            SET titulo = ?,
                descripcion = ?,
                prioridad = ?,
                estado = ?
            WHERE id = ?
        ");

        $estadoAnterior = $incidencia['estado'];

        $stmt-> bind_param(
            "ssssi",
            $titulo,
            $descripcion,
            $prioridad,
            $estado,
            $id
        );

        if($stmt->execute()) {
            if($estadoAnterior != $estado){
             
            $stmtHistorial = $cn->prepare("
                INSERT INTO historial_estados
                (
                    incidencia_id,
                    estado_anterior,
                    estado_nuevo,
                    fecha_cambio
                )
                VALUES (?, ?, ?, NOW())
                "); 
               
                $stmtHistorial->bind_param(
                "iss",
                $id,
                $estadoAnterior,
                $estado
               );
               
               $stmtHistorial->execute();     
            }
            echo "
            <script>
                alert('Incidencia actualizada correctamente');
                window.location='index.php';
            </script>
            ";
        } else {
            echo "Error al actualizar";
        }

    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar incidencia</title>
</head>
<body>

    <h1>Editar incidencia</h1>

    <form method="POST" id="formEditar">

        <label>Título:</label>
        <input
            type="text"
            name="titulo"
            value="<?= htmlspecialchars($incidencia['titulo']) ?>"
            required
        >

        <br><br>

        <label>Descripción:</label>
        <textarea
            name="descripcion"
            required
        ><?= htmlspecialchars($incidencia['descripcion']) ?></textarea>

        <br><br>

        <label>Prioridad:</label>

        <select name="prioridad">

            <option value="Baja"
                <?= $incidencia['prioridad'] == 'Baja' ? 'selected' : '' ?>>
                Baja
            </option>

            <option value="Media"
                <?= $incidencia['prioridad'] == 'Media' ? 'selected' : '' ?>>
                Media
            </option>

            <option value="Alta"
                <?= $incidencia['prioridad'] == 'Alta' ? 'selected' : '' ?>>
                Alta
            </option>

        </select>

        <br><br>

        <label>Estado:</label>

        <select name="estado">

            <option value="Pendiente"
                <?= $incidencia['estado'] == 'Pendiente' ? 'selected' : '' ?>>
                Pendiente
            </option>

            <option value="En proceso"
                <?= $incidencia['estado'] == 'En proceso' ? 'selected' : '' ?>>
                En proceso
            </option>

            <option value="Resuelta"
                <?= $incidencia['estado'] == 'Resuelta' ? 'selected' : '' ?>>
                Resuelta
            </option>

        </select>

        <br><br>

        <button id="btnGuardar" type="submit">
            Guardar cambios
        </button>

    </form>
<script>



    document.getElementById("formEditar").addEventListener("submit", function(event){

    let titulo = document.querySelector('[name="titulo"]').value;
    let descripcion = document.querySelector('[name="descripcion"]').value;

    //Validación de titulo
    if(titulo.length < 3){
        alert("El título debe tener al menos 3 caracteres.");
        event.preventDefault();
        return;
    }

    //Validación de descripción
    if(descripcion.length < 10){
        alert("La descripción debe tener al menos 10 caracteres.");
        event.preventDefault();
        return;
    }

    //Validación de campos vacios
    if(titulo.trim() === "" || descripcion.trim() === ""){
        alert("No puedes dejar campos vacíos o solo con espacios.");
        event.preventDefault();
        return;
    }

    //Confirmar los cambios
    if(!confirm("¿Seguro que deseas guardar los cambios?")){
        event.preventDefault();
        return;
    }
});

    

</script>
</body>
</html>