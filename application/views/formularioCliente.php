<div class="right_col " role="main">
  <div class="container md-3"> <!-- para reponsivo de vista -->
    <div class="row">
      <div class="col-md-12 col-ms-12"> <!-- para reponsivo de vista -->
        <div class="x_panel">
          <div class="x_content">

      <?php echo form_open_multipart('cliente/agregarbd'); ?>
      <br>

<!-- inicio agrupado todo formularioCliente -->

<div class="item form-group has-feedback" style="background-color:#1D7070;" style="color:whitesmoke;" style="text-align:center" align="right">

  <font color="white"> <br>

    <div class="col-md-12" align="center">
      <font color="cyan">
        <h1><i class="fas fa-user"></i> AGREGAR NUEVO CLIENTE</h1>
      </font> 
    </div>

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="NITCI" >NIT/CI:</label>
      </div>

      <div class="col-md-5">
        <input type="text" name="Nit_Ci" placeholder="Ingrese su Nit o CI" class="form-control has-feedback-left" required> <br>
      </div> 
    </div>

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label  label-align" for="NOMBRECLIENTE">NOMBRE CLIENTE:</label>
      </div>

      <div class="col-md-5">
        <input type="text" name="NombreCliente" placeholder="Ingrese su nombre" class="form-control has-feedback-left" required> <br>
      </div> 
    </div>

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="RAZONSOCIAL">RAZON SOCIAL:</label>
      </div>

      <div class="col-md-5">
        <input type="text" name="RazonSocial" placeholder="Ingrese su razon social" class="form-control has-feedback-left"> <br>
      </div> 
    </div>

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="LIMITECREDITO">LIMITE CREDITO:</label>
      </div>

      <div class="col-md-5">
        <input type="double" name="LimiteCredito" placeholder="Ingrese su limite de credito" class="form-control has-feedback-left" required> <br>
      </div> 
    </div> <br> 

  </font>

  <div class="col-md-12" align="center" style="background-color:#1D7070;">
    <button type="submit" class="btn btn-outline-success"> <i class="fas fa-user"></i> AGREGAR NUEVO CLIENTE</button>
    <?php echo form_close(); ?>
  </div> <br> <!-- izquierda = left derecha = right  --> 

</div> <!-- fin agrupado todo formulario -->

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
