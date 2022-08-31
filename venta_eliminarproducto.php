<?php
if(!isset($_GET["indice"])) return;
$indice = $_GET["indice"];

session_start();
array_splice($_SESSION["carrito"], $indice, 1);
header("Location: ./venta_formulario_crear.php?status=3");
?>