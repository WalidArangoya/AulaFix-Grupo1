<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
$host = 'localhost';
$user = 'root'; 
$pass = 'root'; 
$db = 'aulafix';
$cn = new mysqli($host, $user, $pass, $db);
$cn->set_charset('utf8mb4');
} catch (mysqli_sql_exception $e) {
exit('Error de conexión a la base de datos.');
}
?>
