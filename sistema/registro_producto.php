 <?php include_once "includes/header.php";
  include "../conexion.php";
  if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['proveedor']) || empty($_POST['producto']) || empty($_POST['precio']) || $_POST['precio'] <  0 || empty($_POST['cantidad'] || $_POST['cantidad'] <  0)) {
      $alert = '<div class="alert alert-danger" role="alert">
                Todo los campos son obligatorios
              </div>';
    } else {
      $proveedor = $_POST['proveedor'];
      $producto = $_POST['producto'];
      $precio = $_POST['precio'];
      $cantidad = $_POST['cantidad'];
      $usuario_id = $_SESSION['idUser'];

      $query_insert = mysqli_query($conexion, "INSERT INTO producto(proveedor,descripcion,precio,existencia,usuario_id) values ('$proveedor', '$producto', '$precio', '$cantidad','$usuario_id')");
      if ($query_insert) {
        $alert = '<div class="alert alert-primary" role="alert">
                Producto Registrado
              </div>';
      } else {
        $alert = '<div class="alert alert-danger" role="alert">
                Error al registrar el producto
              </div>';
      }
    }
  }
  ?>

 <!-- Contenido de la página de inicio -->
 <div class="container-fluid">
   <!-- Encabezado de página -->
   <div class="d-sm-flex align-items-center justify-content-between mb-1"> <br> 
      <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-box fa-fw"></i>&nbsp;REGISTRAR NUEVOS DATOS DEL PRODUCTO</h1>
      <a href="lista_productos.php" class="btn btn-info"> <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;REGRESAR</a>
   </div>
   <!-- Fila de contenido -->
   <div class="row">
     <div class="col-lg-6 m-auto">
        <div class="card" style="background-color:#022424;">
          <form action="" method="post" autocomplete="off" class="card-body p-4">
            <?php echo isset($alert) ? $alert : ''; ?>
            <div class="form-group">
              <label>PROVEEDOR</label>
              <?php
                $query_proveedor = mysqli_query($conexion, "SELECT codproveedor, proveedor FROM proveedor ORDER BY proveedor ASC");
                $resultado_proveedor = mysqli_num_rows($query_proveedor);
                mysqli_close($conexion);
                ?>
              <select id="proveedor" name="proveedor" class="form-control">
                <?php
                  if ($resultado_proveedor > 0) {
                    while ($proveedor = mysqli_fetch_array($query_proveedor)) {
                      // code...
                  ?>
                    <option value="<?php echo $proveedor['codproveedor']; ?>"><?php echo $proveedor['proveedor']; ?></option>
                <?php
                    }
                  }
                  ?>
              </select>
            </div>
            <div class="form-group">
              <label for="producto">PRODUCTO</label>
              <input type="text" placeholder="Ingrese nombre del producto" name="producto" id="producto" class="form-control">
            </div>
            <div class="form-group">
              <label for="precio">PRECIO</label>
              <input type="text" placeholder="Ingrese precio" class="form-control" name="precio" id="precio">
            </div>
            <div class="form-group">
              <label for="cantidad">CANTIDAD</label>
              <input type="number" placeholder="Ingrese cantidad" class="form-control" name="cantidad" id="cantidad">
            </div>
                <div class="col-md-12" align="center" style="background-color:#022424;">
                  <i class="fas fa-save"></i></i>&nbsp;<input type="submit"  value="GUARDAR DATOS DEL PRODUCTO" class="btn btn-outline-success"> &nbsp;
                  &nbsp;<a href="lista_productos.php" class="btn btn-outline-info">VER LISTA PRODUCTOS</a>
                </div>     
          </form>
        </div>
     </div>
   </div> <br>


 </div>
 <!-- /.contenedor-líquido -->

 </div>
 <!-- Fin del contenido principal -->
 <?php include_once "includes/footer.php"; ?>