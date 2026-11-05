<?php
    require 'conexion.php';

    $id = (int)($_GET['id'] ?? '0');
    
    if($id == 0){
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
            echo "Todos los campos son obligatorios";
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
            header("Location: index.php");
            exit;
        } else {
            echo "Error al actualizar";
        }

    }
}

$tema = $_COOKIE['tema'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <?php
    if ($tema === 'dark'): ?>
        <link rel="stylesheet" href="css/modoOscuro.css">
    <?php else: ?>
        <link rel="stylesheet" href="css/estilos.css">
    <?php endif; ?>
    <title>Editar incidencia</title>
</head>
<body>
    <?php require 'includes/header.php';?>
<main class="container py-5" id="mainEditar">

    <div class="row justify-content-center">

        <div class="col-12 col-md-10 col-lg-8">

            <div class="card card-aulafix">

                <div class="card-body p-5">

                    <h1 class="display-4 fw-bold text-center mb-5">
                        Editar incidencia
                    </h1>

                    <form method="POST">

                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Título
                            </label>

                            <input
                                type="text"
                                name="titulo"
                                class="form-control form-control-lg"
                                value="<?= htmlspecialchars($incidencia['titulo']) ?>"
                                required
                            >

                        </div>

                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Descripción
                            </label>

                            <textarea
                                name="descripcion"
                                class="form-control"
                                rows="5"
                                required
                            ><?= htmlspecialchars($incidencia['descripcion']) ?></textarea>

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">
                                    Prioridad
                                </label>

                                <select
                                    name="prioridad"
                                    class="form-select"
                                >

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

                            </div>

                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">
                                    Estado
                                </label>

                                <select
                                    name="estado"
                                    class="form-select"
                                >

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

                            </div>

                        </div>

                        <div class="d-flex justify-content-between mt-4">

                            <a
                                href="index.php"
                                class="btn btn-outline-dark btn-lg"
                            >
                                Cancelar
                            </a>

                            <button
                                type="submit"
                                class="btn btn-aulafix btn-lg px-4"
                            >
                                Guardar cambios
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</main>
    <?php require 'includes/footer.php';?>
</body>
</html>