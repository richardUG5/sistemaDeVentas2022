<div class="container">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="<?php echo base_url(); ?>img/bootstrap-logo.svg" alt="" width="72" height="57">
      <h2>Login de Usuarios</h2>      
    </div>
  </main>

<?php
// llevar a un helper recomendable por el ing.
  switch ($msg) 
  {
    case '1':
      $mensaje="Gracias por usar el sistema";
      break;
    case '2':
      $mensaje="Usuario no identificado";
      break;
    case '3':
      $mensaje="Acceso no válido, Favor inicie sesión";
      break;

    default:
      $mensaje="Saliendo......";
      break;
  }
?>

<h1 class="text-danger"><?php echo $mensaje; ?> </h1>
<!-- <h1 class="text-danger"><?php // echo vermensaje($msg); ?> </h1> -->

<?php
  echo form_open_multipart('usuarios/validar', array('id'=>'form1','class'=>'form-control'));
?>
  
<div class="col-sm-12 mb-3">
  <label class="form-label">Login:</label>
  <input type="text" class="form-control" name="login" placeholder="Ingrese su login" required>  
</div>

<div class="col-sm-12 mb-3">
  <label class="form-label">Password:</label>
  <input type="password" class="form-control" name="password" placeholder="Ingrese su password" required>  
</div>

<button class="w-100 btn btn-primary" type="submit">INGRESAR</button>

<?php
  echo form_close();
?>

 
<footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">Realizado por: Richard Ugarte Garcia &copy; Sistemas 2022</p>
  </footer>
  
</div>