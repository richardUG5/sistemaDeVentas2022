<div class="right_col " role="main">
  <div class="container md-3"> <!-- para reponsivo de vista -->
    <div class="row">
      <div class="col-md-12 col-ms-12"> <!-- para reponsivo de vista -->
        <div class="x_panel">                  
          <div class="x_content">

           <?php
              foreach ($infocategoria->result() as $row) 
              {          
                echo form_open_multipart('categoria/modificarbd'); 
                ?>
                <br>

                <input type="hidden" name="idcategoria" value="<?php echo $row->idCategoria; ?>">
  
<!-- inicio agrupado todo formulariomodificarCategoria crea una columna col-md-1 -->

<div class="item form-group has-feedback" style="background-color:#1D7070;" style="color:white;" style="text-align:center" align="right">
  <font color="white"> <br>

    <div class="col-md-12" align="center">
      <font color="cyan">
        <h1><i class="fas fa-cube"></i> MODIFICAR DATOS CATEGORIA</h1>
      </font> 
    </div> <br>

<!--    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="NITCI">NIT/CI:</label>
      </div>

      <div class="col-md-5">
          <input type="text" name="Nit_Ci"  value="<?php// echo $row->nit_ci; ?>" 
            class="form-control has-feedback-left">
      </div> 
    </div> <br> -->

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="NOMBRECLIENTE">NOMBRE CATEGORIA:</label>
      </div>

      <div class="col-md-5">
          <input type="text" name="NombreCategoria"  value="<?php echo $row->nombreCategoria; ?>" 
            class="form-control has-feedback-left">
      </div> 
    </div> <br>

<!--    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="RAZONSOCIAL">RAZON SOCIAL:</label>
      </div>

      <div class="col-md-5">
          <input type="text" name="RazonSocial"  value="<?php //echo $row->razonSocial; ?>" 
            class="form-control has-feedback-left">
      </div> 
    </div> <br>                  

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="LIMITECREDITO">LIMITE CREDITO:</label>
      </div>

      <div class="col-md-5">
          <input type="double" name="LimiteCredito"  value="<?php //echo $row->limiteCredito; ?>" 
            class="form-control has-feedback-left">
      </div> 
    </div> --> <br>

  </font>

  <div class="col-md-12" align="center" style="background-color:#1D7070;">
    <button type="submit" class="btn btn-outline-success"> <i class="fas fa-cube"></i> MODIFICAR DATOS CATEGORIA</button> 

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