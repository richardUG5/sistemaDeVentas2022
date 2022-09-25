
<div class="container col-xl"> <!-- para reponsivo de vista -->
  <div class="row">
    <div class="col-xl"> <!-- para reponsivo de vista -->

<div class="row">
  <div class="col-md-12" >
    <font color="black">
      <h1 style="background-color:darkcyan;" style="color:darkcyan;" style="text-align:center" align="center"><i class="fas fa-users"></i> <i class="fas fa-list"></i> LISTA DE EMPLEADOS HABILITADOS</h1>
    </font>
  </div>
</div>

<div class="row" style="background-color:black;">
  <div class="col-md-2">
    <?php echo form_open_multipart('empleado/agregar'); ?>
      <button type="submit" name="agregar" class="btn btn-outline-warning"> <i class="fas fa-user"></i> <i class="fas fa-edit"></i> AGREGAR EMPLEADO</button>
    <?php echo form_close(); ?>
  </div>

  <div class="col-md-2">
    <?php echo form_open_multipart('empleado/vender'); ?>
      <button type="submit" name="agregar" class="btn btn-outline-danger"> <i class="fas fa-user"></i> <i class="fas fa-edit"></i> VENDER</button>
    <?php echo form_close(); ?>
  </div>

  <div class="col-md-3">
    <?php echo form_open_multipart('empleado/deshabilitados'); ?>
      <button type="submit" name="deshabilitar" class="btn btn-outline-info"> <i class="fas fa-user"></i> <i class="fas fa-list"></i> <i class="far fa-trash-alt"></i> VER EMPLEADOS ELIMINADOS</button>
    <?php echo form_close(); ?> 
  </div>

  <div class="col-md-2">
    <?php echo form_open_multipart('usuarios/logout'); ?>
      <button type="submit" name="buton3" class="btn btn-outline-success"> <i class="fas fa-user"></i> CERRAR SESSION</button>
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
          <th scope="col">FechaNacimiento</th>
          <th scope="col">Telefono</th>
          <th scope="col">Cargo</th>
          <th scope="col">FechaRegistro</th>
          <th scope="col">FechaActualizacion</th>
          <th scope="col">Modificar</th>
          <th scope="col">Delete_X</th>
          <th scope="col">Eliminar</th>
        </tr>
      </thead>
      <tbody>

</div> <!-- Finnn para mismo tamaño las filas con linea -->

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
          <?php echo form_open_multipart("empleado/modificar"); ?>

          <input type="hidden" name="idempleado" value="<?php echo $row->idEmpleado; ?>">          

<button type="submit" class="btn btn-primary"> <i class="fas fa-user"></i> <i class="fas fa-edit"></i> EDITAR</button>

          <?php echo form_close(); ?>


        </td>


        <td>
           <?php echo form_open_multipart("empleado/eliminarbd"); ?>

          <input type="hidden" name="idempleado" value="<?php echo $row->idEmpleado; ?>">

<button type="submit" class="btn btn-danger"><i class="fas fa-user"></i> X</button>

          <?php echo form_close(); ?>

        </td>

        <td>
           <?php echo form_open_multipart("empleado/deshabilitarbd"); ?>

          <input type="hidden" name="idempleado" value="<?php echo $row->idEmpleado; ?>">

<button type="submit" class="btn btn-success"> <i class="fas fa-user"></i>  <i class="far fa-trash-alt"></i> QUITAR</button>

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