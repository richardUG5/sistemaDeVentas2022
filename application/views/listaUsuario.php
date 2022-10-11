<div class="container col-xl"> <!-- para reponsivo de vista -->
  <div class="row" class="container my-auto"> 
    <div class="col-xl" class="container my-auto"> <!-- para reponsivo de vista -->

<div class="row">
  <div class="col-md-12">
       <!--  <font color="black"> -->
          <h1 style="background-color:#022424;" style="color:darkcyan;" style="text-align:center" align="center"> <i class="fas fa-users"></i> LISTA DE USUARIOS HABILITADOS</h1>
        <!-- </font> -->
  </div>
</div>

<div class="row" style="background-color:#022424;">
  <div class="col-md-2">
    <?php echo form_open_multipart('usuarios/agregar'); ?>
        <button type="submit" class="btn btn-outline-warning btn-block"><i class="fas fa-user"></i><i class="fas fa-edit"></i> AGREGAR USUARIO</button>
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
    <?php echo form_open_multipart('usuarios/deshabilitados'); ?>
      <button type="submit" name="buton2" class="btn btn-outline-danger btn-block"><i class="fas fa-users"></i><i class="far fa-trash-alt"></i> VER USUARIOS ELIMINADOS</button>
    <?php echo form_close(); ?>        
  </div>

  <!-- BOTON PARA REPORTE con  PDF -->
      
      <a target="_blank" href="<?php echo base_url(); ?>index.php/usuarios/reportepdf">
        <button class="btn btn-outline-info btn-block"> <i class="fas fa-users"></i></i> LISTA USUARIOS PDF</button>        
      </a>
  <!-- HASTA AQUI REPORTE EN PDF -->

  <div class="col-md-2">
    <?php echo form_open_multipart('usuarios/logout'); ?>
      <button type="submit" name="buton3" class="btn btn-outline-success btn-block"> <i class="fas fa-user"></i> <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> CERRAR SESSION</button>
    <?php echo form_close(); ?>
  </div>

</div>

<!-- <div class="card-box table-responsive"> para mismo tamaño las filas con linea --> 
  <div class="table-responsive">
      <table class="table table-bordered table-dark table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>        
          <tr bgcolor="#022424" align="center">
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

            <th scope="col">MODIFICAR</th>
            <th scope="col">ELIMINAR</th>
          </tr> 
        </thead>
      <tbody>

  </div>  <!-- fin para mismo tamaño las filas con linea -->

<?php

$indice=1;
foreach ($usuarios->result() as $row)
{
  ?>
    <tr th class="text-center">   <!-- atributo de  bd ---------------------->
        <th bgcolor="#022424" scope="row"><?php echo $indice; ?></th>
        <td th class="text-left"><?php echo $row->foto; ?></td>
        <td><?php echo $row->nombres; ?></td>
        <td><?php echo $row->primerApellido; ?></td>
        <td><?php echo $row->segundoApellido; ?></td>
        <td><?php echo $row->fechaNacimiento; ?></td>
        <td><?php echo $row->telefono; ?></td>
        <td><?php echo $row->login; ?></td>
        <td><?php echo $row->password; ?></td>
        <td><?php echo $row->tipo; ?></td>
        <td><?php echo $row->nombreComercial; ?></td>      

        <td th class="text-center">
          <?php echo form_open_multipart("usuarios/modificar"); ?>
          <input type="hidden" name="idusuario" value="<?php echo $row->idUsuario; ?>">
          <button type="submit" class="btn btn-info"> <i class="fas fa-solid fa-user"></i> EDITAR</button>
          <?php echo form_close(); ?>
        </td>              

        <td th class="text-center">
          <?php echo form_open_multipart("usuarios/deshabilitarbd"); ?>
          <input type="hidden" name="idusuario" value="<?php echo $row->idUsuario; ?>">
          <button type="submit" class="btn btn-danger"> <i class="fas fa-solid fa-user"></i> <i class="far fa-trash-alt"></i> QUITAR</button>
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