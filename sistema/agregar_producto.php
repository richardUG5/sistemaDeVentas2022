<?php
include_once "includes/header.php";
include "../conexion.php";
// Validar producto

if (empty($_REQUEST['id'])) {
    header("Location: lista_productos.php");
} else {
    $id_producto = $_REQUEST['id'];
    if (!is_numeric($id_producto)) {
        header("Location: lista_productos.php");
    }
    $query_producto = mysqli_query($conexion, "SELECT codproducto, descripcion, proveedor, precio, existencia FROM producto WHERE codproducto = $id_producto");
    $result_producto = mysqli_num_rows($query_producto);

    if ($result_producto > 0) {
        $data_producto = mysqli_fetch_assoc($query_producto);
    } else {
        header("Location: lista_productos.php");
    }
}
// Agregar Productos a entrada
if (!empty($_POST)) {
    $alert = "";
    if (!empty($_POST['cantidad']) || !empty($_POST['precio']) || !empty($_POST['producto_id'])) {
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
        $producto_id = $_GET['id'];
        $usuario_id = $_SESSION['idUser'];
        $query_insert = mysqli_query($conexion, "INSERT INTO entradas(codproducto,cantidad,precio,usuario_id) VALUES ($producto_id, $cantidad, $precio, $usuario_id)");
        if ($query_insert) {
            // ejecutar procedimiento almacenado
            $query_upd = mysqli_query($conexion, "CALL actualizar_precio_producto($cantidad,$precio,$producto_id)");
            $result_pro = mysqli_num_rows($query_upd);
            if ($result_pro > 0) {
                $alert = '<div class="alert alert-primary" role="alert">
                        Producto actualizado con exito
                    </div>';
            }
        } else {
            echo "error";
        }
        mysqli_close($conexion);
    } else {
        echo "error";
    }
}
?>

<!-- Contenido de la página de inicio -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-1"> <br> 
      <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-box fa-fw"></i>&nbsp;AGREGAR NUEVOS DATOS DEL PRODUCTO PRECIO Y CANTIDAD</h1>
      <a href="lista_productos.php" class="btn btn-info"> <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;REGRESAR</a>
   </div>
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card" style="background-color:#022424;">
                <form action="" method="post" class="card-body p-4">
                    <?php echo isset($alert) ? $alert : ''; ?>
                    <div class="form-group">
                        <label for="precio">PRECIO ACTUAL</label>
                        <input type="number" class="form-control" value="<?php echo $data_producto['precio']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="precio">CANTIDAD DE PRODUCTOS DISPONIBLES</label>
                        <input type="number" class="form-control" value="<?php echo $data_producto['existencia']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="precio">NUEVO PRECIO</label>
                        <input type="number" placeholder="Ingrese nombre del precio" name="precio" class="form-control" value="<?php echo $data_producto['precio']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="cantidad">AGREGAR CANTIDAD</label>
                        <input type="number" placeholder="Ingrese cantidad" name="cantidad" id="cantidad" class="form-control">
                    </div>
                    <div class="col-md-12" align="center" style="background-color:#022424;">
                    <i class="fas fa-save"></i></i>&nbsp;<input type="submit" value="GUARDAR DATOS DEL PRODUCTO" class="btn btn-outline-success">&nbsp;
                        <a href="lista_productos.php" class="btn btn-outline-info">VER LISTA PRODUCTOS</a>
                    </div>
                </form>
            </div>
        </div> 
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>