<div class="right_col " role="main">
  <div class="container md-3"> <!-- para reponsivo de vista -->
    <div class="row">
      <div class="col-md-12 col-ms-12"> <!-- para reponsivo de vista -->
        <div class="x_panel">                  
          <div class="x_content">

           <?php
              foreach ($infocliente->result() as $row) 
              {          
                echo form_open_multipart('cliente/modificarbd'); 
                ?>
                <br>

                <input type="hidden" name="idcliente" value="<?php echo $row->idCliente; ?>">
  
<!-- inicio agrupado todo formulariomodificarCliente crea una columna col-md-1 -->

<div class="item form-group has-feedback" style="background-color:#1D7070;" style="color:white;" style="text-align:center" align="right">
  <font color="white"> <br>

    <div class="col-md-12" align="center">
      <font color="cyan">
        <h1><i class="fas fa-user"></i> MODIFICAR DATOS CLIENTE</h1>
      </font> 
    </div>

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="NITCI">NIT/CI:</label>
      </div>

      <div class="col-md-5">
          <input type="text" name="Nit_Ci"  value="<?php echo $row->nit_ci; ?>" 
            class="form-control has-feedback-left">
      </div> 
    </div> <br>     

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="CORREO">CORREO ELECTRONICO:</label>
      </div>

      <div class="col-md-5">
          <input type="text" name="Correo"  value="<?php echo $row->correoElectronico; ?>" 
            class="form-control has-feedback-left">
      </div> 
    </div> <br>

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="RAZONSOCIAL">RAZON SOCIAL:</label>
      </div>

      <div class="col-md-5">
          <input type="text" name="RazonSocial"  value="<?php echo $row->razonSocial; ?>" 
            class="form-control has-feedback-left">
      </div> 
    </div> <br>                  

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="LIMITECREDITO">LIMITE CREDITO:</label>
      </div>

      <div class="col-md-5">
          <input type="double" name="LimiteCredito"  value="<?php echo $row->limiteCredito; ?>" 
            class="form-control has-feedback-left">
      </div> 
    </div> <br>

  </font>

  <div class="col-md-12" align="center" style="background-color:#1D7070;">
    <button type="submit" class="btn btn-outline-success"> <i class="fas fa-user"></i> MODIFICAR DATOS CLIENTE</button> 

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