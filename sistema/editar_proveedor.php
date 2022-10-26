<?php
include "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
  $alert = "";
  if (empty($_POST['proveedor']) || empty($_POST['contacto']) || empty($_POST['telefono']) || empty($_POST['direccion'])) {
    $alert = '<p class"msg_error">Todo los campos son requeridos</p>';
  } else {
    $idproveedor = $_GET['id'];
    $proveedor = $_POST['proveedor'];
    $contacto = $_POST['contacto'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    $sql_update = mysqli_query($conexion, "UPDATE proveedor SET proveedor = '$proveedor', contacto = '$contacto' , telefono = $telefono, direccion = '$direccion' WHERE codproveedor = $idproveedor");

    if ($sql_update) {
      $alert = '<p class"msg_save">Proveedor Actualizado correctamente</p>';
    } else {
      $alert = '<p class"msg_error">Error al Actualizar el Proveedor</p>';
    }
  }
}
// Mostrar Datos

if (empty($_REQUEST['id'])) {
  header("Location: lista_proveedor.php");
  mysqli_close($conexion);
}
$idproveedor = $_REQUEST['id'];
$sql = mysqli_query($conexion, "SELECT * FROM proveedor WHERE codproveedor = $idproveedor");
mysqli_close($conexion);
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
  header("Location: lista_proveedor.php");
} else {
  while ($data = mysqli_fetch_array($sql)) {
    $idproveedor = $data['codproveedor'];
    $proveedor = $data['proveedor'];
    $contacto = $data['contacto'];
    $telefono = $data['telefono'];
    $direccion = $data['direccion'];
  }
}
?>
<!-- Contenido de la página de inicio -->
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-6 m-auto">
      <div class="card">
              <div class="card-header text-info" align="center" style="background-color:#022424;"> <!--bg-dark -->
                <i class="fas fa-child fa-fw"></i>&nbsp;MODIFICAR DATOS DEL PROVEEDOR
              </div>
          <div class="card-body" style="background-color:#022424;">  
            <form class="" action="" method="post" >
            <?php echo isset($alert) ? $alert : ''; ?>
              <input type="hidden" name="id" value="<?php echo $idproveedor; ?>">
              <div class="form-group">
                <label for="proveedor">PROVEEDOR</label>
                <input type="text" placeholder="Ingrese proveedor" name="proveedor" class="form-control" id="proveedor" value="<?php echo $proveedor; ?>">
              </div>
              <div class="form-group">
                <label for="nombre">CCONTACTO</label>
                <input type="text" placeholder="Ingrese contacto" name="contacto" class="form-control" id="contacto" value="<?php echo $contacto; ?>">
              </div>
              <div class="form-group">
                <label for="telefono">TELEFONO</label>
                <input type="number" placeholder="Ingrese Teléfono" name="telefono" class="form-control" id="telefono" value="<?php echo $telefono; ?>">
              </div>
              <div class="form-group">
                <label for="direccion">DIRECCION</label>
                <input type="text" placeholder="Ingrese Direccion" name="direccion" class="form-control" id="direccion" value="<?php echo $direccion; ?>">
              </div>
              <div class="col-md-12" align="center" style="background-color:#022424;">
              <i class="fas fa-user-edit"></i>&nbsp;<input type="submit" value="ACTUALIZAR DATOS PROVEEDOR" class="btn btn-outline-success">&nbsp;
              &nbsp;<a href="lista_proveedor.php" class="btn btn-outline-info">CANCELAR</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>