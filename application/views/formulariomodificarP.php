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
    </div> <br>

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
        <label class="col-form-label label-align" for="PRECIO">PRECIO:</label>
      </div>

      <div class="col-md-5">
          <input type="double" name="Precio"  value="<?php echo $row->precioBase; ?>" 
            class="form-control has-feedback-left">
      </div> 
    </div> <br>

    

    <!------------ begin --------------->
    <div class="row">
      <div class="col-md-4">
          <label class="col-form-label label-align" for="CATEGORIA">CATEGORÍA:</label>
      </div>

      <div class="col-md-5">
        <select name="idCategoria" class="form-control">
            <option value="<?php echo $row->idCategoria;?>"><?php echo $row->nombreCategoria;?></option>
            <?php 
            foreach($cat->result() as $crow)
            {?>
                <option value="<?php echo $crow->idCategoria;?>"><?php echo $crow->nombreCategoria;?></option>
            <?php
            } 
            ?>
        </select>
      </div> 
    </div><br>

    <div class="row">
      <div class="col-md-4">
          <label class="col-form-label label-align" for="MEDIDA">MEDIDA:</label>
      </div>
      <div class="col-md-5">
        <select name="idMedida" class="form-control">
            <option value="<?php echo $row->idMedida;?>"><?php echo $row->unidadMedida;?></option>
            <?php 
            foreach($med->result() as $mrow)
            {?>
                <option value="<?php echo $mrow->idMedida;?>"><?php echo $mrow->unidadMedida;?></option>
            <?php
            } 
            ?>
        </select>
      </div> 
    </div><br> <!---------- fin --------------->

     <br>

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