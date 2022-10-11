<div class="container col-xl"> <!-- para reponsivo de vista -->
  <div class="row" >
    <div class="col-xl"> <!-- para reponsivo de vista -->

<div class="row">
  <div class="col-md-12" >
    
      <h1 style="background-color:#022424;" style="color:teal;" style="text-align:center" align="center"> <i class="fas fa-cubes"></i> LISTA DE VENTAS ELIMINADOS</h1>
    
  </div>
</div>

<div class="row">
  <div class="col-md-12" style="background-color:white;">

      <?php echo form_open_multipart('venta/index'); ?>
      <button type="submit" name="buton2" class="btn btn-outline-success" style="background-color:black;"> <i class="fas fa-cubes"></i> VER VENTAS HABILITADOS</button>
      <?php echo form_close(); ?>
  </div>
</div>

<div class="table-responsive"> <!-- para mismo tamaño las filas con linea -->
  <table class="table table-bordered table-dark table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>        
          <tr bgcolor="#022424" align=center>
            <th scope="col">Nro</th>            
            <th scope="col">FECHA VENTA</th>
            <th scope="col">TOTAL</th>            
            
            <th scope="col">CLIENTE</th>
            <th scope="col">USUARIO</th>
            <th scope="col">FechaRegistro</th>
            <th scope="col">FechaActualizacion</th> 
          <th scope="col">HABILITAR</th>
          </tr> 
        </thead>
      <tbody>

</div>  <!-- fin para mismo tamaño las filas con linea -->        

<?php

$indice=1;
foreach ($ventas->result() as $row)
{
  ?>
    <tr th class="text-center"> <!-------------------BD------------------------------------->
        <th bgcolor="#022424" height="50" width="50" scope="row"><?php echo $indice; ?></th>        
        <td th class="text-left"><?php echo $row->fechaVenta; ?></td>
        <td><?php echo $row->total; ?></td> 
        
        <td><?php echo $row->idCliente; ?></td>
        <td><?php echo $row->idUsuario; ?></td>  

        <td><?php echo formatearFecha($row->fechaRegistro); ?></td>
        <td><?php echo formatearFecha($row->fechaActualizacion); ?></td>

        <td>
          <?php echo form_open_multipart("venta/habilitarbd"); ?>

          <input type="hidden" name="idventa" value="<?php echo $row->idVenta; ?>">
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