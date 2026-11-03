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
  <main class="editarWrapper container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card card-aulafix">

                <div class="card-body p-5">

                    <h1 class="display-4 fw-bold text-center mb-5">
                        Nueva incidencia
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
                            ></textarea>

                        </div>

                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Aula
                            </label>

                            <input
                                type="text"
                                name="aula"
                                class="form-control"
                                required
                            >

                        </div>

                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Prioridad
                            </label>

                            <select
                                name="prioridad"
                                class="form-select"
                            >

                                <option value="Baja">
                                    Baja
                                </option>

                                <option value="Media">
                                    Media
                                </option>

                                <option value="Alta">
                                    Alta
                                </option>

                            </select>

                        </div>

                        <?php if ($exito === true): ?>

                            <div class="alert alert-success">

                                Incidencia creada correctamente

                            </div>

                        <?php endif; ?>

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
                                Guardar incidencia
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</main>
    <?php require 'includes/footer.php'?>
</body>
</html>