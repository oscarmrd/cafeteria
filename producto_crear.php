<?php
#Salir si no comple con los datos obligatorios
if(!isset($_POST["nombreproducto"]) || !isset($_POST["referencia"]) || !isset($_POST["precio"]) || !isset($_POST["peso"]) || !isset($_POST["categoria"]) || !isset($_POST["stock"])) 
    exit();

#Si digita toda la información continua aquí

include_once "conexion.php";
$nombreproducto = $_POST["nombreproducto"];
$referencia = $_POST["referencia"];
$precio = $_POST["precio"];
$peso = $_POST["peso"];
$categoria = $_POST["categoria"];
$stock = $_POST["stock"];
$fechacreacion = date("Y-m-d");

$sentencia = $base_de_datos->prepare("INSERT INTO producto(nombreproducto, referencia, precio, peso, categoria, stock, fechacreacion) VALUES (?, ?, ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$nombreproducto, $referencia, $precio, $peso, $categoria, $stock, $fechacreacion]);

if($resultado === TRUE){
	header("Location: ./producto_lista.php");
	exit;
}
else echo "Por favor verifica la información";


?>
<?php include_once "pie.php" ?>