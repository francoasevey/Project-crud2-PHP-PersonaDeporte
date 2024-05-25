<?php
$db_host = "localhost"; 
$db_user = "root";
$db_pass = "";
$db_name = "desafio";

$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$link) {
    echo "Error: no se puede conectar a MYSQL." . PHP_EOL;
    echo "<br>";
    echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "<br>";
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit();
}

$id_realiza = $_POST['id_realiza'];
$id_persona = $_POST['id_persona'];
$id_deporte = $_POST['id_deporte'];

$consulta = "UPDATE realiza SET id_persona = '$id_persona', id_deporte = '$id_deporte' 
             WHERE id_realiza = '$id_realiza'";

if (mysqli_query($link, $consulta)) {
    echo "Relación actualizada exitosamente.";
} else {
    echo "Error al actualizar la relación: " . mysqli_error($link);
}

mysqli_close($link);
header("Location: listarelaciones.php");
?>
