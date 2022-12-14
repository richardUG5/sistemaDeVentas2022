<div class="container col-xl"> <!-- para reponsivo de vista -->
  <div class="row" > 
    <div class="col-xl"> <!-- para reponsivo de vista -->

<div class="row">
  <div class="col-md-12">
       <!--  <font color="black"> -->
          <h1 style="background-color:#022424;" style="color:darkcyan;" style="text-align:center" align="center"> <i class="fas fa-cubes"></i> LISTA DE PRODUCTOS HABILITADOS</h1>
        <!-- </font> -->
  </div>
</div>

<div class="row" style="background-color:#022424;">
  <div class="col-md-2">
    <?php echo form_open_multipart('producto/agregar'); ?>
        <button type="submit" class="btn btn-outline-warning btn-block"><i class="fas fa-cube"> </i> <i class="fas fa-edit"></i> AGREGAR PRODUCTO</button>
    <?php echo form_close(); ?>      
  </div>

  <!-- begin tx ------------------------------------------------->
  <div class="col-md-2">
    <?php echo form_open_multipart('usuarios/vender'); ?>
      <button type="submit" name="agregar" class="btn btn-outline-info btn-block"> <i class="fas fa-user"></i> <i class="fas fa-edit"></i> V E N D E R</button>
    <?php echo form_close(); ?>
  </div>
<!-- end tx----------------------------------------------------->

  <div class="col-md-3">
    <?php echo form_open_multipart('producto/deshabilitados'); ?>
      <button type="submit" name="buton2" class="btn btn-outline-danger btn-block"><i class="fas fa-cubes"></i> <i class="fas fa-boxes fa-fw"></i>&nbsp;VER PRODUCTOS ELIMINADOS</button>
    <?php echo form_close(); ?>        
  </div>

  <!-- BOTON PARA REPORTE con  PDF -->      
    <a target="_blank" href="<?php echo base_url(); ?>index.php/producto/reportepdf">
      <button class="btn btn-outline-info btn-block"> <i class="fas fa-cubes"></i></i> LISTA PRODUCTOS PDF</button>        
    </a>
<!-- HASTA AQUI REPORTE EN PDF -->

  <div class="col-md-2">
    <?php echo form_open_multipart('usuarios/logout'); ?>
      <button type="submit" name="buton3" class="btn btn-outline-success btn-block"> <i class="fas fa-user"></i> <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> CERRAR SESSION</button>
    <?php echo form_close(); ?>
  </div>

</div>



<!-- <div class="card-box table-responsive"> para mismo tama??o las filas con linea --> 
  <div class="table-responsive">
      <table class="table table-bordered table-dark table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>        
          <tr bgcolor="#022424" align="center">
            <th scope="col">Nro</th>
            <th scope="col">DESCRIPCION</th>
            <th scope="col">COLOR</th>
            <th scope="col">PRECIO</th>
            <th scope="col">CATEGORIA</th>
            <th scope="col">UNIDAD MEDIDA</th>

            <th scope="col">MODIFICAR</th>
            <th scope="col">ELIMINAR</th>
          </tr> 
        </thead>
      <tbody>

  </div>  <!-- fin para mismo tama??o las filas con linea -->

<?php

$indice=1;
foreach ($productos->result() as $row)
{
  ?>
    <tr th class="text-center">
        <th bgcolor="#022424" scope="row"><?php echo $indice; ?></th>
        <td th class="text-left"><?php echo $row->descripcion; ?></td>
        <td><?php echo $row->color; ?></td>
        <td><?php echo $row->precioBase; ?></td>
        <td><?php echo $row->nombreCategoria; ?></td>
        <td><?php echo $row->unidadMedida; ?></td>

      

        <td th class="text-center">
          <?php echo form_open_multipart("producto/modificar"); ?>
          <input type="hidden" name="idproducto" value="<?php echo $row->idProducto; ?>">
          <button type="submit" class="btn btn-info"> <i class="fas fa-solid fa-cube"></i> EDITAR</button>
          <?php echo form_close(); ?>
        </td>               

        <td th class="text-center">
           <?php echo form_open_multipart("producto/deshabilitarbd"); ?>
          <input type="hidden" name="idproducto" value="<?php echo $row->idProducto; ?>">
          <button type="submit" class="btn btn-danger"> <i class="fas fa-solid fa-cube"></i> <i class="far fa-trash-alt"></i> QUITAR</button>
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