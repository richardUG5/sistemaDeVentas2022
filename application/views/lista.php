
<div class="container" >
  <div class="row">
    <div class="col-md-12">

      <?php echo form_open_multipart('usuarios/logout'); ?>
        <button type="submit" name="buton3" class="btn btn-primary" >CERRAR SESSION</button>
      <?php echo form_close(); ?>


<!-- Clase 4-VII-2022  desde aqui -----------para otro REPORTE
      <?php //echo form_open_multipart('empleado/reportepdf'); ?>
      <button type="submit" name="buton3" class="btn btn-danger" >REPORTE PDF</button>
      <?php //echo form_close(); ?>  -->
<!-- Clase 4-VII-2022 hasta aqui -->

      <!-- BOTON PARA REPORTE -->

      <br>
      <a target="_blank" href="<?php echo base_url(); ?>index.php/empleado/reportepdf ">
        <button class="btn btn-success btn-block">Lista empleados PDF</button>        
      </a>



      <font color="btn-warning">
        <h1>LISTA DE EMPLEADOS HABILITADOS</h1>
        <h1>Login: <?php echo $this->session->userdata('login'); ?></h1>
        <h1>Tipo: <?php echo $this->session->userdata('tipo'); ?></h1>
        <h1>ID: <?php echo $this->session->userdata('idusuario'); ?></h1>
      </font>

        <h1>Fecha: <?php echo $fechatest; ?></h1>
        <h2>
          <?php            
            echo date('Y-m-d H:i:s'); 
          ?>
        </h2>
      

      <?php echo form_open_multipart('empleado/deshabilitados'); ?>
      <button type="submit" name="deshabilitar" class="btn btn-warning">VER EMPLEADOS DESHABILITADOS</button>
      <?php echo form_close(); ?>
      <br>

        <?php echo form_open_multipart('empleado/agregar'); ?>
      <button type="submit" name="agregar" class="btn btn-primary">AGREGAR EMPLEADO</button>
      <?php echo form_close(); ?>

      

    

      <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Foto</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellidos</th>
          <th scope="col">Telefono</th>
          <th scope="col">Cargo</th>
          <th scope="col">Creado</th>
          <th scope="col">Fotografia</th>
          <th scope="col">Subir</th>

          <th scope="col">Modificar</th>
          <th scope="col">Eliminar</th>
          <th scope="col">Deshabilitar</th>
        </tr>
      </thead>
      <tbody>


<?php

$indice=1;
foreach ($empleados->result() as $row)
{
  ?>
    <tr>
        <th scope="row"><?php echo $indice; ?></th>
        <td>
          <?php
            $foto=$row->foto;
            if($foto=="")
            { // mostramos foto por defecto cuando esta vacio
              ?>
                <img width="50px" src="<?php echo base_url(); ?>/uploads/user.jpg">
              <?php
            }
            else
            {//mostramos foto o insertamos cuando no esta vacio
              ?>
                <img width="50px" src="<?php echo base_url(); ?>/uploads/<?php echo $foto; ?>">
              <?php
            } 
          ?>
        </td>
        <td><?php echo $row->nombre; ?></td>
        <td><?php echo $row->apellidos; ?></td>
        <td><?php echo $row->telefono; ?></td>
        <td><?php echo $row->cargo; ?></td>
        <td><?php echo formatearFecha($row->creado); ?></td> 

<!-- -------fotografia -->
        <td>
<?php
  $foto = $row->foto;
    if($foto=="")
    { // mostramos foto por defecto cuando esta vacio
      ?>
        <img width="50px" src="<?php echo base_url(); ?>/uploads/empleados/perfil.jpg">
      <?php
    }
    else
    {//mostramos foto o insertamos cuando no esta vacio
      ?>
        <img width="50px" src="<?php echo base_url(); ?>/uploads/empleados/<?php echo $foto; ?>">
      <?php
    } 
?>       

        </td> 

        <td>

<?php echo form_open_multipart("empleado/subirfoto"); ?>

<input type="hidden" name="idempleado" value="<?php echo $row->idEmpleado; ?>">
<button type="submit" class="btn btn-primary btn-xs">Subir</button>

<?php echo form_close(); ?>
        
        </td>

<!-- ------fotografia -->

    <!--    <td><?php //echo formatearFecha($row->creado); ?></td>  -->

         <td>
          <?php echo form_open_multipart("empleado/modificar"); ?>

          <input type="hidden" name="idempleado" value="<?php echo $row->idEmpleado; ?>">
          <input type="submit" name="buttony" value="Modificar" class="btn btn-success">

          <?php echo form_close(); ?>


        </td>


        <td>
           <?php echo form_open_multipart("empleado/eliminarbd"); ?>

          <input type="hidden" name="idempleado" value="<?php echo $row->idEmpleado; ?>">
          <input type="submit" name="buttonx" value="Eliminar" class="btn btn-danger">

          <?php echo form_close(); ?>

        </td>

        <td>
           <?php echo form_open_multipart("empleado/deshabilitarbd"); ?>

          <input type="hidden" name="idempleado" value="<?php echo $row->idEmpleado; ?>">
          <input type="submit" name="buttonz" value="Deshabilitar" class="btn btn-warning">

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