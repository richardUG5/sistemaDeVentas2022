
<div class="container col-xl"> <!-- para reponsivo de vista -->
  <div class="row" >
    <div class="col-xl"> <!-- para reponsivo de vista -->

<div class="row">
  <div class="col-md-12" >
    <font color="black">
      <h1 style="background-color:darkcyan;" style="color:teal;" style="text-align:center" align="center"> <i class="fas fa-cubes"></i> LISTA DE PRODUCTOS ELIMINADOS</h1>
    </font>
  </div>
</div>

<div class="row">
  <div class="col-md-12" style="background-color:white;">

      <?php echo form_open_multipart('producto/index'); ?>
      <button type="submit" name="buton2" class="btn btn-outline-success" style="background-color:black;">VER PRODUCTOS HABILITADOS</button>
      <?php echo form_close(); ?>
  </div>
</div>

<div class="table-responsive"> <!-- para mismo tamaño las filas con linea -->
  <table class="table table-bordered table-dark" id="dataTable" width="100%" cellspacing="0">
        <thead>        
          <tr>
            <th scope="col">Nro</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Color</th>
            <th scope="col">Unidad Medida</th>
            <th scope="col">Precio</th>
            <th scope="col">FechaRegistro</th>
            <th scope="col">FechaActualizacion</th> 
          <th scope="col">Habilitar</th>
          </tr> 
        </thead>
      <tbody>

</div>  <!-- fin para mismo tamaño las filas con linea -->        

<?php

$indice=1;
foreach ($productos->result() as $row)
{
  ?>
    <tr>
        <th scope="row"><?php echo $indice; ?></th>
        <td><?php echo $row->nombre; ?></td>
        <td><?php echo $row->descripcion; ?></td>
        <td><?php echo $row->color; ?></td>
        <td><?php echo $row->unidadMedida; ?></td> 
        <td><?php echo $row->precio; ?></td>
        <td><?php echo formatearFecha($row->fechaRegistro); ?></td>
        <td><?php echo formatearFecha($row->fechaActualizacion); ?></td>

        <td>
          <?php echo form_open_multipart("producto/habilitarbd"); ?>

          <input type="hidden" name="idproducto" value="<?php echo $row->idProducto; ?>">
          <input type="submit" name="buttonz" value="HABILITAR" class="btn btn-success">

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