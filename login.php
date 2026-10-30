
<?php
require 'conexion.php';
session_start();
if($_SERVER["REQUEST_METHOD"]=="GET" && isset($_GET["user"]) && isset($_GET["pass"])){
    $usuario=trim($_GET["user"]);
}
$stmt = $cn->prepare("SELECT password FROM usuarios WHERE usuario = ?");
$stmt->bind_param('s', $usuario);
$stmt->execute();
$res = $stmt->get_result();

$sesionIniciada=false;

if($_SERVER["REQUEST_METHOD"]=="GET"){
    if ($r = $res->fetch_assoc()) {
        if($_GET["pass"]==$r['password']){
            $sesionIniciada=true;
            session_start();
            $_SESSION["usuario"]="$usuario";
            header("Location: http://localhost/git/AulaFix-Grupo1/index.php");
            exit();
        }
    }
}
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
 

    <form action="" method="GET" id="form1" style="max-width: 400px;">
        <div class="form-group">
            <div class="form-field">
                <label for="fieldText" class="form-label">Nombre de Usuario</label>
                <input type="text" class="form-control" style="max-width: 300px" id="usuario" name="user" placeholder="Enter Username">
                <div class="form-text">
                </div>
            </div>

            <div class="form-field">
                <label for="password2" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="contraseña" name="pass" placeholder="Enter password">
            </div>
            <br>    
            <button type="submit" class="btn" id="iniciarSesion" id="boton" style="max-width: 150px;">Iniciar Sesion</button>
        </div>
    </form>
</body>
</html>
