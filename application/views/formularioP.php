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
              <h1><i class="fas fa-cube"></i> AGREGAR NUEVO PRODUCDO</h1>
            </font> 
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
          <label class="col-form-label label-align" for="PRECIO">PRECIO:</label>
        </div>

        <div class="col-md-5">
            <input type="double" name="Precio" placeholder="Ingrese precio" class="form-control has-feedback-left">
        </div> 
  </div> <br>

  <!------------ begin --------------->
    <div class="row">
        <div class="col-md-4">
          <label class="col-form-label label-align" for="CATEGORIA">CATEGORÍA:</label>
        </div>

      <div class="col-md-5">
        <select name="idCategoria" class="form-control">
            <option>Seleccione una categoría</option>
            <?php 
            foreach($cat->result() as $row)
            {?>
                <option value="<?php echo $row->idCategoria;?>"><?php echo $row->nombreCategoria;?></option>
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
            <option>Seleccione una medida</option>
            <?php 
            foreach($med->result() as $mrow)
            {?>
                <option value="<?php echo $mrow->idMedida;?>"><?php echo $mrow->unidadMedida;?></option>
            <?php
            }
            ?>
        </select>
      </div> 
    </div><br> <!------------ fin --------------->

    </font>

    <div class="col-md-12" align="center" style="background-color:#1D7070;">
          <button type="submit" class="btn btn-outline-success"> <i class="fas fa-cube"></i> AGREGAR NUEVO PRODUCTO</button>
          <?php echo form_close(); ?>
    </div> <br>

</div> <!-- fin agrupado todo formulario -->    

          </div>
        </div>
      </div>
    </div>
  </div>
</div>