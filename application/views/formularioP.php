<div class="right_col " role="main">
  <div class="container md-3"> <!-- para reponsivo de vista -->
    <div class="row">
      <div class="col-md-12 col-ms-12"> <!-- para reponsivo de vista -->
        <div class="x_panel">
          <div class="x_content">

      <?php echo form_open_multipart('producto/agregarbd'); ?>
      <br>

<!-- inicio agrupado todo formulario -->

<div class="item form-group has-feedback" style="background-color:#1D7070;" style="color:whitesmoke;" style="text-align:center" align="right">
    <font color="white"> <br>

        <div class="col-md-12" align="center">
            <font color="cyan">
              <h1><i class="fas fa-user"></i> AGREGAR NUEVO PRODUCDO</h1>
            </font> 
        </div>

    <div class="row">
        <div class="col-md-4">
          <label class="col-form-label label-align" for="NOMBRE">NOMBRE:</label>
        </div>

        <div class="col-md-5">
            <input type="text" name="Nombre" placeholder="Ingrese nombre producto" class="form-control has-feedback-left" required> <br>
        </div> 
    </div>

    <div class="row">
        <div class="col-md-4">
          <label class="col-form-label  label-align" for="DESCRIPCION">DESCRIPCION:</label>
        </div>

        <div class="col-md-5">
            <input type="text" name="Descripcion" placeholder="Ingrese descripcion" class="form-control has-feedback-left" required> <br>
        </div> 
    </div>

    <div class="row">
        <div class="col-md-4">
          <label class="col-form-label label-align" for="COLOR">COLOR:</label>
        </div>

        <div class="col-md-5">
            <input type="text" name="Color" placeholder="Ingrese color" class="form-control has-feedback-left"> <br>
        </div> 
    </div>

    <div class="row">
        <div class="col-md-4">
          <label class="col-form-label label-align" for="UNIDADMEDIDA">UNIDAD MEDIDA:</label>
        </div>

        <div class="col-md-5">
            <input type="text" name="UnidadMedida" placeholder="Ingrese unidad medida" class="form-control has-feedback-left"> <br>
        </div> 
    </div>

    <div class="row">
        <div class="col-md-4">
          <label class="col-form-label label-align" for="PRECIO">PRECIO:</label>
        </div>

        <div class="col-md-5">
            <input type="double" name="Precio" placeholder="Ingrese precio" class="form-control has-feedback-left">
        </div> 
    </div><br>

    </font>

    <div class="col-md-12" align="center" style="background-color:#1D7070;">
          <button type="submit" class="btn btn-outline-success"> <i class="fas fa-user"></i> AGREGAR NUEVO PRODUCTO</button>
          <?php echo form_close(); ?>
    </div> <br>

</div> <!-- fin agrupado todo formulario -->    

          </div>
        </div>
      </div>
    </div>
  </div>
</div>