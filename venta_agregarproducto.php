<?php
if (!isset($_POST["idproducto"])) {
    return;
}

$idproducto = $_POST["idproducto"];
include_once "conexion.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM producto WHERE idproducto = ? LIMIT 1;");
$sentencia->execute([$idproducto]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
# Si no existe, salimos y lo indicamos
if (!$producto) {
    header("Location: ./venta_formulario_crear.php?status=4");
    exit;
}
# Si no hay existencia...
if ($producto->stock < 1) {
    header("Location: ./venta_formulario_crear.php?status=5");
    exit;
}
session_start();
# Buscar producto dentro del cartito
$indice = false;
for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
    if ($_SESSION["carrito"][$i]->idproducto === '$idproducto') {
        $indice = $i;
        break;
    }
}
# Si no existe, lo agregamos como nuevo
if ($indice === false) {
    $producto->cantidad = 1;
    $producto->total = $producto->precio;
    array_push($_SESSION["carrito"], $producto);
} else {
    # Si ya existe, se agrega la cantidad
    # Pero espera, tal vez ya no haya
    $cantidadExistente = $_SESSION["carrito"][$indice]->cantidad;
    # si al sumarle uno supera lo que existe, no se agrega
    if ($cantidadExistente + 1 > $producto->existencia) {
        header("Location: ./venta_formulario_crear.php?status=5");
        exit;
    }
    $_SESSION["carrito"][$indice]->cantidad++;
    $_SESSION["carrito"][$indice]->total = $_SESSION["carrito"][$indice]->cantidad * $_SESSION["carrito"][$indice]->precio;
}
header("Location: ./venta_formulario_crear.php");
