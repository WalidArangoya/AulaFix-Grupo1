<?php
session_start();
require 'conexion.php';


$q = trim($_POST['q'] ?? '');
$like = "%{$q}%";

//mostrar todas las incidencias
$stmt = $cn->prepare("
    SELECT id, titulo, descripcion, aula, prioridad, estado 
    FROM incidencias
    WHERE (?='' OR descripcion LIKE ?)
    ORDER BY id ASC
");

$stmt->bind_param('ss', $q, $like);
$stmt->execute();
$res = $stmt->get_result();

$logueado = isset($_SESSION['usuario']);

?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>AulaFix-Grupo 1</title>
</head>

<body>

    <h1>Incidencias</h1>


    <?php if ($logueado): ?>
        <p>
            <a href="nueva.php">
                <button type="button">Nueva incidencia</button>
            </a>
        </p>

    <?php endif; ?>

    <table border="1" cellpadding="6">

        <tr>
            <th>Titulo</th>
            <th>Descripción</th>
            <th>Aula</th>
            <th>Prioridad</th>

            <?php if ($logueado): ?>
                <th>Editar</th>
                <th>Eliminar</th>
            <?php endif; ?>
        </tr>

        <?php while ($r = $res->fetch_assoc()): ?>
            <tr>
                <td><a href="detalle.php">
                        id="<?= $r['titulo'] ?>"><?= htmlspecialchars($r['titulo'], ENT_QUOTES, 'UTF-8') ?></a>
                </td>
                <?= htmlspecialchars($r['descripcion'], ENT_QUOTES, 'UTF-8') ?>
                </td>

                <td>
                    <?= htmlspecialchars($r['aula'], ENT_QUOTES, 'UTF-8') ?>
                </td>

                <td>
                    <?= htmlspecialchars($r['prioridad'], ENT_QUOTES, 'UTF-8') ?>
                </td>

                <?php if ($logueado): ?>

                    <td>
                        <button type="button" disabled>Editar</button>
                    </td>

                    </td>
                    <td>
                        <form action="eliminar.php" method="POST">
                            <input type="hidden" name="id" value="<?= $r['id']?>">
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endwhile; ?>
    </table>
    </form>
</body>

</html>