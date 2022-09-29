<div class="right_col " role="main">
  <div class="container md-3"> <!-- para reponsivo de vista -->
    <div class="row">
      <div class="col-md-12 col-ms-12"> <!-- para reponsivo de vista -->
        <div class="x_panel">                  
          <div class="x_content">

<?php

  foreach ($infoventa->result() as $row) 
  {  // Inicio del ciclo for ----------------------------------------------------       
    echo form_open_multipart('venta/modificarbd'); 
?> <br>

  <input type="hidden" name="idventa" value="<?php echo $row->idVenta; ?>">

<!-- inicio agrupado todo formulario crea una columna col-md-1 -->

<div class="item form-group has-feedback" style="background-color:#1D7070;" style="color:white;" style="text-align:center" align="right">
  <font color="white"> <br>

    <div class="col-md-12" align="center">
      <font color="cyan">
        <h1><i class="fas fa-cube"></i> MODIFICAR DATOS VENTA</h1>
      </font> 
    </div> <br>

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="FECHA">FECHA:</label>
      </div>

      <div class="col-md-5">
          <input type="date" name="Fecha"  value="<?php echo $row->fechaVenta; ?>" 
            class="form-control has-feedback-left"> <br>
      </div> 
    </div>

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="TOTAL">TOTAL:</label>
      </div>

      <div class="col-md-5">
          <input type="text" name="Total"  value="<?php echo $row->total; ?>" 
            class="form-control has-feedback-left"> <br>
      </div> 
    </div> <br>    

    <!------------ begin --------------->
    <div class="row">
      <div class="col-md-4">
          <label class="col-form-label label-align" for="CLIENTE">CLIENTE:</label>
      </div>

      <div class="col-md-5">
        <select name="idCliente" class="form-control">
            <option value="<?php echo $row->idCliente;?>"><?php echo $row->nit_ci;?></option>
            <?php 
            foreach($cli->result() as $crow)
            {?>
                <option value="<?php echo $crow->idCliente;?>"><?php echo $crow->nit_ci;?></option>
            <?php
            } 
            ?>
        </select>
      </div> 
    </div><br>

    <div class="row">
      <div class="col-md-4">
          <label class="col-form-label label-align" for="USUARIO">USUARIO:</label>
      </div>
      <div class="col-md-5">
        <select name="idUsuario" class="form-control">
            <option value="<?php echo $row->idUsuario;?>"><?php echo $row->nombres;?></option>
            <?php 
            foreach($usu->result() as $urow)
            {?>
                <option value="<?php echo $urow->idUsuario;?>"><?php echo $urow->nombres;?></option>
            <?php
            } 
            ?>
        </select>
      </div> 
    </div><br> <!---------- fin --------------->

     <br>

  </font>

    <div class="col-md-12" align="center" style="background-color:#1D7070;">
      <button type="submit" class="btn btn-outline-success"> <i class="fas fa-cube"></i> MODIFICAR DATOS VENTA</button> 

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