
<div class="container">
  <div class="row">
    <div class="col-md-12">

      <br>
      <font color="orange">
        <h2>MODIFICAR PRODUCTO</h2>
      </font>

       <?php

        foreach ($infoproducto->result() as $row) 
        {          
          echo form_open_multipart('producto/modificarbd'); 
          ?>
          <br>

          <input type="hidden" name="idproducto" value="<?php echo $row->idProducto; ?>">

          <input type="text" name="nombre" placeholder="Ingrese nombre producto" value="<?php echo $row->nombre; ?>"> <br> <br>
          <input type="text" name="descripcion" placeholder="Ingrese descripcion" value="<?php echo $row->descripcion; ?>"> <br> <br>
          <input type="text" name="stockMinimo" placeholder="Ingrese cantidad minimo" value="<?php echo $row->stockMinimo; ?>"> <br> <br>
          <input type="text" name="stockMaximo" placeholder="Ingrese cantidad maximo" value="<?php echo $row->stockMaximo; ?>"> <br><br>
          <input type="text" name="Precio" placeholder="Ingrese precio producto" value="<?php echo $row->precio; ?>"> <br><br>

          <button type="submit" class="btn btn-success">MODIFICAR PRODUCTO</button>
          <?php echo form_close();
        }
        ?>


    </div>    
  </div>
</div>