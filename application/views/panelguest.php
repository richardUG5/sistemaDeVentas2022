<div class="container">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="<?php echo base_url(); ?>img/dana.png" alt="" width="250" height="150">
      <img class="d-block mx-auto mb-4" src="<?php echo base_url(); ?>img/welcome.png" alt="" width="500" height="150">

<div class="row">
  <div class="col-md-12" >
    <font color="black">
      <h1 style="background-color:darkcyan;" style="color:darkcyan;" style="text-align:center">PANEL DE INVITADOS</h1>
    </font>
  </div>
</div>
      
    </div> 
  </main>

  <?php echo form_open_multipart('usuarios/logout'); ?>
    <button type="submit" name="buton3" class="btn btn-primary" >CERRAR SESSION</button>
  <?php echo form_close(); ?>

  <h1>Login: <?php echo $this->session->userdata('login'); ?></h1>
  <h1>Tipo: <?php echo $this->session->userdata('tipo'); ?></h1>
  <h1>ID: <?php echo $this->session->userdata('idusuario'); ?></h1>
  
<!--
  <footer class="my-5 pt-5 text-muted text-center text-small">
    <div class="row">
        <div class="col-md-12" >
          <font color="darkcyan">
<p class="mb-1">Realizado por: Richard Ugarte Garcia &copy; Sistemas 2022</p>

          </font>
        </div>
    </div>
  </footer> ----------- -->
</div>