
<div class="container">
  <div class="row">
    <div class="col-md-12">

      <font color="teal">
        <h2>MODIFICAR EMPLEADO</h2>
      </font> 

     <?php

        foreach ($infoempleado->result() as $row) 
        {          
          echo form_open_multipart('empleado/modificarbd'); 
          ?>
          <br>

          <input type="hidden" name="idempleado" value="<?php echo $row->idEmpleado; ?>"> <!-- oculto id del empleado -->

          <input type="text" name="Nombre" placeholder="Ingrese su nombre" value="<?php echo $row->nombre; ?>"> <br> <br>
          <input type="text" name="Apellidos" placeholder="Ingrese apellidos" value="<?php echo $row->apellidos; ?>"> <br> <br>
          <input type="text" name="Telefono" placeholder="Ingrese su telefono" value="<?php echo $row->telefono; ?>"> <br> <br>
          <input type="text" name="Cargo" placeholder="Ingrese su cargo" value="<?php echo $row->cargo; ?>"> <br><br>

          <input type="file" name="userfile"> <br><br> <!-- esto se aumento...... -->

          <button type="submit" class="btn btn-success">MODIFICAR EMPLEADO</button>
          <?php echo form_close();
        }
        ?>

    </div>    
  </div>
</div>