<?php
    require 'conexion.php';

    $id = (int)($_GET['id'] ?? '0');
    
    if($id == 0){
        die("ID no válido");
    }
    
    // CARGAR LOS DATOS ACTUALES

    $stmt = $cn->prepare("
    SELECT * FROM incidencias WHERE id = ?");
    
    $stmt -> bind_param("i", $id);
    $stmt -> execute();

    $resultado = $stmt ->get_result();
    $incidencia = $resultado-> fetch_assoc();
    
    if(!$incidencia) {
        die("Incidencia no encontrada");
    }

    // HISTORIAL DE INCIDENCIAS
    $stmt2 = $cn->prepare("
    SELECT estado_anterior, estado_nuevo, fecha_cambio FROM historial_estados WHERE incidencia_id = ?");
    
    $stmt2 -> bind_param("i", $id);
    $stmt2 -> execute();

    $resultadoHistorial = $stmt2 -> get_result();   
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Detalle Incidencia</title>
</head>
<body>
    <?php require 'includes/header.php';?>
    <div class="container my-5">
        <div class="table-responsive tabla">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                <tr>
                    <th>Titulo</th>
                    <th>Descripción</th>
                    <th>Aula</th>
                    <th>Prioridad</th>
                    <th>Estado</th>
                    <th>Fecha Creación</th>
                </tr>
                <tr>
                    <td><?= htmlspecialchars($incidencia['titulo'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($incidencia['descripcion'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($incidencia['aula'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($incidencia['prioridad'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($incidencia['estado'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($incidencia['fecha_creacion'], ENT_QUOTES, 'UTF-8') ?></td>
                </tr>
            </table>
            <br><br>
        </div>
            
        <div class="table-responsive tabla">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                <tr>
                    <th>Estado Anterior</th>
                    <th>Estado Actual</th>
                    <th>Fecha_cambio</th>
                </tr>
                <?php while ($r2 = $resultadoHistorial->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($r2['estado_anterior'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($r2['estado_nuevo'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($r2['fecha_cambio'], ENT_QUOTES, 'UTF-8') ?></td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
    <?php require 'includes/footer.php';?>
</body>
</html>