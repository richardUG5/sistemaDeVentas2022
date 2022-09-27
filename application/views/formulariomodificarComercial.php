<div class="right_col " role="main">
  <div class="container md-3"> <!-- para reponsivo de vista -->
    <div class="row">
      <div class="col-md-12 col-ms-12"> <!-- para reponsivo de vista -->
        <div class="x_panel">                  
          <div class="x_content">

           <?php
              foreach ($infocomercial->result() as $row) 
              {          
                echo form_open_multipart('comercial/modificarbd'); 
                ?>
                <br>

                <input type="hidden" name="idcomercial" value="<?php echo $row->idComercial; ?>">
  
<!-- inicio agrupado todo formulariomodificarComercial crea una columna col-md-1 -->

<div class="item form-group has-feedback" style="background-color:#1D7070;" style="color:white;" style="text-align:center" align="right">
  <font color="white"> <br>

    <div class="col-md-12" align="center">
      <font color="cyan">
        <h1><i class="fas fa-user"></i> MODIFICAR DATOS COMERCIAL</h1>
      </font> 
    </div>

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="NOMBRECOMERCIAL">NOMBRE COMERCIAL:</label>
      </div>

      <div class="col-md-5"> <!-- ----FORM------------------------------------BD --------->
          <input type="text" name="NombreComercial"  value="<?php echo $row->nombreComercial; ?>" 
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
        <label class="col-form-label label-align" for="DIRECCION">DIRECCION:</label>
      </div>

      <div class="col-md-5">
          <input type="text" name="Direccion"  value="<?php echo $row->direccion; ?>" 
            class="form-control has-feedback-left">
      </div> 
    </div> <br>

  </font>

  <div class="col-md-12" align="center" style="background-color:#1D7070;">
    <button type="submit" class="btn btn-outline-success"> <i class="fas fa-user"></i> MODIFICAR DATOS COMERCIAL</button> 

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