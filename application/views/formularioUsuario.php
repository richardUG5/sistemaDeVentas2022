<div class="right_col " role="main">
  <div class="container md-3"> <!-- para reponsivo de vista -->
    <div class="row">
      <div class="col-md-12 col-ms-12"> <!-- para reponsivo de vista -->
        <div class="x_panel">
          <div class="x_content">

      <?php echo form_open_multipart('usuarios/agregarbd'); ?>
      <br>

<!-- inicio agrupado todo formulario -->

<div class="item form-group has-feedback" style="background-color:#1D7070;" style="color:whitesmoke;" style="text-align:center" align="right">
    <font color="white"> <br>

        <div class="col-md-12" align="center">
            <font color="cyan">
              <h1><i class="fas fa-user-tie fa-fw"></i> &nbsp; AGREGAR NUEVO USUARIO</h1>
            </font> 
        </div>

    <div class="row">
        <div class="col-md-4">
          <label class="col-form-label  label-align" for="NOMBRES">NOMBRES:</label>
        </div>

        <div class="col-md-5">
            <input type="text" name="Nombres" placeholder="Ingrese nombres" class="form-control has-feedback-left" required> <br>
        </div> 
    </div>

    <div class="row">
        <div class="col-md-4">
          <label class="col-form-label  label-align" for="PRIMERAPELLIDO">PRIMER APELLIDO:</label>
        </div>

        <div class="col-md-5">
            <input type="text" name="Apellido1" placeholder="Ingrese primer apellido" class="form-control has-feedback-left" required> <br>
        </div> 
    </div>

    <div class="row">
        <div class="col-md-4">
          <label class="col-form-label label-align" for="SEGUNDOAPELLIDO">SEGUNDO APELLIDO:</label>
        </div>

        <div class="col-md-5">
            <input type="text" name="Apellido2" placeholder="Ingrese segundo apellido" class="form-control has-feedback-left"> <br>
        </div> 
    </div>

    <div class="row">
        <div class="col-md-4">
          <label class="col-form-label label-align" for="FECHANACIMIENTO">FECHA NACIMIENTO:</label>
        </div>

        <div class="col-md-5">
            <input type="date" name="FechaNac" placeholder="Ingrese fecha nac" class="form-control has-feedback-left" required> <br>
        </div> 
    </div>

    <div class="row">
        <div class="col-md-4">
          <label class="col-form-label label-align" for="TELEFONO">TELEFONO:</label>
        </div>

        <div class="col-md-5">
            <input type="text" name="Telefono" placeholder="Ingrese telefono" class="form-control has-feedback-left" required> <br>
        </div> 
    </div> 

    <div class="row">
        <div class="col-md-4">
          <label class="col-form-label label-align" for="LOGIN">LOGIN:</label>
        </div>

        <div class="col-md-5">
            <input type="text" name="Login" placeholder="Ingrese su login" class="form-control has-feedback-left" required> <br>
        </div> 
    </div>

    <div class="row">
        <div class="col-md-4">
          <label class="col-form-label label-align" for="PASSWORD">PASSWORD:</label>
        </div>

        <div class="col-md-5">
            <input type="text" name="Password" placeholder="Ingrese su password" class="form-control has-feedback-left" required> <br>
        </div> 
    </div>    

    <div class="row">
        <div class="col-md-4">
          <label class="col-form-label label-align" for="TIPO">TIPO:</label>
        </div>

        <div class="col-md-5">
            <input type="text" name="Tipo" placeholder="Ingrese su rol" class="form-control has-feedback-left" required> <br>
        </div> 
    </div> 

<!-------------- begin -----------LLAMADA DE LA TABLA COMERCIAL---------------------------------->
    <div class="row">
        <div class="col-md-4">
          <label class="col-form-label label-align" for="COMERCIAL">COMERCIAL:</label>
        </div>

      <div class="col-md-5">
        <select name="idComercial" class="form-control">
            <option>Seleccione comercial</option>
            <?php 
            foreach($com->result() as $row)
            {?>
                <option value="<?php echo $row->idComercial;?>"><?php echo $row->nombreComercial;?></option>
            <?php
            }
            ?>
        </select>
      </div> 
    </div><br>
 <!--------------- end ----------------------------------------------------------------------->

    </font>

    <div class="col-md-12" align="center" style="background-color:#1D7070;">
          <button type="submit" class="btn btn-outline-success"> <i class="fas fa-user"></i> AGREGAR NUEVO USUARIO</button>
          <?php echo form_close(); ?>
    </div> <br>

</div> <!-- fin agrupado todo formulario -->    

          </div>
        </div>
      </div>
    </div>
  </div>
</div>