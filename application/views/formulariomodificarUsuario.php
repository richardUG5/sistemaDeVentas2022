<div class="right_col " role="main">
  <div class="container md-3"> <!-- para reponsivo de vista -->
    <div class="row">
      <div class="col-md-12 col-ms-12"> <!-- para reponsivo de vista -->
        <div class="x_panel">                  
          <div class="x_content">

<?php

  foreach ($infousuario->result() as $row) 
  {  // Inicio del ciclo for ----------------------------------------------------       
    echo form_open_multipart('usuarios/modificarbd'); 
?> <br>

  <input type="hidden" name="idusuario" value="<?php echo $row->idUsuario; ?>">

<!-- inicio agrupado todo formulario crea una columna col-md-1 -->

<div class="item form-group has-feedback" style="background-color:#1D7070;" style="color:white;" style="text-align:center" align="right">
  <font color="white"> <br>

    <div class="col-md-12" align="center">
      <font color="cyan">
        <h1><i class="fas fa-user"></i> MODIFICAR DATOS USUARIO</h1>
      </font> 
    </div> <br>

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="NOMBRES">NOMBRES:</label>
      </div>

      <div class="col-md-5"> <!-- ----FORM----------------------------BD --------->
          <input type="text" name="Nombres"  value="<?php echo $row->nombres; ?>" 
            class="form-control has-feedback-left"> <br>
      </div> 
    </div>

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="PRIMERAPELLIDO">PRIMER APELLIDO:</label>
      </div>

      <div class="col-md-5">
          <input type="text" name="Apellido1"  value="<?php echo $row->primerApellido; ?>" 
            class="form-control has-feedback-left"> <br>
      </div> 
    </div>

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="SEGUNDOAPELLIDO">SEGUNDO APELLIDO:</label>
      </div>

      <div class="col-md-5">
          <input type="text" name="Apellido2"  value="<?php echo $row->segundoApellido; ?>" 
            class="form-control has-feedback-left"> <br>
      </div> 
    </div>

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="FECHANACIMIENTO">FECHA NACIMIENTO:</label>
      </div>

      <div class="col-md-5">
          <input type="date" name="FechaNac"  value="<?php echo $row->fechaNacimiento; ?>" 
            class="form-control has-feedback-left"> <br>
      </div> 
    </div>

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="TELEFONO">TELEFONO:</label>
      </div>

      <div class="col-md-5">
          <input type="text" name="Telefono"  value="<?php echo $row->telefono; ?>" 
            class="form-control has-feedback-left"> <br>
      </div> 
    </div>

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="LOGIN">LOGIN:</label>
      </div>

      <div class="col-md-5">
          <input type="text" name="Login"  value="<?php echo $row->login; ?>" 
            class="form-control has-feedback-left"> <br>
      </div> 
    </div>

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="PASSWORD">PASSWORD:</label>
      </div>

      <div class="col-md-5">
          <input type="text" name="Password"  value="<?php echo $row->password; ?>" 
            class="form-control has-feedback-left"> <br>
      </div> 
    </div>

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="TIPO">TIPO:</label>
      </div>

      <div class="col-md-5">
          <input type="text" name="Tipo"  value="<?php echo $row->tipo; ?>" 
            class="form-control has-feedback-left"> <br>
      </div> 
    </div> <br>    

    <!------------ begin -------LLAMADA DE LA TABLA COMERCIAL ---------------------------------->
    <div class="row">
      <div class="col-md-4">
          <label class="col-form-label label-align" for="COMERCIAL">COMERCIAL:</label>
      </div>

      <div class="col-md-5">
        <select name="idComercial" class="form-control">
            <option value="<?php echo $row->idComercial;?>"><?php echo $row->nombreComercial;?></option>
            <?php 
            foreach($com->result() as $crow)
            {?>
                <option value="<?php echo $crow->idComercial;?>"><?php echo $crow->nombreComercial;?></option>
            <?php
            } 
            ?>
        </select>
      </div> 
    </div><br>
 <!---------- fin ------------------------------------------------------------------------>
     <br>

  </font>

    <div class="col-md-12" align="center" style="background-color:#1D7070;">
      <button type="submit" class="btn btn-outline-success"> <i class="fas fa-user"></i> MODIFICAR DATOS USUARIO</button> 

<?php echo form_close();
  } // cierre del ciclo for --------------------------------------------
?>

    </div> <br> <!-- izquierda = left derecha = right  --> 

</div> <!-- fin agrupado todo formulario -->

        </div>
      </div>    
    </div>    
   </div>
  </div>
</div>