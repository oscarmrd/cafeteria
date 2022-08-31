<?php include_once "encabezado.php" ?>
<?php
include_once "conexion.php";
$sentencia = $base_de_datos->query("SELECT venta.total, venta.fecha, venta.idventa, GROUP_CONCAT(	producto.nombreproducto, '..',  producto.idproducto, '..', producto_venta.cantidad SEPARATOR '__') AS producto FROM venta INNER JOIN producto_venta ON producto_venta.idventa = venta.idventa INNER JOIN producto ON producto.idproducto = producto_venta.idproducto GROUP BY venta.idventa ORDER BY venta.idventa DESC;");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Ventas</h1>
		<div>
			<a class="btn btn-success" href="./venta_formulario_crear.php"><i class="fa fa-plus"> Nueva  </i> </a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Número</th>
					<th>Fecha</th>
					<th>Productos vendidos</th>
					<th>Total</th>
					<th>Imprimir Cuenta</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($ventas as $venta){ ?>
				<tr>
					<td><?php echo $venta->idventa ?></td>
					<td><?php echo $venta->fecha ?></td>
					<td>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Producto</th>
									<th>ID</th>
									<th>Cantidad</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach(explode("__", $venta->producto) as $productosConcatenados){ 
								$producto = explode("..", $productosConcatenados)
								?>
								<tr>
									<td><?php echo $producto[0] ?></td>
									<td><?php echo $producto[1] ?></td>
									<td><?php echo $producto[2] ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</td>
					<td><?php echo $venta->total ?></td>
					<td><a class="btn btn-info" href="<?php echo "venta_imprimir.php?id=" . $venta->idventa?>"><i class="fa fa-print"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "venta_eliminar.php?id=" . $venta->idventa?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>