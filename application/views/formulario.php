
<div class="container">
  <div class="row">
    <div class="col-md-12">

      <font color="teal">
        <h2>AGREGAR EMPLEADO</h2>
      </font> 

      <?php echo form_open_multipart('empleado/agregarbd'); ?>

      <br>
      <input type="text" name="Nombre" placeholder="Ingrese su nombre" required> <br><br>
      <input type="text" name="Apellidos" placeholder="Ingrese sus apellidos" required> <br><br>
      <input type="text" name="Telefono" placeholder="Ingrese su telefono" required> <br><br>
      <input type="text" name="Cargo" placeholder="Ingrese su cargo" required> <br><br>


      <button type="submit" class="btn btn-primary">AGREGAR EMPLEADO</button>

      <?php echo form_close(); ?>


    </div>    
  </div>
</div>