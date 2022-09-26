<div class="right_col " role="main">
  <div class="container md-3"> <!-- para reponsivo de vista -->
    <div class="row">
      <div class="col-md-12 col-ms-12"> <!-- para reponsivo de vista -->
        <div class="x_panel">
          <div class="x_content">

      <?php echo form_open_multipart('medida/agregarbd'); ?>
      <br>

<!-- inicio agrupado todo formularioCategoria -->

<div class="item form-group has-feedback" style="background-color:#1D7070;" style="color:whitesmoke;" style="text-align:center" align="right">

  <font color="white"> <br>

    <div class="col-md-12" align="center">
      <font color="cyan">
        <h1><i class="fas fa-cube"></i> AGREGAR NUEVA MEDIDA</h1>
      </font> 
    </div>
<!--
    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="NOMBRE" >NIT/CI:</label>
      </div>

      <div class="col-md-5">
        <input type="text" name="Nit_Ci" placeholder="Ingrese su Nit o CI" class="form-control has-feedback-left" required> <br>
      </div> 
    </div> ----->

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label  label-align" for="UNIDADMEDIDA">UNIDAD MEDIDA:</label>
      </div>

      <div class="col-md-5">
        <input type="text" name="UnidadMedida" placeholder="Ingrese medida" class="form-control has-feedback-left" required> <br>
      </div> 
    </div>
<!--
    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="SEGUNDOAPELLIDO">RAZON SOCIAL:</label>
      </div>

      <div class="col-md-5">
        <input type="text" name="RazonSocial" placeholder="Ingrese su razon social" class="form-control has-feedback-left"> <br>
      </div> 
    </div>

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="FECHA">LIMITE CREDITO:</label>
      </div>

      <div class="col-md-5">
        <input type="double" name="LimiteCredito" placeholder="Ingrese su limite de credito" class="form-control has-feedback-left" required> <br>
      </div> 
    </div> --> <br> 

  </font>

  <div class="col-md-12" align="center" style="background-color:#1D7070;">
    <button type="submit" class="btn btn-outline-success"> <i class="fas fa-cube"></i> AGREGAR NUEVA MEDIDA</button>
    <?php echo form_close(); ?>
  </div> <br> <!-- izquierda = left derecha = right  --> 

</div> <!-- fin agrupado todo formulario -->

          </div>
        </div>
      </div>
    </div>
  </div>
</div> 