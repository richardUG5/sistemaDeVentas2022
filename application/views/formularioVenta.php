<div class="right_col " role="main">
  <div class="container-fluid"> <!-- para reponsivo de vista -->
    <div class="row">
      <div class="col-lg-12"> <!-- para reponsivo de vista -->
        <div class="x_panel">
          <div class="x_content">


<!-- <div class="container-fluid">
  <div class="row">
    <div class="col-lg-12"> -->


      <?php echo form_open_multipart('venta/agregarbd'); ?>
      <br>

<!-- inicio agrupado todo formulario bgcolor="#022424" -->

<div class="item form-group has-feedback" style="background-color:#022424;" style="color:whitesmoke;" style="text-align:center" align="right">
    <font color="white"> <br>

        <div class="col-md-12" align="center">
            <font color="cyan">
              <h3><i class="fas fa-cube"></i> REGISTRAR NUEVA VENTA</h3>
            </font> 
        </div>

<!-- -----------------PARA FECHA CON SCRIPT-----------------
<span align="right_col">
<div id="current_date">
    <script>
        date = new Date();
        year = date.getFullYear();
        month = date.getMonth() + 1;
        day = date.getDate();
        var fecha =document.getElementById("current_date").innerHTML = "FECHA: "+ day + "/" + month + "/" + year;
    </script>
</span>
<br> -->

<?php // Obteniendo la fecha actual
  $fechaActual = date('d-m-Y');
?>

<br>
<div class="row">
    <div class="col-md-4" align="right">
          <label class="col-form-label label-align=" for="FECHA"><i class="fas fa-box fa-fw"></i>&nbsp;FECHA: </label>
          <font color="cyan">
            <label for="start"><?php echo $fechaActual ?></label>
          </font>
    </div> <br> <br>
</div>



<!------------ dsd aqui --------------->
    <div class="row">
          <div class="col-md-4">
            <label class="col-form-label label-align" for="FECHA">FECHA:</label>
          </div>
        <div class="col-md-5">
            <input type="date" id="start" name="Fecha" value="<?php echo $fechaActual ?>" class="form-control has-feedback-left" style="text-align:center">
        </div> 
    </div> <br>



    <div class="row">
      <div class="col-md-4">
        <label class="col-form-label label-align" for="TOTAL">TOTAL:</label>
      </div>

      <div class="col-md-5">
        <input type="double" name="Total" placeholder="Ingrese total" class="form-control has-feedback-left">
      </div> 
    </div> <br> 
<!------------ hasta aqui --------------->



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
    </div>


<!--    <div class="row">
        <div class="col-md-4">
          <label class="col-form-label label-align" for="USUARIO">USUARIO:</label>
        </div>

      <div class="col-md-5">
        <select name="idUsuario" class="form-control">
            <option>Seleccione usuario</option>
            <?php 
            //foreach($usu->result() as $urow)
            {?>
                <option value="<?php //echo $urow->idUsuario;?>"><?php //echo $urow->nombres;?></option>
            <?php
            }
            ?>
        </select>
      </div> 
    </div><br> ----------->

    <!------------ fin --------------->
<hr>

    <div class="col-md-12" align="center">
        <font color="cyan">
            <h3><i class="fas fa-user-tie fa-fw"></i>&nbsp; DATOS DEL CLIENTE</h3>
        </font> 
    </div>

<div class="row" align="center">

    <div class="col-lg-2">
        <div class="form-group">
            <label><i class="fas fa-search fa-fw"></i>&nbsp; NIT/CI:</label>
            <input type="number" name="dni_cliente" id="dni_cliente" class="form-control">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label>CORREO ELECTRONICO</label>
            <input type="text" name="nom_cliente" id="nom_cliente" class="form-control" disabled required>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label>RAZON SOCIAL</label>
            <input type="number" name="tel_cliente" id="tel_cliente" class="form-control" disabled required>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label>LIMITE CREDITO</label>
            <input type="text" name="dir_cliente" id="dir_cliente" class="form-control" disabled required>
        </div>
    </div>
</div>
    <hr>

    <div class="col-md-12" align="center">
        <font color="cyan">
            <h3><i class="fas fa-cubes fa-fw"></i>&nbsp; DETALLE DE NUEVA VENTA</h3>
        </font> 
    </div>

<div class="table-responsive">
    <table class="table table-hover table-bordered border-primary" >
        <thead  class="thead-dark" align="center">
            <tr>
                <th width="100px">ID PRODUCTO</th>
                <th>DESCRIPCION</th>
                <th>PROD_EXISTE</th>
                <th width="100px">CANTIDAD</th>
                <th class="textright">PRECIO</th>
                <th class="textright">TOTAL</th>
                <th>AGREGAR</th>
            </tr>
            <tr align="center">
                <td><input type="number" name="txt_cod_producto" id="txt_cod_producto"></td>
                <td id="txt_descripcion">-</td>
                <td id="txt_existencia">-</td>
                <td><input type="text" name="txt_cant_producto" id="txt_cant_producto"value="0" min="1" disabled></td>
                <td id="txt_precio" class="textright">0.00</td>
                <td id="txt_precio_total" class="txtright">0.00</td>
                <td><a href="#" id="add_product_venta" class="btn btn-dark" style="display: none;">AGREGAR</a></td>
            </tr>
            <tr align="center">
                <th>ID PRODUCTO</th>
                <th colspan="2">DESCRIPCION</th>
                <th>CANTIDAD</th>
                <th class="textright">PRECIO</th>
                <th class="textright">TOTAL</th>
                <th>ELIMINAR</th>
            </tr>
        </thead>
        <tbody id="detalle_venta">
            <!-- Contenido ajax -->

        </tbody>

        <tfoot id="detalle_totales">
        <!-- Contenido ajax -->
        </tfoot>
    </table>
</div>

<!--
    <div class="col-md-12" align="center">
            <font color="cyan">
              <h1><i class="fas fa-cube"></i> DETALLE DE NUEVA VENTA</h1>
            </font> 
    </div>
<hr>
<table class="table table-dark table-hover table-bordered border-primary">
  <thead>
    <tr bgcolor="#022424" align="center">
      <th bgcolor="#022424" scope="col">NUMERO</th>
      <th scope="col">DESCRIPCION</th>
      <th scope="col">CANTIDAD</th>
      <th scope="col">PRECIO UNITARIO</th>
      <th scope="col">IMPORTE</th>
    </tr>
  </thead>
  <tbody>
    <tr align="center">
      <th bgcolor="#022424" scope="row">1</th>
      <td>Ceramica Lizo</td>
      <td align="center">2</td>
      <td align="center">33</td>
      <td align="center">66</td>
    </tr>
    <tr align="center">
      <th bgcolor="#022424" scope="row">2</th>
      <td>Ceramica piedra</td>
      <td align="center">3</td>
      <td align="center">31</td>
      <td align="center">93</td>
    </tr>
    <tr>
      <td bgcolor="#022424" colspan="4" align="right">T O T @ L</td>
      <td bgcolor="#022424" align="center">169</td>
    </tr>
  </tbody>
</table>
<br> -->
<hr>
    <div class="col-lg-3" align="right">
        <div class="form-group">
          <button type="submit" class="btn btn-info"> <i class="fas fa-cube"></i> AGREGAR NUEVA VENTA</button>
          <?php echo form_close(); ?>
        </div> <br>
    </div>

<!--    <div class="row">
        <div class="col-md-4">
          <label class="col-form-label  label-align" for="FECHA">FECHA:</label>
        </div>
    <div class="col-md-5">
            <input type="text" name="Fecha" value="<?php //echo $fechaActual ?>" class="form-control has-feedback-left" style="text-align:center" disabled> <br>
        </div> 
    </div>

    <div class="row">
        <div class="col-md-4">
          <label class="col-form-label label-align" for="TOTAL">TOTAL:</label>
        </div>

        <div class="col-md-5">
            <input type="double" name="Total" placeholder="Ingrese total" class="form-control has-feedback-left">
        </div> 
    </div> ----->

    </font>
</div> <!-- fin agrupado todo formulario -->    

          </div>
        </div>
      </div>
    </div>
  </div>
</div>