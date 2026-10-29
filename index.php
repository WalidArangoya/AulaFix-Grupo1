<?php
session_start();
require 'conexion.php';

$q = trim($_POST['q'] ?? '');
$like = "%{$q}%";

$stmt = $cn->prepare("SELECT id, titulo, descripcion, aula, prioridad, estado 
    FROM incidencias
    WHERE (?='' OR descripcion LIKE ?)
    ORDER BY id ASC");

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
<?php
 include ''
?>
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
            <th>Prioridad</th>
            <th>Aula</th>


            <?php if ($logueado): ?>

                <th>Editar</th>
                <th>Eliminar</th>
            <?php endif; ?>
        </tr>

        <?php while ($r = $res->fetch_assoc()): ?>
            <tr>
                <td><a href="detalle.php"
                        id="<?= $r['id'] ?>"><?= htmlspecialchars($r['titulo'], ENT_QUOTES, 'UTF-8') ?></a>
                </td>
                <td><?= htmlspecialchars($r['descripcion'], ENT_QUOTES, 'UTF-8') ?></td>

                <td><?= htmlspecialchars($r['prioridad'], ENT_QUOTES, 'UTF-8') ?></td>

                <td><?= htmlspecialchars($r['aula'], ENT_QUOTES, 'UTF-8') ?></td>

                <?php if ($logueado): ?>

                    <td>
                        <button type="button">Editar</button>
                        </a>
                    </td>
                    <td><form>
                        <button type="button">Eliminar</button>
                        </a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>