
<div class="container col-xl"> <!-- para reponsivo de vista -->
  <div class="row">
    <div class="col-xl"> <!-- para reponsivo de vista -->

<div class="row">
  <div class="col-md-12" >
    <font color="black">
      <h1 style="background-color:darkcyan;" style="color:teal;" style="text-align:center" align="center"> <i class="fas fa-users"></i> LISTA DE EMPLEADOS ELIMINADOS</h1>
    </font>
  </div>
</div>

<div class="row" style="background-color:white;">
  <div class="col-md-3">
    <?php echo form_open_multipart('empleado/index'); ?>
      <button type="submit" name="buton2" class="btn btn-outline-success" style="background-color:black;"> <i class="fa fa-users"></i> VER EMPLEADOS HABILITADOS</button>
    <?php echo form_close(); ?>
  </div>
</div>

<div class="table-responsive"> <!-- para mismo tamaño las filas con linea -->

      <table class="table table-bordered table-dark" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th scope="col">Nro</th>
          <th scope="col">Nombre</th>
          <th scope="col">Primer Apellido</th>
          <th scope="col">Segundo Apellido</th>
          <th scope="col">FechaNac</th>
          <th scope="col">Telefono</th>
          <th scope="col">Cargo</th>
          <th scope="col">FechaRegistro</th>
          <th scope="col">FechaActualizacion</th>          
          <th scope="col">Habilitar</th>
        </tr>
      </thead>
      <tbody>

</div>  <!-- fin para mismo tamaño las filas con linea -->

<?php

$indice=1;
foreach ($empleados->result() as $row)
{
  ?>
    <tr>
        <th scope="row"><?php echo $indice; ?></th>
        <td><?php echo $row->nombre; ?></td>
        <td><?php echo $row->primerApellido; ?></td>
        <td><?php echo $row->segundoApellido; ?></td>
        <td><?php echo formatearFecha($row->fechaNacimiento); ?></td>
        <td><?php echo $row->telefono; ?></td>
        <td><?php echo $row->cargo; ?></td>
        <td><?php echo formatearFecha($row->fechaRegistro); ?></td>
        <td><?php echo formatearFecha($row->fechaActualizacion); ?></td>
              

        <td>
           <?php echo form_open_multipart("empleado/habilitarbd"); ?>

          <input type="hidden" name="idempleado" value="<?php echo $row->idEmpleado; ?>">
          <input type="submit" name="buttonz" value="HABILITAR" class="btn btn-secondary">

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