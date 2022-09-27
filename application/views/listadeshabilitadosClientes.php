<div class="container col-xl"> <!-- para reponsivo de vista -->
  <div class="row">
    <div class="col-xl"> <!-- para reponsivo de vista -->

<div class="row">
  <div class="col-md-12" >
    <font color="cyan">
      <h1 style="background-color:#022424;" style="color:teal;" style="text-align:center" align="center"> <i class="fas fa-users"></i> LISTA DE CLIENTES ELIMINADOS</h1>
    </font>
  </div>
</div>

<div class="row" style="background-color:white;">
  <div class="col-md-3">
    <?php echo form_open_multipart('cliente/index'); ?>
      <button type="submit" name="buton2" class="btn btn-outline-success" style="background-color:black;"> <i class="fa fa-users"></i> VER CLIENTES HABILITADOS</button>
    <?php echo form_close(); ?>
  </div>
</div>

<div class="table-responsive"> <!-- para mismo tamaño las filas con linea -->

      <table class="table table-bordered table-dark" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr bgcolor="#022424" align=center>
          <th scope="col">Nro</th>
          <th scope="col">Nit/CI</th>
          <th scope="col">Correo Electronico</th>
          <th scope="col">Razon Social</th>
          <th scope="col">Limite Credito</th>

          <th scope="col">FechaRegistro</th>
          <th scope="col">FechaActualizacion</th>          
          <th scope="col">Habilitar</th>
        </tr>
      </thead>
      <tbody>

</div>  <!-- fin para mismo tamaño las filas con linea -->

<?php

$indice=1;
foreach ($clientes->result() as $row)
{
  ?>
    <tr>
        <th bgcolor="#022424" height="50" width="50" scope="row"><?php echo $indice; ?></th>
        <td><?php echo $row->nit_ci; ?></td>
        <td><?php echo $row->correoElectronico; ?></td>
        <td><?php echo $row->razonSocial; ?></td>
        <td><?php echo $row->limiteCredito; ?></td>

        <td><?php echo formatearFecha($row->fechaRegistro); ?></td>
        <td><?php echo formatearFecha($row->fechaActualizacion); ?></td>              

        <td>
           <?php echo form_open_multipart("cliente/habilitarbd"); ?>

          <input type="hidden" name="idcliente" value="<?php echo $row->idCliente; ?>">
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