
<div class="container">
  <div class="row" > 
    <div class="col-md-12">

       <font color="orange">
        <h1>Lista de productos habilitados</h1>
      </font>

      <?php echo form_open_multipart('producto/agregar'); ?>
      <button type="submit" class="btn btn-primary">AGREGAR PRODUCTO</button>
      <?php echo form_close(); ?>

      <?php echo form_open_multipart('producto/deshabilitados'); ?>
      <button type="submit" name="buton2" class="btn btn-warning">VER PRODUCTOS DESHABILITADOS</button>
      <?php echo form_close(); ?>

      

      <table class="table">
        <thead>        
          <tr>
            <th scope="col">Nro</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Stock Minimo</th>
            <th scope="col">Stock Maximo</th>
            <th scope="col">Precio</th> 

          <th scope="col">Modificar</th>
          <th scope="col">Eliminar</th>
          <th scope="col">Deshabilitar</th>
          </tr> 
        </thead>
      <tbody>        

<?php

$indice=1;
foreach ($productos->result() as $row)
{
  ?>
    <tr>
        <th scope="row"><?php echo $indice; ?></th>
        <td><?php echo $row->nombre; ?></td>
        <td><?php echo $row->descripcion; ?></td>
        <td><?php echo $row->stockMinimo; ?></td>
        <td><?php echo $row->stockMaximo; ?></td> 
        <td><?php echo $row->precio; ?></td>

        <td>
          <?php echo form_open_multipart("producto/modificar"); ?>

          <input type="hidden" name="idproducto" value="<?php echo $row->idProducto; ?>">
          <input type="submit" name="buttony" value="Modificar" class="btn btn-success">

          <?php echo form_close(); ?>


        </td>        

        <td>
          <?php echo form_open_multipart('producto/eliminarbd'); ?>

          <input type="hidden" name="idproducto" value="<?php echo $row->idProducto; ?>">
          <button type="submit" class="btn btn-danger">ELIMINAR</button>

          <?php echo form_close(); ?>

        </td>       

        <td>
           <?php echo form_open_multipart("producto/deshabilitarbd"); ?>

          <input type="hidden" name="idproducto" value="<?php echo $row->idProducto; ?>">
          <input type="submit" name="buttonz" value="Deshabilitar" class="btn btn-warning">

          <?php echo form_close(); ?>
        </td>
        
    </tr>
  <?php
  $indice++; // contador incrementa
}
?>
   
   
  </tbody>
</table>


    </div>
    
  </div>
</div>