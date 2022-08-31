<?php

#Campos obligatorios
if(
	!isset($_POST["nombreproducto"]) || 
	!isset($_POST["referencia"]) || 
	!isset($_POST["precio"]) || 
	!isset($_POST["peso"]) || 
	!isset($_POST["categoria"]) ||
	!isset($_POST["stock"]) || 
	!isset($_POST["fechacreacion"])
) exit();

#Si se cumple la condición anterior se modifica la información...

include_once "conexion.php";
$idproducto = $_POST["idproducto"];
$nombreproducto = $_POST["nombreproducto"];
$referencia = $_POST["referencia"];
$precio = $_POST["precio"];
$peso = $_POST["peso"];
$categoria = $_POST["categoria"];
$stock = $_POST["stock"];
$fechacreacion = $_POST["fechacreacion"];

$sentencia = $base_de_datos->prepare("UPDATE producto SET nombreproducto = ?, referencia = ?, precio = ?, peso = ?, categoria = ?, stock = ?, fechacreacion = ? WHERE idproducto = ?;");
$resultado = $sentencia->execute([$nombreproducto, $referencia, $precio, $peso, $categoria, $stock, $fechacreacion, $idproducto]);

if($resultado === TRUE){
	header("Location: ./producto_lista.php");
	exit;
}
else echo "Revisar la información que se modifico";
?>