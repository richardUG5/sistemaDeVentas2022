<?php include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombre']) || empty($_POST['correo']) || empty($_POST['usuario']) || empty($_POST['clave']) || empty($_POST['rol'])) {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todo los campos son obligatorios
                </div>';
    } else {

        $nombre = $_POST['nombre'];
        $email = $_POST['correo'];
        $user = $_POST['usuario'];
        $clave = md5($_POST['clave']);
        $rol = $_POST['rol'];

        $query = mysqli_query($conexion, "SELECT * FROM usuario where correo = '$email'");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        El correo ya existe
                    </div>';
        } else {
            $query_insert = mysqli_query($conexion, "INSERT INTO usuario(nombre,correo,usuario,clave,rol) values ('$nombre', '$email', '$user', '$clave', '$rol')");
            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                            Usuario registrado
                        </div>';
            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar
                    </div>';
            }
        }
    }
}
?>

<!-- Contenido de la página de inicio -->
<div class="container-fluid" >
    <!-- Encabezado de página -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2"> <br> 
        <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-user-tie fa-fw"></i>&nbsp;GESTION DE USUARIOS</h1>
        <a href="lista_usuarios.php" class="btn btn-info"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;REGRESAR</a>
    </div>

    <!-- Fila de contenido -->
    <div class="row">
        <div class="col-lg-6 m-auto" >
            <div class="card-header text-info" align="center" style="background-color:#022424;"> <!--bg-dark -->
            <i class="fas fa-user-tie fa-fw"></i>&nbsp;REGISTRAR NUEVOS DATOS DEL USUARIO
            </div>
            <div class="card" style="background-color:#022424;">
            <form action="" method="post" autocomplete="off" class="card-body p-4">
                <?php echo isset($alert) ? $alert : ''; ?>
                <div class="form-group">
                    <label for="nombre">NOMBRE</label>
                    <input type="text" class="form-control" placeholder="Ingrese Nombre" name="nombre" id="nombre">
                </div>
                <div class="form-group">
                    <label for="correo">CORREO</label>
                    <input type="email" class="form-control" placeholder="Ingrese Correo Electrónico" name="correo" id="correo">
                </div>
                <div class="form-group">
                    <label for="usuario">USUARIO</label>
                    <input type="text" class="form-control" placeholder="Ingrese Usuario" name="usuario" id="usuario">
                </div>
                <div class="form-group">
                    <label for="clave">CONTRASEÑA</label>
                    <input type="password" class="form-control" placeholder="Ingrese Contraseña" name="clave" id="clave">
                </div>
                <div class="form-group">
                    <label>TIPO/ROL</label>
                    <select name="rol" id="rol" class="form-control">
                        <?php
                        $query_rol = mysqli_query($conexion, " select * from rol");
                        mysqli_close($conexion);
                        $resultado_rol = mysqli_num_rows($query_rol);
                        if ($resultado_rol > 0) {
                            while ($rol = mysqli_fetch_array($query_rol)) {
                        ?>
                                <option value="<?php echo $rol["idrol"]; ?>"><?php echo $rol["rol"] ?></option>
                        <?php

                            }
                        }

                        ?>
                    </select>
                </div>
                    <div class="col-md-12" align="center" style="background-color:#022424;">
                        <i class="fas fa-user-tie fa-fw"></i>&nbsp;<input type="submit" value="GUARDAR USUARIO" class="btn btn-outline-success">&nbsp;
                        <a href="lista_usuarios.php" class="btn btn-outline-info"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;REGRESAR</a>
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