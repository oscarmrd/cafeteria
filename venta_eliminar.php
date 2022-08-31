<?php
if(!isset($_GET["id"])) exit();
$idventa = $_GET["id"];
include_once "conexion.php";
$sentencia = $base_de_datos->prepare("DELETE FROM venta WHERE idventa = ?;");
$resultado = $sentencia->execute([$idventa]);
if($resultado === TRUE){
	header("Location: ./venta_lista.php");
	exit;
}
else echo "Error al momento de eliminar la venta";
?>