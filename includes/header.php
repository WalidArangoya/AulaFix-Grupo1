<?php
    $qActual = $q ?? '';
    $prioridadActual = $prioridad ?? '';

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

?>
<header>
    <nav class="navbar site-nav py-2">
        <div class="container d-flex flex-wrap align-items-center gap-3">

            <a class="navbar-brand m-0" href="index.php">
                <img class="logo" src="img/logo.png" alt="AulaFix">
            </a>

            <form class="search-form flex-grow-1 order-3 order-md-2" style="max-width: 720px;"
                  action="index.php" method="POST" role="search">
                  
                <div class="input-group">

                    <span class="input-group-text bg-transparent border-end-0" style="border-color: var(--af-line);">
                        <i class="bi bi-search text-secondary"></i>
                    </span>

                    <input class="form-control border-start-0" type="search" name="q"
                           placeholder="Buscar por nombre"
                           value="<?= htmlspecialchars($qActual, ENT_QUOTES, 'UTF-8') ?>"
                           aria-label="Buscar incidencias">

                    <select class="form-select" name="prioridad" aria-label="Filtrar por gravedad">
                        <option value="">Gravedad</option>
                        <?php foreach (['Baja', 'Media', 'Alta'] as $p): ?>
                            <option value="<?= $p ?>" <?= $prioridadActual === $p ? 'selected' : '' ?>><?= $p ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button class="btn btn-brand" type="submit">Buscar</button>
                </div>
            </form>

            <?php if (isset($_SESSION["usuario"])): ?>
                <div class="d-flex align-items-center gap-2 order-2 order-md-3 ms-auto ms-md-0">
                    <span>
                        <i class="bi bi-person-circle me-1"></i><?= htmlspecialchars($_SESSION["usuario"]) ?>
                    </span>
                    <a class="btn btn-outline-brand" href="logout.php">
                        <i class="bi bi-box-arrow-right me-1"></i>Cerrar sesión
                    </a>
                </div>
            <?php else: ?>
                <a class="btn btn-outline-brand order-2 order-md-3 ms-auto ms-md-0" href="login.php">
                    <i class="bi bi-person-circle me-1"></i>Iniciar sesión
                </a>
            <?php endif; ?>
        </div>
    </nav>
</header>