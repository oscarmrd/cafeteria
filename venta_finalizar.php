<?php
if(!isset($_POST["total"])) exit;


session_start();


$total = $_POST["total"];
include_once "conexion.php";


$ahora = date("Y-m-d");


$sentencia = $base_de_datos->prepare("INSERT INTO venta(fecha, total) VALUES (?, ?);");
$sentencia->execute([$ahora, $total]);

$sentencia = $base_de_datos->prepare("SELECT idventa FROM venta ORDER BY idventa DESC LIMIT 1;");
$sentencia->execute();
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

$idVenta = $resultado === false ? 1 : $resultado->idventa;

$base_de_datos->beginTransaction();
$sentencia = $base_de_datos->prepare("INSERT INTO producto_venta(idproducto, idventa, cantidad) VALUES (?, ?, ?);");
$sentenciaExistencia = $base_de_datos->prepare("UPDATE producto SET stock = stock - ? WHERE idproducto = ?;");
foreach ($_SESSION["carrito"] as $producto) {
	$total += $producto->total;
	$sentencia->execute([$producto->idproducto, $idVenta, $producto->cantidad]);
	$sentenciaExistencia->execute([$producto->cantidad, $producto->idproducto]);
}
$base_de_datos->commit();
unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];
header("Location: ./venta_formulario_crear.php?status=1");
?>