<?php
if (!isset($_GET["id"])) {
    exit("No hay id");
}
$idventa = $_GET["id"];
include_once "conexion.php";
$sentencia = $base_de_datos->prepare("SELECT idventa, fecha, total FROM venta WHERE idventa = ?");
$sentencia->execute([$idventa]);
$venta = $sentencia->fetchObject();
if (!$venta) {
    exit("No existe venta con el id");
}

$sentenciaProductos = $base_de_datos->prepare("SELECT p.nombreproducto, p.referencia,p.precio, pv.cantidad
FROM producto p
INNER JOIN 
producto_venta pv
ON p.idproducto = pv.idproducto
WHERE pv.idventa = ?");
$sentenciaProductos->execute([$idventa]);
$productos = $sentenciaProductos->fetchAll();
if (!$productos) {
    exit("No hay productos");
}

?>
<style>
    * {
        font-size: 12px;
        font-family: 'Times New Roman';
    }

    td,
    th,
    tr,
    table {
        border-top: 1px solid black;
        border-collapse: collapse;
    }

    td.producto,
    th.producto {
        width: 75px;
        max-width: 75px;
    }

    td.cantidad,
    th.cantidad {
        width: 50px;
        max-width: 50px;
        word-break: break-all;
    }

    td.precio,
    th.precio {
        width: 50px;
        max-width: 50px;
        word-break: break-all;
        text-align: right;
    }

    .centrado {
        text-align: center;
        align-content: center;
    }

    .ticket {
        width: 175px;
        max-width: 175px;
    }

    img {
        max-width: inherit;
        width: inherit;
    }

    @media print {

        .oculto-impresion,
        .oculto-impresion * {
            display: none !important;
        }
    }
</style>

<body>
    <div class="ticket">
        <img src="./logo3.jpg" alt="Logotipo">
        <p class="centrado">VENTA 
            <br><?php echo $venta->fecha; ?>
        </p>
        <table>
            <thead>
                <tr>
                    <th class="cantidad">CANT</th>
                    <th class="producto">PRODUCTO</th>
                    <th class="precio">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($productos as $producto) {
                    $subtotal = $producto->precio * $producto->cantidad;
                    $total += $subtotal;
                ?>
                    <tr>
                        <td class="cantidad"><?php echo $producto->cantidad;  ?></td>
                        <td class="producto"><?php echo $producto->nombreproducto;  ?> <strong>$<?php echo number_format($producto->precio, 2) ?></strong></td>
                        <td class="precio">$<?php echo number_format($subtotal, 0)  ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="2" style="text-align: right;">TOTAL</td>
                    <td class="precio">
                        <strong>$<?php echo number_format($total, 0) ?></strong>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="centrado">¡GRACIAS POR SU COMPRA!
        </p>
    </div>
</body>


<script>
    document.addEventListener("DOMContentLoaded", () => {
        window.print();
        setTimeout(() => {
            window.location.href = "./venta_lista.php";
        }, 1000);
    });
</script>