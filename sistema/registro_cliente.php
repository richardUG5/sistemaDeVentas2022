<?php include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombre']) || empty($_POST['telefono']) || empty($_POST['direccion'])) {
        $alert = '<div class="alert alert-danger" role="alert">
                                    Todo los campos son obligatorio
                                </div>';
    } else {
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $usuario_id = $_SESSION['idUser'];

        $result = 0;
        if (is_numeric($dni) and $dni != 0) {
            $query = mysqli_query($conexion, "SELECT * FROM cliente where dni = '$dni'");
            $result = mysqli_fetch_array($query);
        }
        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                                    El dni ya existe
                                </div>';
        } else {
            $query_insert = mysqli_query($conexion, "INSERT INTO cliente(dni,nombre,telefono,direccion, usuario_id) values ('$dni', '$nombre', '$telefono', '$direccion', '$usuario_id')");
            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                                    CLIENTE REGISTRADO CORRECTAMENTE
                                </div>';
            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                                    Error al Guardar
                            </div>';
            }
        }
    }
    mysqli_close($conexion);
}
?>

<!-- Contenido de la página de inicio -->
<div class="container-fluid"> 
    <!-- Encabezado de página -->
    <div class="d-sm-flex align-items-center justify-content-between mb-1"> <br> 
      <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-box fa-fw"></i>&nbsp;REGISTRAR NUEVOS DATOS DEL CLIENTE</h1>
      <a href="lista_cliente.php" class="btn btn-info"> <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;REGRESAR</a>
   </div>
    <!-- Fila de contenido -->
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card" style="background-color:#022424;">
                <form action="" method="post" autocomplete="off" class="card-body p-4">
                    <?php echo isset($alert) ? $alert : ''; ?>
                    <div class="form-group">
                        <label for="dni">NIT/CI</label>
                        <input type="number" placeholder="Ingrese ci o nit" name="dni" id="dni" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nombre">NOMBRE</label>
                        <input type="text" placeholder="Ingrese Nombre" name="nombre" id="nombre" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="telefono">TELEFONO</label>
                        <input type="number" placeholder="Ingrese Teléfono" name="telefono" id="telefono" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="direccion">DIRECCIÓN</label>
                        <input type="text" placeholder="Ingrese Direccion" name="direccion" id="direccion" class="form-control">
                    </div>
                    <div class="col-md-12" align="center" style="background-color:#022424;">
                        <i class="fas fa-user-edit"></i>&nbsp;<input type="submit" value="GUARDAR DATOS DEL CLIENTE" class="btn btn-outline-success">&nbsp;
                        <a href="lista_cliente.php" class="btn btn-outline-info"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;VER LISTA CLIENTES</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>
<!-- /.contenedor-líquido -->

</div>
<!--Fin del contenido principal -->
<?php include_once "includes/footer.php"; ?>