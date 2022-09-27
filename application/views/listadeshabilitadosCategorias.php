<div class="container col-xl"> <!-- para reponsivo de vista -->
  <div class="row">
    <div class="col-xl"> <!-- para reponsivo de vista -->

<div class="row">
  <div class="col-md-12" >
    <font color="black">
      <h1 style="background-color:darkcyan;" style="color:teal;" style="text-align:center" align="center"> <i class="fas fa-cubes"></i> LISTA DE CATEGORIAS ELIMINADOS</h1>
    </font>
  </div>
</div>

<div class="row" style="background-color:white;">
  <div class="col-md-3">
    <?php echo form_open_multipart('categoria/index'); ?>
      <button type="submit" name="buton2" class="btn btn-outline-success" style="background-color:black;"> <i class="fa fa-cubes"></i> VER CATEGORIAS HABILITADOS</button>
    <?php echo form_close(); ?>
  </div>
</div>

<div class="table-responsive"> <!-- para mismo tamaño las filas con linea -->

      <table class="table table-bordered table-dark" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th scope="col">Nro</th>          
          <th scope="col">Nombre Categoria</th>          
          <th scope="col">FechaRegistro</th>
          <th scope="col">FechaActualizacion</th>          
          <th scope="col">Habilitar</th>
        </tr>
      </thead>
      <tbody>

</div>  <!-- fin para mismo tamaño las filas con linea -->

<?php

$indice=1;
foreach ($categorias->result() as $row)
{
  ?>
    <tr>
        <th scope="row"><?php echo $indice; ?></th>
        
        <td><?php echo $row->nombreCategoria; ?></td>
        
        <td><?php echo formatearFecha($row->fechaRegistro); ?></td>
        <td><?php echo formatearFecha($row->fechaActualizacion); ?></td>              

        <td>
           <?php echo form_open_multipart("categoria/habilitarbd"); ?>

          <input type="hidden" name="idcategoria" value="<?php echo $row->idCategoria; ?>">
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