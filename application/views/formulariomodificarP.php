<div class="right_col " role="main">
  <div class="container md-3"> <!-- para reponsivo de vista -->
    <div class="row">
      <div class="col-md-12 col-ms-12"> <!-- para reponsivo de vista -->
        <div class="x_panel">                  
          <div class="x_content">

<?php

  foreach ($infoproducto->result() as $row) 
  {  // Inicio del ciclo for ----------------------------------------------------       
    echo form_open_multipart('producto/modificarbd'); 
?> <br>

  <input type="hidden" name="idproducto" value="<?php echo $row->idProducto; ?>">

<!-- inicio agrupado todo formulario crea una columna col-md-1 -->

<div class="item form-group has-feedback" style="background-color:#1D7070;" style="color:white;" style="text-align:center" align="right">
  <font color="white"> <br>

    <div class="col-md-12" align="center">
      <font color="cyan">
        <h1><i class="fas fa-cube"></i> MODIFICAR DATOS PRODUCTO</h1>
      </font> 
    </div>

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="NOMBRE">NOMBRE:</label>
      </div>

      <div class="col-md-5">
          <input type="text" name="Nombre"  value="<?php echo $row->nombre; ?>" 
            class="form-control has-feedback-left"> <br>
      </div> 
    </div>

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="DESCRIPCION">DESCRIPCION:</label>
      </div>

      <div class="col-md-5">
          <input type="text" name="Descripcion"  value="<?php echo $row->descripcion; ?>" 
            class="form-control has-feedback-left"> <br>
      </div> 
    </div>

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="COLOR">COLOR:</label>
      </div>

      <div class="col-md-5">
          <input type="text" name="Color"  value="<?php echo $row->color; ?>" 
            class="form-control has-feedback-left"> <br>
      </div> 
    </div>

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="UNIDADMEDIDA">UNIDAD MEDIDA:</label>
      </div>

      <div class="col-md-5">
          <input type="text" name="UnidadMedida"  value="<?php echo $row->unidadMedida; ?>" 
            class="form-control has-feedback-left"> <br>
      </div> 
    </div>

    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="PRECIO">PRECIO:</label>
      </div>

      <div class="col-md-5">
          <input type="text" name="Precio"  value="<?php echo $row->precio; ?>" 
            class="form-control has-feedback-left">
      </div> 
    </div> <br>

  </font>

    <div class="col-md-12" align="center" style="background-color:#1D7070;">
      <button type="submit" class="btn btn-outline-success"> <i class="fas fa-cube"></i> MODIFICAR DATOS PRODUCTO</button> 

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