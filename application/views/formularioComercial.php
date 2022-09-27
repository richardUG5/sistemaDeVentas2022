<div class="right_col " role="main">
  <div class="container md-3"> <!-- para reponsivo de vista -->
    <div class="row">
      <div class="col-md-12 col-ms-12"> <!-- para reponsivo de vista -->
        <div class="x_panel">
          <div class="x_content">

      <?php echo form_open_multipart('comercial/agregarbd'); ?>
      <br>

<!-- inicio agrupado todo formularioCliente -->

<div class="item form-group has-feedback" style="background-color:#1D7070;" style="color:whitesmoke;" style="text-align:center" align="right">

  <font color="white"> <br>

    <div class="col-md-12" align="center">
      <font color="cyan">
        <h1><i class="fas fa-user"></i> AGREGAR NUEVO COMERCIAL</h1>
      </font> 
    </div>

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="NOMBRECOMERCIAL" >NOMBRE COMERCIAL:</label>
      </div>

      <div class="col-md-5">
        <input type="text" name="NombreComercial" placeholder="Ingrese su nombre" class="form-control has-feedback-left" required> <br>
      </div> 
    </div>

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label  label-align" for="TELEFONO">TELEFONO:</label>
      </div>

      <div class="col-md-5">
        <input type="text" name="Telefono" placeholder="Ingrese su telefono" class="form-control has-feedback-left"> <br>
      </div> 
    </div>

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="DIRECCION">DIRECCION:</label>
      </div>

      <div class="col-md-5">
        <input type="text" name="Direccion" placeholder="Ingrese su direccion" class="form-control has-feedback-left" required> <br>
      </div> 
    </div> <br> 

  </font>

  <div class="col-md-12" align="center" style="background-color:#1D7070;">
    <button type="submit" class="btn btn-outline-success"> <i class="fas fa-user"></i> AGREGAR NUEVO COMERCIAL</button>
    <?php echo form_close(); ?>
  </div> <br> <!-- izquierda = left derecha = right  --> 

</div> <!-- fin agrupado todo formulario -->

          </div>
        </div>
      </div>
    </div>
  </div>
</div>