<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_COOKIE['tema'] == 'dark'){
        setcookie(
            "tema",
            "light",
            time() + (86400 * 7),
            "/"
        );
    }else{
        setcookie(
            "tema",
            "dark",
            time() + (86400 * 7),
            "/"
        );
    }
}

$redirect_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';

header('Location: ' . $redirect_url);
exit;

?>