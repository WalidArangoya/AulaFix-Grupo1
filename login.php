<?php
    require 'conexion.php';
    session_start();

    $error = "";

    if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["user"]) && isset($_POST["pass"])){
        $usuario=trim($_POST["user"]);
    
        $stmt = $cn->prepare("SELECT password FROM usuarios WHERE usuario = ?");
        $stmt->bind_param('s', $usuario);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($r = $res->fetch_assoc()) {
            if($_POST["pass"] == $r['password']){
                session_start();
                $_SESSION["usuario"] = $usuario;
                header("Location: index.php");
                exit();
            }
        }
        $error = "Usuario o contraseña incorrectos";
    }

    $tema = $_COOKIE['tema'];
?>

<!DOCTYPE html>
<html lang="en">
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
    <title>Login</title>
</head>
<body>
    <?php require 'includes/header.php';?>

    <main id="mainLogin">
        <form method="POST" class="formInicioSesion">
            <h1 class="h3 editarTitulo text-center mb-4">Iniciar sesión</h1>

            <div class="form-group">
                <div class="form-field mb-3">
                    <label for="usuario" class="form-label fw-semibold">Nombre de Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="user" placeholder="Enter Username">
                    <div class="form-text"></div>
                </div>

                <div class="form-field mb-4">
                    <label for="contrasena" class="form-label fw-semibold">Contraseña</label>
                    <input type="password" class="form-control" id="contrasena" name="pass" placeholder="Enter password">
                </div>

                <br>
                <button type="submit" class="btn btn-aulafix w-100" id="iniciarSesion">Iniciar Sesion</button>

                <?php if ($error): ?>
                    <div class="alert alert-danger mt-3"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>

            </div>
        </form>
    </main>
    <?php require 'includes/footer.php';?>
</body>
</html>
