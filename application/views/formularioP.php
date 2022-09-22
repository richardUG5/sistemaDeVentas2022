
<div class="container btn btn-primary">
  <div class="row btn btn-danger">
    <div class="col-md-12">

      <br>
      <font color="orange">
        <h2>Agregar Producto</h2>
      </font>

      <?php echo form_open_multipart('producto/agregarbd'); ?>

      <br>  
      <input type="text" name="nombre" placeholder="Ingrese nombre producto" required> <br> <br>
      <input type="text" name="descripcion" placeholder="Ingrese descripcion" required> <br> <br>
      <input type="text" name="stockMinimo" placeholder="Ingrese cantidad minimo" required> <br> <br>
      <input type="text" name="stockMaximo" placeholder="Ingrese cantidad maximo" required> <br><br>
      <input type="text" name="Precio" placeholder="Ingrese precio producto" required> <br><br>

      <button type="submit" class="btn btn-primary">AGREGAR PRODUCTO</button>

      <?php echo form_close(); ?>

    </div>    
  </div>
</div>