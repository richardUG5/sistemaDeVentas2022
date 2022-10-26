<?php
include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['proveedor']) || empty($_POST['contacto']) || empty($_POST['telefono']) || empty($_POST['direccion'])) {
        $alert = '<div class="alert alert-danger" role="alert">
                        Todo los campos son obligatorios
                    </div>';
    } else {
        $proveedor = $_POST['proveedor'];
        $contacto = $_POST['contacto'];
        $telefono = $_POST['telefono'];
        $Direccion = $_POST['direccion'];
        $usuario_id = $_SESSION['idUser'];
        $query = mysqli_query($conexion, "SELECT * FROM proveedor where contacto = '$contacto'");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        El Ruc ya esta registrado
                    </div>';
        }else{
        

        $query_insert = mysqli_query($conexion, "INSERT INTO proveedor(proveedor,contacto,telefono,direccion,usuario_id) values ('$proveedor', '$contacto', '$telefono', '$Direccion','$usuario_id')");
        if ($query_insert) {
            $alert = '<div class="alert alert-primary" role="alert">
                        Proveedor Registrado
                    </div>';
        } else {
            $alert = '<div class="alert alert-danger" role="alert">
                       Error al registrar proveedor
                    </div>';
        }
        }
    }
}
mysqli_close($conexion);
?>

<!-- Contenido de la página de inicio -->
<div class="container-fluid" >
    <!-- Fila de contenido -->
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card-header text-info" align="center" style="background-color:#022424;"> <!--bg-dark -->
            <i class="fas fa-user-plus"></i>&nbsp;REGISTRAR NUEVOS DATOS DEL PROVEEDOR
            </div>
            <div class="card" style="background-color:#022424;">
                <form action="" autocomplete="off" method="post" class="card-body p-4">
                    <?php echo isset($alert) ? $alert : ''; ?>
                    <div class="form-group">
                        <label for="nombre">NOMBRE</label>
                        <input type="text" placeholder="Ingrese nombre" name="proveedor" id="nombre" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="contacto">NOMBRE CONTACTO</label>
                        <input type="text" placeholder="Ingrese nombre del contacto" name="contacto" id="contacto" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="telefono">TELÉFONO</label>
                        <input type="number" placeholder="Ingrese teléfono" name="telefono" id="telefono" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="direccion">DIRECIÓN</label>
                        <input type="text" placeholder="Ingrese Direccion" name="direccion" id="direcion" class="form-control">
                    </div>
                        <div class="col-md-12" align="center" style="background-color:#022424;">
                        <i class="fas fa-user-edit"></i>&nbsp;<input type="submit" value="GUARDAR DATOS DEL PROVEEDOR" class="btn btn-outline-success">&nbsp;
                        &nbsp;<a href="lista_proveedor.php" class="btn btn-outline-info">REGRESAR</a>
                    </div>
                </form> 
            </div> <br>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>