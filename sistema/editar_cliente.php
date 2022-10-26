<?php include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
  $alert = "";
  if (empty($_POST['nombre']) || empty($_POST['telefono']) || empty($_POST['direccion'])) {
    $alert = '<p class"error">Todo los campos son requeridos</p>';
  } else {
    $idcliente = $_POST['id'];
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    $result = 0;
    if (is_numeric($dni) and $dni != 0) {

      $query = mysqli_query($conexion, "SELECT * FROM cliente where (dni = '$dni' AND idcliente != $idcliente)");
      $result = mysqli_fetch_array($query);
      $resul = mysqli_num_rows($query);
    }

    if ($resul >= 1) {
      $alert = '<p class"error">El dni ya existe</p>';
    } else {
      if ($dni == '') {
        $dni = 0;
      }
      $sql_update = mysqli_query($conexion, "UPDATE cliente SET dni = $dni, nombre = '$nombre' , telefono = '$telefono', direccion = '$direccion' WHERE idcliente = $idcliente");

      if ($sql_update) {
        $alert = '<p class"exito">DATOS DEL CLIENTE ACTUALIZADO CORRECTAMENTE</p>';
      } else {
        $alert = '<p class"error">Error al Actualizar el Cliente</p>';
      }
    }
  }
}
// Mostrar Datos

if (empty($_REQUEST['id'])) {
  header("Location: lista_cliente.php");
}
$idcliente = $_REQUEST['id'];
$sql = mysqli_query($conexion, "SELECT * FROM cliente WHERE idcliente = $idcliente");
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
  header("Location: lista_cliente.php");
} else {
  while ($data = mysqli_fetch_array($sql)) {
    $idcliente = $data['idcliente'];
    $dni = $data['dni'];
    $nombre = $data['nombre'];
    $telefono = $data['telefono'];
    $direccion = $data['direccion'];
  }
}
?>
        <!-- Contenido de la página de inicio -->
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6 m-auto">
              <div class="card-header text-info" align="center" style="background-color:#022424;"> <!--bg-dark -->
                <i class="fas fa-child fa-fw"></i>&nbsp;MODIFICAR DATOS DEL CLIENTE
              </div>
              <div class="card-body" style="background-color:#022424;">
                <form class="" action="" method="post" class="card-body p-4">
                  <?php echo isset($alert) ? $alert : ''; ?>
                  <input type="hidden" name="id" value="<?php echo $idcliente; ?>">
                  <div class="form-group">
                    <label for="dni">CI/NIT</label>
                    <input type="number" placeholder="Ingrese dni" name="dni" id="dni" class="form-control" value="<?php echo $dni; ?>">
                  </div>
                  <div class="form-group">
                    <label for="nombre">NOMBRE</label>
                    <input type="text" placeholder="Ingrese Nombre" name="nombre" class="form-control" id="nombre" value="<?php echo $nombre; ?>">
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
                      <button type="submit" class="btn btn-outline-success"><i class="fas fa-user-edit"></i>&nbsp;ACTUALIZAR DATOS CLIENTE</button>&nbsp;
                      <a href="lista_cliente.php" class="btn btn-outline-info"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;VER LISTA</a>&nbsp;
                      <a href="lista_cliente.php" class="btn btn-outline-info"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;CANCELAR</a>
                    </div>
                </form> <br>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <?php include_once "includes/footer.php"; ?>