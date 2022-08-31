<?php
if(!isset($_GET["id"])) 
    exit();
$idproducto = $_GET["id"];
include_once "conexion.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM producto WHERE idproducto = ?;");
$sentencia->execute([$idproducto]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
if($producto === FALSE){
	echo "¡No existe el producto !";
	exit();
}

?>
<?php include_once "encabezado.php" ?>
	<div class="col-xs-12">
		<h1>Modificar Producto </h1>
		<form method="post" action="producto_modificar.php">
			<input type="hidden" name="idproducto" value="<?php echo $producto->idproducto; ?>">
	
			<label for="nombreproducto">Producto:</label>
			<input value="<?php echo $producto->nombreproducto ?>" class="form-control" name="nombreproducto" required type="text" id="nombreproducto" placeholder="Escribe el nombre del producto">

			<label for="referencia">Referencia:</label>
			<input value="<?php echo $producto->referencia ?>" class="form-control" name="referencia" required type="text" id="referencia" placeholder="Escribe la referencia">

			<label for="precio">Precio:</label>
			<input value="<?php echo $producto->precio ?>" class="form-control" name="precio" required type="number" id="precio" placeholder="Precio de venta">

			<label for="peso">Peso:</label>
			<input value="<?php echo $producto->peso ?>" class="form-control" name="peso" required type="number" id="peso" placeholder="Peso">

			<label for="categoria">Categoria:</label>
			<input value="<?php echo $producto->categoria ?>" class="form-control" name="categoria" required type="text" id="categoria" placeholder="categoria del producto">

			<label for="stock">Stock:</label>
			<input value="<?php echo $producto->stock ?>" class="form-control" name="stock" required type="number" id="stock" placeholder="Cantidad o existencia">
			
			<label for="fechacreacion">Fecha Creación:</label>
			<input value="<?php echo $producto->fechacreacion ?>" class="form-control" name="fechacreacion" required type="date" id="fechacreacion" placeholder="Fecha de creación" readonly>


			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./producto_lista.php">Cancelar</a>
		</form>
	</div>
<?php include_once "pie.php" ?>
