
# Cafetería - Sistema de ventas -  con PHP y MySQL   

# Instalar Xamp 7.4.6 


1. Coloca el código fuente en tu carpeta pública (htdocs por ejemplo)

  

2. En phpmyadmin por ejemplo se puede ejecutar el SQL que está en el archivo db_cafeteria.sql 
   el cual crea la base de datos y carga datos de prueba.

3. En el archivo conexion.php se encuentra la configuración de la Conexión a base de datos   

4. Ya se puede probar el aplicativo.


# Funcionamiento del Aplicativo

1.- Al cargar el aplicativo de la Cafetería, por defecto carga del modulo de Productos que se encuentra en la parte de arriba el cual muestra la lista de los productos.
    
    1.1- Aquí está la opción de Crear con el botón (+ Nuevo), la cual lleva al formulario de creación de los productos que en la parte de abajo tiene el botón de guardar y los campos son obligatorios.

    1.2- En el listado de productos además de la información de cada producto esta el botón de modificar o eliminar el producto que se requiera.

2.- El segundo modulo en la parte de arriba es el modulo de Ventas
    
    2.1- Aquí está la opción de Crear una nueva venta con el botón (+ Nueva), la cual lleva al formulario de carga de los productos que se van a vender, en el cual se coloca el id del producto y se da cli en enter para cargarlo o si no tienes existencias generar un mensaje de producto agotado, si hay existencias del producto como minimo una carga la información de este y en Cantidad tiene la opción de colocar el parametro de Cantidad que se requiera el cual por defecto esta en 1, al cambiar la cantidad se da clic en la tecla Enter para actualizar la cantidad y se pueden cargar mas productos en la venta con el mismo procedimiento.
    Una vez se termine se puede dar cli en el botón (Finalizar Venta) o Cancelar Venta o en caso de que haya un producto mal cargado se puede dar clic en la opción al lado derecho de cada  producto con el botón (Quitar).
    Cuando se da clic en el botón Finalizar Venta se descuentan las cantidades que se hayan cargado del stock de los productos.

    2.2- En el listado de las ventas está la información de los productos vendidos y la opción de imprimir la cuenta o eliminarla.



