<?php
$alert = '';
session_start();
if (!empty($_SESSION['active'])) {
  header('location: sistema/');
} else {
  if (!empty($_POST)) {
    if (empty($_POST['usuario']) || empty($_POST['clave'])) {
      $alert = '<div class="alert alert-danger" role="alert">
  Ingrese su usuario y su clave
</div>';
    } else {
      require_once "conexion.php";
      $user = mysqli_real_escape_string($conexion, $_POST['usuario']);
      $clave = md5(mysqli_real_escape_string($conexion, $_POST['clave']));
      $query = mysqli_query($conexion, "SELECT u.idusuario, u.nombre, u.correo,u.usuario,r.idrol,r.rol FROM usuario u INNER JOIN rol r ON u.rol = r.idrol WHERE u.usuario = '$user' AND u.clave = '$clave'");
      mysqli_close($conexion);
      $resultado = mysqli_num_rows($query);
      if ($resultado > 0) {
        $dato = mysqli_fetch_array($query);
        $_SESSION['active'] = true;
        $_SESSION['idUser'] = $dato['idusuario'];
        $_SESSION['nombre'] = $dato['nombre'];
        $_SESSION['email'] = $dato['correo'];
        $_SESSION['user'] = $dato['usuario'];
        $_SESSION['rol'] = $dato['idrol'];
        $_SESSION['rol_name'] = $dato['rol'];
        header('location: sistema/');
      } else {
        $alert = '<div class="alert alert-danger" role="alert">
              Usuario o Contraseña Incorrecta
            </div>';
        session_destroy();
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistema Web RUG </title>

  <!-- Custom fonts for this template-->
  <link href="sistema/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="sistema/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<br><br>

<body background="logo2.gif"> <!-- poner adentro de body  cambie esto--  class="bg-gradient-dark" -->

  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-5 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -----crea imagen en cuadro con div
              <div class="col-lg-6 d-none d-lg-block bg-gradient-dark"> <-- bg-login-image
              <img src="sistema/img/login.gif" class="img-thumbnail"> <-- cambio de imagen 
              </div>

<div class="col-md-5 img-anim" data-aos="fade-up" data-aos-duration="3200">
  <img alt="wrapkit" class="img-fluid" src="http://localhost/Abacom/assets/images/landing/l8/Globo.png" style="height: 50%; width: auto;"/>
</div>



          -->
            <div class="row">                            
              <div class="col-lg-12"> <!-- para alinear todo al cuadro -->
                <div class="p-5" style="background-image: url(sistema/img/logo2.gif)">
                  <!--  <img src="sistema/img/login.gif" class="img-thumbnail">  funciona-->
                  <div class="text-center">                    
                    <img src="sistema/img/login1.gif" class="img-thumbnail"> 
                    <div style="background-color:#022424;">
								      <hr class="sidebar-divider my-2">
							      </div>
                    <h1 class="h4 text-gray-600 mb-2"><i class="fas fa-user"></i>L O G I N</h1>
                    <div style="background-color:#00FFFF;">
								      <hr class="sidebar-divider my-2">
							      </div>
                  </div>
                  <form class="user" method="POST" style="background-image: url(sistema/img/logo0.gif)">
                    <?php echo isset($alert) ? $alert : ""; ?>
                    <div class="form-group text-white">
                      <label for="">NOMBRE USUARIO</label>
                      <input type="text" class="form-control" placeholder="Ingrese usuario" name="usuario">
                    </div>
                    <div style="background-color:#00FFFF;">
								      <hr class="sidebar-divider my-2">
							      </div>
                    <div class="form-group">
                      <label for="">CONTRASEÑA</label>
                      <input type="password" class="form-control" placeholder="Ingrese contraseña" name="clave">
                    </div>
                    <div style="background-color:#00FFFF;">
								      <hr class="sidebar-divider my-2">
							      </div>
                    <div class="form-group" class="col-md-12" align="center">
                      <input type="submit" value="INICIAR SESSION" class="btn btn-info">
                    </div>
                    
                  </form>
                  <hr>
                </div>
              </div>
            </div>          
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="sistema/vendor/jquery/jquery.min.js"></script>
  <script src="sistema/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="sistema/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="sistema/js/sb-admin-2.min.js"></script>

</body>

</html>