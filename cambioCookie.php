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

header('Location:index.php');

?>