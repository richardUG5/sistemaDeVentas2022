<div class="right_col " role="main">
  <div class="container md-3"> <!-- para reponsivo de vista -->
    <div class="row">
      <div class="col-md-12 col-ms-12"> <!-- para reponsivo de vista -->
        <div class="x_panel">                  
          <div class="x_content">

           <?php
              foreach ($infoempleado->result() as $row) 
              {          
                echo form_open_multipart('empleado/modificarbd'); 
                ?>
                <br>

                <input type="hidden" name="idempleado" value="<?php echo $row->idEmpleado; ?>">
  
<!-- inicio agrupado todo formulario crea una columna col-md-1 -->

<div class="item form-group has-feedback" style="background-color:#1D7070;" style="color:white;" style="text-align:center" align="right">
  <font color="white"> <br>

    <div class="col-md-12" align="center">
      <font color="cyan">
        <h1><i class="fas fa-user"></i> MODIFICAR DATOS EMPLEADO</h1>
      </font> 
    </div>

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="NOMBRE">NOMBRE:</label>
      </div>

      <div class="col-md-5">
          <input type="text" name="Nombre"  value="<?php echo $row->nombre; ?>" 
            class="form-control has-feedback-left">
      </div> 
    </div> <br>     

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="PRIMERPELLIDO">PRIMER APELLIDO:</label>
      </div>

      <div class="col-md-5">
          <input type="text" name="Apellido1"  value="<?php echo $row->primerApellido; ?>" 
            class="form-control has-feedback-left">
      </div> 
    </div> <br>

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="SEGUNDOAPELLIDO">SEGUNDO APELLIDO:</label>
      </div>

      <div class="col-md-5">
          <input type="text" name="Apellido2"  value="<?php echo $row->segundoApellido; ?>" 
            class="form-control has-feedback-left">
      </div> 
    </div> <br>                  

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="FECHA">FECHA NACIMIENTO:</label>
      </div>

      <div class="col-md-5">
          <input type="date" name="FechaNac"  value="<?php echo $row->fechaNacimiento; ?>" 
            class="form-control has-feedback-left">
      </div> 
    </div> <br>

    <div class="row">              
      <div class="col-md-4">
        <label class="col-form-label label-align" for="TELEFONO">TELEFONO:</label>
      </div>                               

      <div class="col-md-5">
          <input type="text" name="Telefono"  value="<?php echo $row->telefono; ?>" 
          class="form-control has-feedback-left">
      </div> 
    </div> <br>

    <div class="row">              
      <div class="col-md-4">
        <label class="col-form-label label-align" for="CARGO">CARGO:</label>
      </div>                               

      <div class="col-md-5">
          <input type="text" name="Cargo"  value="<?php echo $row->cargo; ?>" 
          class="form-control has-feedback-left">
      </div> 
    </div> <br>

  </font>

  <div class="col-md-12" align="center" style="background-color:#1D7070;">
    <button type="submit" class="btn btn-outline-success"> <i class="fas fa-user"></i> MODIFICAR DATOS EMPLEADO</button> 

        <?php echo form_close();
      }
      ?>

  </div> <br> <!-- izquierda = left derecha = right  --> 

</div>  <!-- fin agrupado todo formulario --> 

  

        </div>
      </div>    
    </div>    
   </div>
  </div>
</div>