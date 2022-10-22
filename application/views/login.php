<main>
  <div class="py-1 text-center">
    <img class="d-block mx-auto mb-4" src="<?php echo base_url(); ?>img/login000.png" alt="" width="200" height="200">
    <img class="d-block mx-auto mb-4" src="<?php echo base_url(); ?>img/login01.png" alt="" width="450" height="100">
  </div>
</main>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-xl-5 col-lg-12 col-md-9">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <div class="row">
            <div class="col-lg-12">
              <img class="d-block mx-auto mb-1" src="<?php echo base_url(); ?>img/logoy.gif" alt="" width="250" height="100">

              <!--<div class="p-5" style="background-image: url(sisWebComVentas/img/logoy.gif)"> -->



 
            <?php
            // llevar a un helper lo mas recomendable por el ing.
              switch ($msg) 
              {
                case '1':
                  $mensaje="Gracias por usar el sistema";
                  break;
                case '2':
                  $mensaje="Usuario no identificado";
                  break;
                case '3':
                  $mensaje="Acceso no válido - Favor inicie sesión";
                  break;

                default:
                  $mensaje="";
                  break;
              }
            ?>

              <div class="py-5 text-center" style="text-align:center" >
                <h3 class="text-white-50"><?php echo $mensaje; ?> </h3>
              </div>

            <?php
              echo form_open_multipart('usuarios/validar', array('id'=>'form1','class'=>'form-control'));
            ?>

              <div class="col-sm-12 mb-1 " style="background-color:#022424;" style="color:darkcyan;" style="text-align:center">
                <div align="center">
                  <label class="form-label"> <img class="d-block mx-auto mb-1" src="<?php echo base_url(); ?>img/login01.png" alt="" width="mx-auto" height="mx-auto"></label>
                </div>
                <div class="py-1 text-center" style="text-align:center">
                  <font color="darkcyan">
                    <h2 style="background-color:#022424;" style="color:yellowgreen;" style="text-align:center">LOGIN DE USUARIOS</h2>
                  </font> 
                  </div> 
                <div style="background-color:#00FFFF;">
                  <hr class="sidebar-divider my-2">
                </div>
                <div class="col-sm-12 mb-1" class="form-group text-white">
                  <font color="orange">
                    <label for="NOMBRE"> <i class="fas fa-user"></i> NOMBRE USUARIO: </label>
                  </font>
                </div>
                <input type="text" class="form-control" name="login" placeholder="Ingrese su login" required style="background-color:#BDC5C5;" style="color:blue;" style="text-align:center">  
              </div>

              <div class="col-sm-12 mb-1" style="background-color:#022424;" style="color:darkcyan;" style="text-align:center">
                <font color="orange">
                  <label class="col-form-label label-align" for="NOMBRE"> <i class="fas fa-dollar-sign"></i> CONTRASEÑA: </label>
                </font>
                <div class="input-group">
                  <input type="password" class="form-control" name="password" placeholder="Ingrese su password" required style="background-color:#BDC5C5;" style="color:navajowhite;" style="text-align:center" > <i class="fas fa-dollar-sign"></i>
                </div>

                <div class="py-1 text-center" style="background-color:#022424;" style="color:darkcyan;" style="text-align:center">
                  <?php echo form_open_multipart('empleado/agregar'); ?> <!--aqui cambiar a producto empleado -->
                  <div class="col-md-12" align="center" style="background-color:dark;">
                    <button type="submit" class="btn btn-outline-info" style="background-color:black;"> INGRESAR AL SISTEMA </button>
                  </div>
                  <?php echo form_close(); ?>
                </div>

                  <?php
                    echo form_close();
                  ?>    
              </div> <br>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<footer class="my-5 pt-5 text-muted text-center text-small">
  <div class="row">
    <div class="col-md-12" >
      <font color="#022424">
        <p class="mb-1">Realizado por: Richard Ugarte Garcia &copy; Sistemas 2022</p>
      </font>
    </div>
  </div>
</footer>