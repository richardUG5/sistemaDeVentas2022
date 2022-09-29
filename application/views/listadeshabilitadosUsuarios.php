<div class="container col-xl"> <!-- para reponsivo de vista -->
  <div class="row" >
    <div class="col-xl"> <!-- para reponsivo de vista -->

<div class="row">
  <div class="col-md-12" >
    
      <h1 style="background-color:#022424;" style="color:teal;" style="text-align:center" align="center"> <i class="fas fa-users"></i> LISTA DE USUARIOS ELIMINADOS</h1>
    
  </div>
</div>

<div class="row">
  <div class="col-md-12" style="background-color:white;">

      <?php echo form_open_multipart('usuarios/index1'); ?>
      <button type="submit" name="buton2" class="btn btn-outline-success" style="background-color:black;"> <i class="fas fa-users"></i> VER USUARIOS HABILITADOS</button>
      <?php echo form_close(); ?>
  </div>
</div>

<div class="table-responsive"> <!-- para mismo tamaño las filas con linea -->
  <table class="table table-bordered table-dark" id="dataTable" width="100%" cellspacing="0">
    <thead>        
      <tr bgcolor="#022424" align=center>
        <th scope="col">Nro</th>
        <th scope="col">FOTO</th>
        <th scope="col">NOMBRES</th>
        <th scope="col">PRIMER APELLIDO</th>
        <th scope="col">SEGUNDO APELLIDO</th>
        <th scope="col">FECHA NACIMIENTO</th>
        <th scope="col">TELEFONO</th>
        <th scope="col">LOGIN</th>
        <th scope="col">PASSWORD</th>
        <th scope="col">TIPO</th>
        <th scope="col">COMERCIAL</th>

        <th scope="col">FechaRegistro</th>
        <th scope="col">FechaActualizacion</th> 
        <th scope="col">HABILITAR</th>
      </tr> 
    </thead>
  <tbody>
</div>  <!-- fin para mismo tamaño las filas con linea -->        

<?php

$indice=1;
foreach ($usuarios->result() as $row)
{
  ?>
    <tr th class="text-center"> <!-------------------BD---------------->
        <th bgcolor="#022424" height="50" width="50" scope="row"><?php echo $indice; ?></th>
        <td th class="text-left"><?php echo $row->foto; ?></td>        
        <td><?php echo $row->nombres; ?></td>
        <td><?php echo $row->primerApellido; ?></td> 
        <td><?php echo $row->segundoApellido; ?></td> 
        <td><?php echo $row->fechaNacimiento; ?></td> 
        <td><?php echo $row->telefono; ?></td>
        <td><?php echo $row->login; ?></td>
        <td><?php echo $row->password; ?></td>
        <td><?php echo $row->tipo; ?></td>

        <td><?php echo $row->idComercial; ?></td>
        
        <td><?php echo formatearFecha($row->fechaRegistro); ?></td>
        <td><?php echo formatearFecha($row->fechaActualizacion); ?></td>

        <td>
          <?php echo form_open_multipart("usuarios/habilitarbd"); ?>

          <input type="hidden" name="idusuario" value="<?php echo $row->idUsuario; ?>">
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