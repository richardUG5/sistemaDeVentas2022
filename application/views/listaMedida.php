<div class="container col-xl"> <!-- para reponsivo de vista -->
  <div class="row">
    <div class="col-xl"> <!-- para reponsivo de vista -->

<div class="row">
  <div class="col-md-12" >
    <font color="cyan">
      <h1 style="background-color:#022424;" style="color:darkcyan;" style="text-align:center" align="center"><i class="fas fa-cubes"></i> <i class="fas fa-list"></i> LISTA DE MEDIDAS HABILITADOS</h1>
    </font>
  </div>
</div>

<div class="row" style="background-color:#022424;">
  <div class="col-md-2">
    <?php echo form_open_multipart('medida/agregar'); ?>
      <button type="submit" name="agregar" class="btn btn-outline-warning btn-block"> <i class="fas fa-cube"></i> <i class="fas fa-edit"></i> AGREGAR MEDIDA</button>
    <?php echo form_close(); ?>
  </div>

<!--  <div class="col-md-2">
    <?php //echo form_open_multipart('cliente/vender'); ?>
      <button type="submit" name="agregar" class="btn btn-outline-danger"> <i class="fas fa-user"></i> <i class="fas fa-edit"></i> VENDER</button>
    <?php //echo form_close(); ?>
  </div> -->

  <div class="col-md-3">
    <?php echo form_open_multipart('medida/deshabilitados'); ?>
      <button type="submit" name="deshabilitar" class="btn btn-outline-danger btn-block"> <i class="fas fa-cubes"></i> <i class="far fa-trash-alt"></i> VER MEDIDAS ELIMINADOS</button>
    <?php echo form_close(); ?> 
  </div>

<!-- BOTON PARA REPORTE con  PDF -->
      
      <a target="_blank" href="<?php echo base_url(); ?>index.php/medida/reportepdf">
        <button class="btn btn-outline-info btn-block"> <i class="fas fa-cubes"></i> LISTA MEDIDAS PDF</button>        
      </a>
<!-- HASTA AQUI REPORTE EN PDF -->

  <div class="col-md-2">
    <?php echo form_open_multipart('usuarios/logout'); ?> <!-- retorna a login -->
      <button type="submit" name="buton3" class="btn btn-outline-success btn-block"> <i class="fas fa-cube"></i> <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> CERRAR SESSION</button>
    <?php echo form_close(); ?>
  </div>

</div>

<!-- tabla para listar todos los datos de la tabla medidas -->
<div class="table-responsive"> <!-- para mismo tamaño las filas con linea -->

      <table class="table table-bordered table-dark table-hover" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr bgcolor="#022424" align=center >
          <th scope="col">Nro</th>          
          <th scope="col">UNIDAD MEDIDA</th>
          <th scope="col">FechaRegistro</th>
          <th scope="col">FechaActualizacion</th>

          <th scope="col">MODIFICAR</th>
          <th scope="col">Delete_X</th> <!-- Eliminacion definitiva----------------->
          <th scope="col">ELIMINAR</th>
        </tr>
      </thead>
      <tbody>

</div> <!-- Finnn para mismo tamaño las filas con linea -->

  <?php

  $indice=1;
  foreach ($medidas->result() as $row)
    {
  ?> <!-- inicio tabla------------------------------->
    <tr th class="text-center"> 
        <th bgcolor="#022424" height="50" width="50" scope="row" ><?php echo $indice; ?></th>
        <!-- ----------------atributo de  bd --->
        <td><?php echo $row->unidadMedida; ?></td> 

        <td><?php echo formatearFecha($row->fechaRegistro); ?></td>
        <td><?php echo formatearFecha($row->fechaActualizacion); ?></td>

        <td>
<?php echo form_open_multipart("medida/modificar"); ?>

<input type="hidden" name="idmedida" value="<?php echo $row->idMedida; ?>">        
<button type="submit" class="btn btn-info"> <i class="fas fa-cube"></i> <i class="fas fa-edit"></i> EDITAR</button>

<?php echo form_close(); ?>
        </td>

        <td> <!-- Eliminacion definitiva----------------->
<?php echo form_open_multipart("medida/eliminarbd"); ?>

<input type="hidden" name="idmedida" value="<?php echo $row->idMedida; ?>">
<button type="submit" class="btn btn-danger"><i class="fas fa-cube"></i> <i class="far fa-trash-alt"></i> X</button>

<?php echo form_close(); ?>

        </td>

        <td>
<?php echo form_open_multipart("medida/deshabilitarbd"); ?>

<input type="hidden" name="idmedida" value="<?php echo $row->idMedida; ?>">
<button type="submit" class="btn btn-danger"> <i class="fas fa-cube"></i>  <i class="far fa-trash-alt"></i> QUITAR</button>

<?php echo form_close(); ?>
        </td>

    </tr> <!-- fin tabla----------------------------------->
  <?php
  $indice++; // contador incrementa
  }
    ?>   
   
  </tbody>
  </table>

    </div>    
  </div>
</div>