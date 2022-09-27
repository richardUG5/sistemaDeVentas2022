<div class="container col-xl"> <!-- para reponsivo de vista -->
  <div class="row">
    <div class="col-xl"> <!-- para reponsivo de vista -->

<div class="container my-auto">
  <div class="copyright text-center my-auto">
    <font color="cyan">
      <span> SISTEMA WEB VENTAS PARA LA TIENDA COMERCIAL &copy; 2022</span>
        <h1 style="background-color:#022424;" style="color:darkcyan;" style="text-align:center" align="center"><i class="fas fa-users"></i> <i class="fas fa-list"></i> LISTA DE EMPLEADOS HABILITADOS</h1>
    </font>
  </div>
</div>

<div class="row" style="background-color:#022424;">
  <div class="col-md-2">
    <?php echo form_open_multipart('empleado/agregar'); ?>
      <button type="submit" name="agregar" class="btn btn-outline-warning btn-block"> <i class="fas fa-user"></i> <i class="fas fa-edit"></i> AGREGAR EMPLEADO</button>
    <?php echo form_close(); ?>
  </div>

  <div class="col-md-2">
    <?php echo form_open_multipart('empleado/vender'); ?>
      <button type="submit" name="agregar" class="btn btn-outline-info btn-block"> <i class="fas fa-user"></i> <i class="fas fa-edit"></i> VENDER</button>
    <?php echo form_close(); ?>
  </div>

  <div class="col-md-3">
    <?php echo form_open_multipart('empleado/deshabilitados'); ?>
      <button type="submit" name="deshabilitar" class="btn btn-outline-danger btn-block"> <i class="fas fa-user"></i> <i class="fas fa-list"></i> <i class="far fa-trash-alt"></i> VER EMPLEADOS ELIMINADOS</button>
    <?php echo form_close(); ?> 
  </div>

<!-- BOTON PARA REPORTE con  PDF -->      
      <a target="_blank" href="<?php echo base_url(); ?>index.php/empleado/reportepdf">
        <button class="btn btn-outline-success btn-block">LISTA EMPLEADOS PDF</button>        
      </a>
<!-- HASTA AQUI REPORTE EN PDF -->

  <div class="col-md-2">
    <?php echo form_open_multipart('usuarios/logout'); ?>
      <button type="submit" name="buton3" class="btn btn-outline-primary btn-block"> <i class="fas fa-user"></i> CERRAR SESSION</button>
    <?php echo form_close(); ?>
  </div>

</div>

<div class="table-responsive"> <!-- para mismo tamaño las filas con linea -->
  <table class="table table-bordered table-dark" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr bgcolor="#022424" align=center>
        <th scope="col">Nro</th>
        <th scope="col">Nombre</th>
        <th scope="col">Primer Apellido</th>   
        <th scope="col">Segundo Apellido</th>
        <th scope="col">Fecha Nacimiento</th>
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
  <tr th class="text-center">
    <th bgcolor="#022424" scope="row"><?php echo $indice; ?></th>
    <td><?php echo $row->nombre; ?></td>
    <td><?php echo $row->primerApellido; ?></td>
    <td><?php echo $row->segundoApellido; ?></td>
    <td><?php echo formatearFecha($row->fechaNacimiento); ?></td>

    <td><?php echo $row->telefono; ?></td>
    <td><?php echo $row->cargo; ?></td>

    <td><?php echo formatearFecha($row->fechaRegistro); ?></td>
    <td><?php echo formatearFecha($row->fechaActualizacion); ?></td>

    <td th class="text-center">
      <?php echo form_open_multipart("empleado/modificar"); ?>
        <input type="hidden" name="idempleado" value="<?php echo $row->idEmpleado; ?>">
        <button type="submit" class="btn btn-primary"> <i class="fas fa-user"></i> <i class="fas fa-edit"></i> EDITAR</button>
      <?php echo form_close(); ?>
    </td>

    <td th class="text-center">
      <?php echo form_open_multipart("empleado/eliminarbd"); ?>
        <input type="hidden" name="idempleado" value="<?php echo $row->idEmpleado; ?>">
        <button type="submit" class="btn btn-danger"><i class="fas fa-user"></i> X</button>
      <?php echo form_close(); ?>
    </td>

    <td th class="text-center">
      <?php echo form_open_multipart("empleado/deshabilitarbd"); ?>
        <input type="hidden" name="idempleado" value="<?php echo $row->idEmpleado; ?>">
        <button type="submit" class="btn btn-success"> <i class="fas fa-user"></i> <i class="far fa-trash-alt"></i> QUITAR</button>
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