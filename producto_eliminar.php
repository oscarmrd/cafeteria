<?php
if(!isset($_GET["idproducto"])) exit();
$idproducto = $_GET["idproducto"];
include_once "conexion.php";
$sentencia = $base_de_datos->prepare("DELETE FROM producto WHERE idproducto = ?;");
$resultado = $sentencia->execute([$idproducto]);
if($resultado === TRUE){
	header("Location: ./producto_lista.php");
	exit;
}
else echo "Error al eliminar";
?>