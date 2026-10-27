
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
    <nav class="navbar navbar-dark">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="nav-item" id="logo">
                <a class="navbar-brand active"  href="index.php">LOGO</a>
            </div>
            <div class="nav-item flex-grow-1 mx-3" style="max-width: 900px;">
                <form class="hstack gap-2">
                    <input class="form-control" placeholder="Search"/>
                    <button class="btn-solid theme-secondary" type="submit"><img src="img/lupa.png" id="lupa"></button>
                    <button class="form-control combobox-toggle" type="button"
                        data-bs-toggle="combobox"
                        data-bs-name="country"
                        data-bs-placeholder="Gravedad"
                        id="filtro"
                        style="max-width: 120px">
                        <span class="combobox-value">Gravedad</span>
                        <svg class="combobox-caret" width="13" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.46967 5.46967C0.762563 5.17678 1.23744 5.17678 1.53033 5.46967L5 8.93934L8.46967 5.46967C8.76256 5.17678 9.23744 5.17678 9.53033 5.46967C9.82322 5.76256 9.82322 6.23744 9.53033 6.53033L5.53033 10.5303C5.23744 10.8232 4.76256 10.8232 4.46967 10.5303L0.46967 6.53033C0.176777 6.23744 0.176777 5.76256 0.46967 5.46967Z" fill="currentcolor"/></svg>
                    </button>
                    <div class="menu">
                        <button class="menu-item" type="button" data-bs-value="us">Baja</button>
                        <button class="menu-item" type="button" data-bs-value="uk">Media</button>
                        <button class="menu-item" type="button" data-bs-value="ca">Grave</button>
                    </div>
                </form>
            </div>
        
            <div class="nav-item" id="login">
                <a class="nav-link active" href="login.php">Iniciar Sesion</a>
            </div>
        </div>
    </nav>

    <form action="" method="GET" id="form1" style="max-width: 400px;">
        <div class="form-group">
            <div class="form-field">
                <label for="fieldText" class="form-label">Nombre de Usuario</label>
                <input type="text" class="form-control" style="max-width: 300px" id="usuario" placeholder="Enter Username">
                <div class="form-text">
                </div>
            </div>

            <div class="form-field">
                <label for="password2" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password">
            </div>
            <br>    
            <button type="button" class="btn" id="iniciarSesion" style="max-width: 150px;">Iniciar Sesion</button>
        </div>
    </form>
</body>
</html>


















<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/estilos.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="nav-item" id="logo">
                <a class="navbar-brand active"  href="index.php">LOGO</a>
            </div>
            <div>
                <form class="d-flex">
                    <input class="form-control" placeholder="Search"/>
                    <div class="input-group">
                        <input class="form-control form-control-lg" type="search" placeholder="Search" aria-label="Search" id="searchbar">
                        <button class="btn btn-primary px-4" type="submit">
                                <img src="img/lupa.png" id="lupa">
                        </button>
                    </div>
                    <div id="filtro">
                        <button class="form-control combobox-toggle" type="button"
                            data-bs-toggle="combobox"
                            data-bs-name="filtro"
                            data-bs-placeholder="Gravedad">
                        <span class="combobox-value">Gravedad</span>
                        <svg class="combobox-caret" width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.46967 5.46967C0.762563 5.17678 1.23744 5.17678 1.53033 5.46967L5 8.93934L8.46967 5.46967C8.76256 5.17678 9.23744 5.17678 9.53033 5.46967C9.82322 5.76256 9.82322 6.23744 9.53033 6.53033L5.53033 10.5303C5.23744 10.8232 4.76256 10.8232 4.46967 10.5303L0.46967 6.53033C0.176777 6.23744 0.176777 5.76256 0.46967 5.46967Z" fill="currentcolor"/></svg>
                        </button>
                        <div class="menu">
                            <button class="menu-item" type="button" >Baja</button>
                            <button class="menu-item" type="button" >Media</button>
                            <button class="menu-item" type="button" >Alta</button>
                        </div>
                    </div>
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
            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="button" class="btn btn-primary">Iniciar Sesion</button>
            </div>
        </div>
    </form>
</body>
</html>
-->