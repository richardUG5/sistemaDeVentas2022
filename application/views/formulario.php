<div class="right_col " role="main">
  <div class="container md-3"> <!-- para reponsivo de vista -->
    <div class="row">
      <div class="col-md-12 col-ms-12"> <!-- para reponsivo de vista -->
        <div class="x_panel">
          <div class="x_content">

      <?php echo form_open_multipart('empleado/agregarbd'); ?>
      <br>

<!-- inicio agrupado todo formulario -->

<div class="item form-group has-feedback" style="background-color:#1D7070;" style="color:whitesmoke;" style="text-align:center" align="right">

  <font color="white"> <br>

    <div class="col-md-12" align="center">
      <font color="cyan">
        <h1><i class="fas fa-user"></i> AGREGAR NUEVO EMPLEADO</h1>
      </font> 
    </div>

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="NOMBRE" >NOMBRE:</label>
      </div>

      <div class="col-md-5">
        <input type="text" name="Nombre" placeholder="Ingrese su nombre" class="form-control has-feedback-left" required> <br>
      </div> 
    </div>

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label  label-align" for="PRIMERPELLIDO">PRIMER APELLIDO:</label>
      </div>

      <div class="col-md-5">
        <input type="text" name="Apellido1" placeholder="Ingrese su primer apellido" class="form-control has-feedback-left" required> <br>
      </div> 
    </div>

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="SEGUNDOAPELLIDO">SEGUNDO APELLIDO:</label>
      </div>

      <div class="col-md-5">
        <input type="text" name="Apellido2" placeholder="Ingrese su segundo apellido" class="form-control has-feedback-left"> <br>
      </div> 
    </div>

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="FECHA">FECHA NACIMIENTO:</label>
      </div>

      <div class="col-md-5">
        <input type="date" name="FechaNac" placeholder="Ingrese su fecha de nacimiento" class="form-control has-feedback-left" required> <br>
      </div> 
    </div> 

    <div class="row">              
      <div class="col-md-4">
        <label class="col-form-label label-align" for="TELEFONO">TELEFONO:</label>
      </div>                               

      <div class="col-md-5">
        <input type="text" name="Telefono" placeholder="Ingrese su telefono" class="form-control has-feedback-left" required> <br>
      </div> 
    </div> 


<div class="row">              
    <div class="col-md-4">
      <label class="col-form-label label-align" for="cargo">SLECCIONE UNA OPCION:</label>
    </div>
    <div class="col-md-1">
        <select class="col-form-label label-align" name="cargo" id="cargo">
            <option class="col-md-12" value="volvo">Admin</option>
            <option value="saab">Vendedor1</option>
            <option value="mercedes">Vendedor2</option>
            <option value="audi">Secre</option>
        </select>
    </div>
</div> <br>

    <div class="row">              
      <div class="col-md-4">
        <label class="col-form-label label-align" for="CARGO">CARGO:</label>
      </div>                               

      <div class="col-md-5">
        <input type="text" name="Cargo" placeholder="Ingrese su cargo" class="form-control has-feedback-left" required> 
      </div> 
    </div> <br> 

  </font>

  <div class="col-md-12" align="center" style="background-color:#1D7070;">
    <button type="submit" class="btn btn-outline-success"> <i class="fas fa-user"></i> AGREGAR NUEVO EMPLEADO</button>
    <?php echo form_close(); ?>
  </div> <br> <!-- izquierda = left derecha = right  --> 

</div> <!-- fin agrupado todo formulario -->

          </div>
        </div>
      </div>
    </div>
  </div>
</div>