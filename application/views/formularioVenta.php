<div class="right_col " role="main">
  <div class="container md-3"> <!-- para reponsivo de vista -->
    <div class="row">
      <div class="col-md-12 col-ms-12"> <!-- para reponsivo de vista -->
        <div class="x_panel">
          <div class="x_content">

      <?php echo form_open_multipart('venta/agregarbd'); ?>
      <br>

<!-- inicio agrupado todo formulario -->

<div class="item form-group has-feedback" style="background-color:#1D7070;" style="color:whitesmoke;" style="text-align:center" align="right">
    <font color="white"> <br>

        <div class="col-md-12" align="center">
            <font color="cyan">
              <h1><i class="fas fa-cube"></i> NUEVA VENTA</h1>
            </font> 
        </div>

    <div class="row">
        <div class="col-md-4">
          <label class="col-form-label  label-align" for="FECHA">FECHA:</label>
        </div>

        <div class="col-md-5">
            <input type="date" name="Fecha" placeholder="Ingrese fecha" class="form-control has-feedback-left" required> <br>
        </div> 
    </div>

    <div class="row">
        <div class="col-md-4">
          <label class="col-form-label label-align" for="TOTAL">TOTAL:</label>
        </div>

        <div class="col-md-5">
            <input type="double" name="Total" placeholder="Ingrese total" class="form-control has-feedback-left">
        </div> 
    </div> <br>

  <!------------ begin --------------->
    <div class="row">
        <div class="col-md-4">
          <label class="col-form-label label-align" for="CLIENTE">CLIENTE:</label>
        </div>

      <div class="col-md-5">
        <select name="idCliente" class="form-control">
            <option>Seleccione un cliente</option>
            <?php 
            foreach($cli->result() as $row)
            {?>
                <option value="<?php echo $row->idCliente;?>"><?php echo $row->nit_ci;?></option>
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
            <option>Seleccione usuario</option>
            <?php 
            foreach($usu->result() as $urow)
            {?>
                <option value="<?php echo $urow->idUsuario;?>"><?php echo $urow->nombres;?></option>
            <?php
            }
            ?>
        </select>
      </div> 
    </div><br> <!------------ fin --------------->

    </font>

    <div class="col-md-12" align="center" style="background-color:#1D7070;">
          <button type="submit" class="btn btn-outline-success"> <i class="fas fa-cube"></i> AGREGAR NUEVA VENTA</button>
          <?php echo form_close(); ?>
    </div> <br>

</div> <!-- fin agrupado todo formulario -->    

          </div>
        </div>
      </div>
    </div>
  </div>
</div>