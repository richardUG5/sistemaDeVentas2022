<div class="right_col " role="main">
  <div class="container md-3"> <!-- para reponsivo de vista -->
    <div class="row">
      <div class="col-md-12 col-ms-12"> <!-- para reponsivo de vista -->
        <div class="x_panel">
          <div class="x_content">

      <?php echo form_open_multipart('detalleventa/agregarbd'); ?>
      <br>

<!-- inicio agrupado todo formulario -->

<div class="item form-group has-feedback" style="background-color:#1D7070;" style="color:whitesmoke;" style="text-align:center" align="right">
    <font color="white"> <br>

        <div class="col-md-12" align="center">
            <font color="cyan">
              <h1><i class="fas fa-cube"></i> NUEVA REGISTRO DETALLE VENTA</h1>
            </font> 
        </div>

    <!------------ begin --------------->
    <div class="row">
        <div class="col-md-4">
          <label class="col-form-label label-align" for="VENTA">VENTA:</label>
        </div>

      <div class="col-md-5">
        <select name="idVenta" class="form-control">
            <option>Seleccione una.....</option>
            <?php 
            foreach($ven->result() as $row)
            {?>
                <option value="<?php echo $row->idVenta;?>"><?php echo $row->fechaVenta;?></option>
            <?php
            }
            ?>
        </select>
      </div> 
    </div><br>

    <div class="row">
        <div class="col-md-4">
          <label class="col-form-label label-align" for="PRODUCTO">PRODUCTO:</label>
        </div>

      <div class="col-md-5">
        <select name="idProducto" class="form-control">
            <option>Seleccione una.....</option>
            <?php 
            foreach($pro->result() as $prow)
            {?>
                <option value="<?php echo $prow->idProducto;?>"><?php echo $prow->descripcion;?></option>
            <?php
            }
            ?>
        </select>
      </div> 
    </div><br> <!------------ fin --------------->

    <div class="row">
        <div class="col-md-4">
          <label class="col-form-label  label-align" for="CANTIDAD">CANTIDAD:</label>
        </div>

        <div class="col-md-5">
            <input type="double" name="Fecha" placeholder="Ingrese cantidad" class="form-control has-feedback-left" required> <br>
        </div> 
    </div>

    <div class="row">
        <div class="col-md-4">
          <label class="col-form-label label-align" for="PRECIOUNITARIO">PRECIO UNITARIO:</label>
        </div>

        <div class="col-md-5">
            <input type="double" name="Precio" placeholder="Ingrese precio" class="form-control has-feedback-left"> <br>
        </div> 
    </div> <br>

  

    </font>

    <div class="col-md-12" align="center" style="background-color:#1D7070;">
          <button type="submit" class="btn btn-outline-success"> <i class="fas fa-cube"></i> AGREGAR NUEVO DETALLE VENTA</button>
          <?php echo form_close(); ?>
    </div> <br>

</div> <!-- fin agrupado todo formulario -->    

          </div>
        </div>
      </div>
    </div>
  </div>
</div>