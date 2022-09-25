
<div class="container col-xl"> <!-- para reponsivo de vista -->
  <div class="row" > 
    <div class="col-xl"> <!-- para reponsivo de vista -->

<div class="row">
  <div class="col-md-12">
         <font color="black">
          <h1 style="background-color:darkcyan;" style="color:darkcyan;" style="text-align:center" align="center"> <i class="fas fa-cubes"></i> LISTA DE PRODUCTOS HABILITADOS</h1>
        </font>
  </div>
</div>

<div class="row" style="background-color:black;">
  <div class="col-md-2">
    <?php echo form_open_multipart('producto/agregar'); ?>
        <button type="submit" class="btn btn-outline-info"><i class="fas fa-cube"></i><i class="fas fa-clipboard-list"></i> AGREGAR PRODUCTO</button>
    <?php echo form_close(); ?>      
  </div>

  <div class="col-md-3">
    <?php echo form_open_multipart('producto/deshabilitados'); ?>
      <button type="submit" name="buton2" class="btn btn-outline-danger"><i class="fas fa-cube"></i><i class="fas fa-clipboard-list"></i> VER PRODUCTOS ELIMINADOS</button>
    <?php echo form_close(); ?>        
  </div>

  <div class="col-md-3">
    <?php echo form_open_multipart('usuarios/logout'); ?>
      <button type="submit" name="buton3" class="btn btn-outline-success"> <i class="fas fa-clipboard-list"></i> CERRAR SESSION</button>
    <?php echo form_close(); ?>
  </div>

</div>



<!-- <div class="card-box table-responsive"> para mismo tamaño las filas con linea --> 
<div class="table-responsive">
      <table class="table table-bordered table-dark" id="dataTable" width="100%" cellspacing="0">
        <thead>        
          <tr>
            <th scope="col">Nro</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Color </th>
            <th scope="col">Unidad Medida</th>
            <th scope="col">Precio</th> 
            <th scope="col">FechaRegistro</th>
            <th scope="col">FechaActualizacion</th>

          <th scope="col">Modificar</th>
          <th scope="col">Delete X</th>
          <th scope="col">Eliminar</th>
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
          <?php echo form_open_multipart("producto/modificar"); ?>

          <input type="hidden" name="idproducto" value="<?php echo $row->idProducto; ?>">
<!--          <input type="submit" name="buttony" value="MODIFICAR" class="btn btn-success"> -->
        <button type="submit" class="btn btn-primary"><i class="fas fa-user"></i> <i class="fas fa-solid fa-cube"></i> EDITAR</button>

          <?php echo form_close(); ?>


        </td>        

        <td>
          <?php echo form_open_multipart('producto/eliminarbd'); ?>

          <input type="hidden" name="idproducto" value="<?php echo $row->idProducto; ?>">
          <button type="submit" class="btn btn-danger"><i class="fas fa-user"></i> X</button>
<!-- Eliminar con icono clave -->
          <?php echo form_close(); ?>

        </td>       

        <td>
           <?php echo form_open_multipart("producto/deshabilitarbd"); ?>

          <input type="hidden" name="idproducto" value="<?php echo $row->idProducto; ?>">
          <button type="submit" class="btn btn-success"> X <i class="fas fa-user"></i> QUITAR</button>
<!--          <input type="submit" name="buttonz" value="X" class="btn btn-danger">   -->

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