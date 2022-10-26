<?php include_once "includes/header.php"; ?>

<!-- Contenido de la página de inicio -->
<div class="container-fluid">

	<!-- Encabezado de página -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-cubes"></i> GESTION DE PRODUCTOS</h1>
		<a href="registro_producto.php" class="btn btn-info"> <i class="fas fa-cube"></i> NUEVO PRODUCTO</a>
		<a href="nueva_venta.php" class="btn btn-info"> <i class="fas fa-user-plus"></i>&nbsp;NUEVA VENTA</a>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered" id="table">
					<thead class="thead-dark">
						<tr align=center>
							<th>Nro</th>
							<th>DESCRIPCION/PRODUCTO</th>
							<th>PRECIO</th>
							<th>PRODUCTO EXISTENTE</th>
							<?php if ($_SESSION['rol'] == 1) { ?>
							<th>ACCIONES/OPERACIONES CRUD</th>
							<?php } ?>
						</tr>
					</thead>
					<tbody bgcolor="#022424">
						<?php
						include "../conexion.php";

						$query = mysqli_query($conexion, "SELECT * FROM producto");
						$result = mysqli_num_rows($query);
						if ($result > 0) {
							while ($data = mysqli_fetch_assoc($query)) { ?>
								<tr align=center>
									<td><?php echo $data['codproducto']; ?></td>
									<td><?php echo $data['descripcion']; ?></td>
									<td><?php echo $data['precio']; ?></td>
									<td><?php echo $data['existencia']; ?></td>
										<?php if ($_SESSION['rol'] == 1) { ?>
									<td>
										<a href="agregar_producto.php?id=<?php echo $data['codproducto']; ?>" class="btn btn-primary"><i class='fas fa-audio-description'></i> AGREGAR NUEVO PRECIO Y CANTIDAD</a>

										<a href="editar_producto.php?id=<?php echo $data['codproducto']; ?>" class="btn btn-success"><i class='fas fa-edit'></i> MODIFICAR</a>

										<form action="eliminar_producto.php?id=<?php echo $data['codproducto']; ?>" method="post" class="confirmar d-inline">
											<button class="btn btn-danger" type="submit"><i class='fas fa-trash-alt'></i> ELIMINAR</button>
										</form>
									</td>
										<?php } ?>
								</tr>
						<?php }
						} ?>
					</tbody>

				</table>
			</div>

		</div>
	</div>

</div>
<!-- /.contenedor-líquido -->

</div>
<!-- Fin del contenido principal -->


<?php include_once "includes/footer.php"; ?>