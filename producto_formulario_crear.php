<?php include_once "encabezado.php" ?>

<div class="col-xs-12">
	<h1>Nuevo Producto</h1>
	<form method="post" action="producto_crear.php">
		<label for="nombreproducto">Producto:</label>
		<input class="form-control" name="nombreproducto" required type="text" id="nombreproducto" placeholder="Escribe el nombre del producto">

		<label for="referencia">Referencia:</label>
		<input class="form-control" name="referencia" required type="text" id="referencia" placeholder="Escribe la referencia del producto">

		<label for="precio">Precio:</label>
		<input class="form-control" name="precio" required type="number" id="precio" placeholder="Precio de venta">

		<label for="peso">Peso:</label>
		<input class="form-control" name="peso" required type="number" id="peso" placeholder="peso">

		<label for="categoria">categoria:</label>
		<input class="form-control" name="categoria" required type="text" id="categoria" placeholder="Escribe la categoria del producto">

		<label for="stock">Stock:</label>
		<input class="form-control" name="stock" required type="text" id="stock" placeholder="Existencia del producto">

		
		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "pie.php" ?>