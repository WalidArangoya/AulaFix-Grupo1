<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/estilos.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="nav-item" id="logo">
                <a class="navbar-brand active"  href="index.php">LOGO</a>
            </div>
            <div class="nav-item flex-grow-1 mx-3" style="max-width: 500px;">
                <form class="hstack gap-2">
                    <input class="form-control" placeholder="Search"/>
                    <button class="btn-solid theme-secondary" type="submit"><img src="img/lupa.png" id="lupa"></button>
                    <button class="form-control combobox-toggle" data-bs-placeholder="Gravedad"></button>
                </form>
            </div>
        
            <div class="nav-item" id="login">
                <a class="nav-link active" href="login.php">Iniciar Sesion</a>
            </div>
        </div>
    </nav>

    <form action="" method="GET" id="form1">
        <div class="form-group">
            <div class="form-field">
                <label for="fieldText" class="form-label">Nombre de Usuario</label>
                <input type="text" class="form-control" id="fieldText" placeholder="Enter Username">
                <div class="form-text">
                </div>
            </div>

            <div class="form-field">
                <label for="password2" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password">
            </div>
        </div>
    </form>
</body>
</html>