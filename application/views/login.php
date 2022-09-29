 <main>
    <div class="py-1 text-center">
      <img class="d-block mx-auto mb-4" src="<?php echo base_url(); ?>img/login000.png" alt="" width="200" height="200">
      <img class="d-block mx-auto mb-4" src="<?php echo base_url(); ?>img/login01.png" alt="" width="450" height="100">

<!--        <div class="col-md-12" >
          <font color="black">
            <h2 style="background-color:darkcyan;" style="color:yellowgreen;" style="text-align:center">LOGIN DE USUARIOS</h2>
          </font> 
        </div> -->

    </div>
  </main>

<div class="container" style="background-color:#022424;" style="color:darkcyan;" style="text-align:center">
 
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

<div class="py-3 text-center" style="text-align:center" >
  <h1 class="text-white-50"><?php echo $mensaje; ?> </h1>
  <!-- <h1 class="text-danger"><?php // echo vermensaje($msg); ?> </h1> -->
</div>

<?php
  echo form_open_multipart('usuarios/validar', array('id'=>'form1','class'=>'form-control'));
?>

  <div class="col-sm-12 mb-3 " style="background-color:#022424;" style="color:darkcyan;" style="text-align:center">
    <!-- <label class="form-label"> <img class="d-block mx-auto mb-1" src="<?php // echo base_url(); ?>img/login02.png" alt="" width="150" height="50"></label> -->
    <font color="darkcyan">
      <label class="col-form-label label-align" for="NOMBRE"> <i class="fas fa-user"></i> USER: </label>
    </font>
    <input type="text" class="form-control" name="login" placeholder="Ingrese su login" required style="background-color:#BDC5C5;" style="color:blue;" style="text-align:center">  
  </div>

  <div class="col-sm-12 mb-3" style="background-color:#022424;" style="color:darkcyan;" style="text-align:center">
    <font color="darkcyan">
      <label class="col-form-label label-align" for="NOMBRE"> <i class="fas fa-dollar-sign"></i> PASSWORD: </label>
    </font>
    <input type="password" class="form-control" name="password" placeholder="Ingrese su password" required style="background-color:#BDC5C5;" style="color:navajowhite;" style="text-align:center" > <i class="fas fa-dollar-sign"></i>
  </div>

  <div class="py-3 text-center" style="background-color:#022424;" style="color:darkcyan;" style="text-align:center">
    <?php echo form_open_multipart('empleado/agregar'); ?> <!--aqui cambiar a producto empleado -->
     <button type="submit" class="btn btn-outline-info" style="background-color:black;"> INGRESAR AL SISTEMA <i class="icon-lock5"></i> </button>

<!--     <button type="submit" name="iniciarsession" class="btn btn-outline-primary"  ><img class="d-block mx-auto mb-1" src="<?php //echo base_url(); ?>img/iniciar2.png" alt="" width="150" height="40"> </button> -->

    <?php echo form_close(); ?>
  </div>

<?php
  echo form_close();
?>
<div>
  <h1 style="background-color:#022424;" style="color:#022424;" style="text-align:center"> <i class="icon-lock5"></i>H </h1>
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