<?php
    session_start();
    require 'conexion.php';

    $q = trim($_POST['q'] ?? '');
    $like = "%{$q}%";
    $prioridad = trim($_POST['prioridad'] ?? '');

    //mostrar todas las incidencias
    $stmt = $cn->prepare("
        SELECT id, titulo, descripcion, aula, prioridad, estado 
        FROM incidencias
        WHERE (?='' OR titulo LIKE ?)
            AND (? = '' OR prioridad = ?)
        ORDER BY id ASC
    ");

    $stmt->bind_param('ssss', $q, $like, $prioridad, $prioridad);
    $stmt->execute();
    $res = $stmt->get_result();

    $logueado = isset($_SESSION['usuario']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>AulaFix - Grupo 1</title>
</head>
<body>
    <?php require 'includes/header.php';?>
    <main>
        <div class="container my-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="mb-0">Incidencias</h1>

                <?php if ($logueado): ?>
                    <a class="btn btn-aulafix" href="nueva.php">
                        <i class="bi bi-plus-lg me-1"></i>Nueva incidencia
                    </a>
                <?php endif; ?>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Titulo</th>
                            <th>Descripción</th>
                            <th>Aula</th>
                            <th>Prioridad</th>
                            <th>Ver detalle</th>

                            <?php if ($logueado): ?>
                                <th class="text-center">Editar</th>
                                <th class="text-center">Eliminar</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($r = $res->fetch_assoc()): ?>
                            <tr>
                                <td id="incidencia-<?= (int)$r['id'] ?>"><?= htmlspecialchars($r['titulo'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars(mb_strimwidth($r['descripcion'], 0, 100, '...'), ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($r['aula'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($r['prioridad'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td>
                                    <a href="detalle.php?id=<?= (int)$r['id'] ?>" class="btn btn-sm btn-aulafix">Ver detalles</a>
                                </td>

                                <?php if ($logueado): ?>
                                    <td class="text-center">
                                        <a href="editar.php?id=<?= (int)$r['id'] ?>" class="btn btn-sm btn-aulafix">Editar</a>
                                    </td>

                                    <td class="text-center">
                                        <form action="eliminar.php" method="POST" onsubmit="return confirmarEliminacion(this)">
                                            <input type="hidden" name="id" value="<?= (int)$r['id']?>">
                                            <button type="submit" class="btn btn-sm btn-aulafix">Eliminar</button>
                                        </form>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <?php require 'includes/footer.php'?>


    <div class="modal-overlay" id="modalEliminar">
        <div id="eliminarForm" class="text-center">
            <p class="fw-semibold mb-4">¿Estás seguro que quieres eliminar esta incidencia?</p>
            <div class="d-flex justify-content-center gap-2">
                <button type="button" class="btn btn-sm btn-secondary" onclick="cerrarPopup()">Cancelar</button>
                <button type="button" class="btn btn-sm btn-danger" onclick="procederEliminar()">Eliminar definitivamente</button>
            </div>
        </div>
    </div>

    <!-- Gestión de scripts al final de la página -->
    <script src="js/app.js"></script>
    <script src="js/popup.js"></script>
</body>
</html>
