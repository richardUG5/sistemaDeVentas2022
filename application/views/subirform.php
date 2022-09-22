
<div class="container" >
  <div class="row">
    <div class="col-md-12">

      <h1>Subir fotografia del empleado</h1>


<?php 
  echo form_open_multipart('empleado/subir'); 
?>

<input type="hidden" name="idempleado" value="<?php echo $idempleado; ?>">
<input type="file" name="userfile">
<button type="submit" class="btn btn-primary btn-xs">Subir</button>

<?php 
  echo form_close(); 
?>


    </div>
    
  </div>
</div>