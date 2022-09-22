<div class="container">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="<?php echo base_url(); ?>img/bootstrap-logo.svg" alt="" width="72" height="57">
      <h2>Panel de Invitados</h2>      
    </div> 
  </main>

  <?php echo form_open_multipart('usuarios/logout'); ?>
    <button type="submit" name="buton3" class="btn btn-primary" >CERRAR SESSION</button>
  <?php echo form_close(); ?>

  <h1>Login: <?php echo $this->session->userdata('login'); ?></h1>
  <h1>Tipo: <?php echo $this->session->userdata('tipo'); ?></h1>
  <h1>ID: <?php echo $this->session->userdata('idusuario'); ?></h1>
  

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">Sistemas &copy; 2022 Richard Ugarte Garcia</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>