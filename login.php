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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Login</title>
</head>
<body>
    <?php require 'includes/header.php';?>

    <main>
        <form method="POST" class="formInicioSesion">
            <div class="form-group">
                <div class="form-field">
                    <label for="usuario" class="form-label">Nombre de Usuario</label>
                    <input type="text" class="form-control" name="user" placeholder="Enter Username">
                    <div class="form-text"></div>
                </div>

                <div class="form-field">
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="pass" placeholder="Enter password">
                </div>

                <br>
                <button type="submit" class="btn btn-primary" id="iniciarSesion">Iniciar Sesion</button>

                <?php if ($error): ?>
                    <div class="alert alert-danger mt-3"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>

            </div>
        </form>
    </main>
    <?php require 'includes/footer.php';?>
</body>
</html>
