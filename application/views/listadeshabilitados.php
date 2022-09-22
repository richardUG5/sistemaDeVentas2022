
<div class="container">
  <div class="row">
    <div class="col-md-12">

      <font color="orange">
        <h1>Lista de empleados deshabilitados</h1>
      </font>

      <?php echo form_open_multipart('empleado/index'); ?>
      <button type="submit" name="buton2" class="btn btn-primary">VER EMPLEADOS HABILITADOS</button>
      <?php echo form_close(); ?>
      <br>
      <br>
      
      <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellidos</th>
          <th scope="col">Telefono</th>
          <th scope="col">Cargo</th>          
          <th scope="col">Habilitar</th>
        </tr>
      </thead>
      <tbody>

<?php

$indice=1;
foreach ($empleados->result() as $row)
{
  ?>
    <tr>
        <th scope="row"><?php echo $indice; ?></th>
        <td><?php echo $row->nombre; ?></td>
        <td><?php echo $row->apellidos; ?></td>
        <td><?php echo $row->telefono; ?></td>
        <td><?php echo $row->cargo; ?></td> 
              

        <td>
           <?php echo form_open_multipart("empleado/habilitarbd"); ?>

          <input type="hidden" name="idempleado" value="<?php echo $row->idEmpleado; ?>">
          <input type="submit" name="buttonz" value="Habilitar" class="btn btn-warning">

          <?php echo form_close(); ?>
        </td>

    </tr>
  <?php
  $indice++; // contador incrementa
}
?>
   
   
  </tbody>
</table>


    </div>
    
  </div>
</div>