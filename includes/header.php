<?php
$qActual = $q ?? '';
$prioridadActual = $prioridad ?? '';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


$tema = $_COOKIE['tema'];

?>
<header>
    <nav class="navbar site-nav py-2">
        <div class="container d-flex flex-wrap align-items-center gap-3">

            <a class="navbar-brand m-0 logo" href="index.php">
                <img class="logo" src="<?= $tema === 'dark' ? 'img/logoClaro.png' : 'img/logo.png' ?>" alt="AulaFix">
            </a>

            <form class="search-form flex-grow-1 order-3 order-md-2" style="max-width: 720px;" action="index.php"
                method="POST" role="search">

                <div class="input-group">

                    <span class="input-group-text bg-white border-end-0">
                        <i class="bi bi-search text-secondary"></i>
                    </span>

                    <input class="form-control border-start-0" type="search" name="q" placeholder="Buscar por nombre"
                        value="<?= htmlspecialchars($qActual, ENT_QUOTES, 'UTF-8') ?>" aria-label="Buscar incidencias">

                    <select class="form-select" name="prioridad" aria-label="Filtrar por gravedad">
                        <option value="">Gravedad</option>
                        <?php foreach (['Baja', 'Media', 'Alta'] as $p): ?>
                            <option value="<?= $p ?>" <?= $prioridadActual === $p ? 'selected' : '' ?>><?= $p ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button class="btn btn-brand txt" type="submit">Buscar</button>
                </div>
            </form>

            <form action="cambioCookie.php" method="post">
                <button type="submit" id="themeToggle" class="btn btn-outline-secondary">
                    <i class="bi <?= $tema === 'dark' ? 'bi-sun-fill' : 'bi-moon-fill' ?>"></i>
                </button>
            </form>


            <?php if (isset($_SESSION["usuario"])): ?>
                <div class="d-flex align-items-center gap-2 order-2 order-md-3 ms-auto ms-md-0">
                    <span>
                        <i class="bi bi-person-circle me-1"></i><?= htmlspecialchars($_SESSION["usuario"]) ?>
                    </span>
                    <a class="btn btn-outline-brand txt" href="logout.php">
                        <i class="bi bi-box-arrow-right me-1"></i>Cerrar sesión
                    </a>
                </div>
            <?php else: ?>
                <a class="btn btn-outline-brand order-2 order-md-3 ms-auto ms-md-0 txt" href="login.php">
                    <i class="bi bi-person-circle me-1"></i>Iniciar sesión
                </a>
            <?php endif; ?>
        </div>
    </nav>
</header>