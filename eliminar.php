<?php
    require 'conexion.php';

    $id = (int)($_POST['id'] ?? 0);
    $stmt = $cn->prepare('DELETE FROM incidencias WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
?>