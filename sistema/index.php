<?php include_once "includes/header.php"; ?>

<!-- Contenido de la página de inicio -->
<div class="container-fluid">

	<!-- Encabezado de página -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">GESTION DE ADMINISTRACION</h1>
	</div>

	<!-- Fila de contenido -->
	<div class="row">

		<!-- Ejemplo de tarjeta de ganancias (mensuales) -->
		<a class="col-xl-3 col-md-6 mb-4" href="lista_usuarios.php">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Usuarios</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data['usuarios']; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-user fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</a>

		<!-- Ejemplo de tarjeta de ganancias (mensuales) -->
		<a class="col-xl-3 col-md-6 mb-4" href="lista_cliente.php">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Clientes</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data['clientes']; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-users fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</a>

		<!-- Ejemplo de tarjeta de ganancias (mensuales) -->
		<a class="col-xl-3 col-md-6 mb-4" href="lista_productos.php">
			<div class="card border-left-info shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Productos</div>
							<div class="row no-gutters align-items-center">
								<div class="col-auto">
									<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $data['productos']; ?></div>
								</div>
								<div class="col">
									<div class="progress progress-sm mr-2">
										<div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</a>

		<!-- Ejemplo de tarjeta de solicitudes pendientes -->
		<a class="col-xl-3 col-md-6 mb-4" href="ventas.php">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Ventas</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data['ventas']; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div>
	<!-- Encabezado de página -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">CONFIGURACION DE DATOS</h1>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header text-warning" align="center" style="background-color:#022424;">
				<i class="fas fa-user-tie fa-fw"></i>&nbsp;INFORMACION PERSONAL
				</div>
				<div class="card-body" style="background-color:#022424;">
					<div class="form-group">
						<label>NOMBRE: <strong><?php echo $_SESSION['nombre']; ?></strong></label>
					</div>
					<div class="form-group">
						<label>CORREO USUARIO: <strong><?php echo $_SESSION['email']; ?></strong></label>
					</div>
					<div class="form-group">
						<label>ROL/TIPO: <strong><?php echo $_SESSION['rol_name']; ?></strong></label>
					</div>
					<div class="form-group">
						<label>USUARIO: <strong><?php echo $_SESSION['user']; ?></strong></label>
					</div>
					<ul class="list-group" class="card-header text-warning" align="center">
						<li class="list-group-item active" style="background-color:#008080;"><i class="fas fa-user-tie fa-fw"></i>&nbsp;MODIFICAR CONTRASEÑA</li>
						<form action="" method=" post" name="frmChangePass" id="frmChangePass" class="p-3">
							<div class="form-group">
								<label>CONTRASEÑA ACTUAL</label>
								<input type="password" name="actual" id="actual" placeholder="Contraseña Actual" required class="form-control">
							</div>
							<div class="form-group">
								<label>NUEVA CONTRASEÑA</label>
								<input type="password" name="nueva" id="nueva" placeholder="Nueva Contraseña" required class="form-control">
							</div>
							<div class="form-group">
								<label>CONFIRMAR CONTRASEÑA</label>
								<input type="password" name="confirmar" id="confirmar" placeholder="Confirmar Contraseña" required class="form-control">
							</div>
							<div class="alertChangePass" style="display:none;">
							</div>
							<div>
								<button type="submit" class="btn btn-outline-info btnChangePass"><i class="fas fa-save"></i>&nbsp;CAMBIAR CONTRASEÑA</button>
							</div>
						</form>
					</ul>
				</div>
			</div>
		</div>
		<?php if ($_SESSION['rol'] == 1) { ?>
			<div class="col-lg-6">
				<div class="card">
					<div class="card-header text-info" align="center" style="background-color:#022424;"> <!--bg-primary text-white" -->
					<i class="fas fa-store-alt fa-fw"></i> &nbsp;DATOS DE LA TIENDA COMERCIAL
					</div>
					<div class="card-body" style="background-color:#022424;">
						<form action="empresa.php" method="post" id="frmEmpresa" class="p-3">
							<div class="form-group">
								<label>CI/NIT:</label>
								<input type="number" name="txtDni" value="<?php echo $dni; ?>" id="txtDni" placeholder="Dni de la Empresa" required class="form-control">
							</div>
							<div class="form-group">
								<label>NOMBRE:</label>
								<input type="text" name="txtNombre" class="form-control" value="<?php echo $nombre_empresa; ?>" id="txtNombre" placeholder="Nombre de la Empresa" required class="form-control">
							</div>
							<div class="form-group">
								<label>RAZON SOCIAL:</label>
								<input type="text" name="txtRSocial" class="form-control" value="<?php echo $razonSocial; ?>" id="txtRSocial" placeholder="Razon Social de la Empresa">
							</div>
							<div class="form-group">
								<label>TELEFONO:</label>
								<input type="number" name="txtTelEmpresa" class="form-control" value="<?php echo $telEmpresa; ?>" id="txtTelEmpresa" placeholder="teléfono de la Empresa" required>
							</div>
							<div class="form-group">
								<label>CORREO ELECTRONICO:</label>
								<input type="email" name="txtEmailEmpresa" class="form-control" value="<?php echo $emailEmpresa; ?>" id="txtEmailEmpresa" placeholder="Correo de la Empresa" required>
							</div>
							<div class="form-group">
								<label>DIRECCION:</label>
								<input type="text" name="txtDirEmpresa" class="form-control" value="<?php echo $dirEmpresa; ?>" id="txtDirEmpresa" placeholder="Dirreción de la Empresa" required>
							</div>
							<div class="form-group">
								<label>IMPUESTO GENERAL DE VENTAS IGV (%):</label>
								<input type="text" name="txtIgv" class="form-control" value="<?php echo $igv; ?>" id="txtIgv" placeholder="IGV de la Empresa" required>
							</div>
							<?php echo isset($alert) ? $alert : ''; ?>
							<div class="col-md-12" align="center" style="background-color:#022424;">
								<button type="submit" class="btn btn-outline-success btnChangePass"><i class="fas fa-save"></i>&nbsp;GUARDAR DATOS</button>
							</div>

						</form>
					</div>
				</div>
			</div>
		<?php } else { ?>
			<div class="col-lg-6">
				<div class="card">
					<div class="card-header bg-dark text-white" align="center" style="background-color:#022424;"> <!--bg-primary text-white" -->
					<i class="fas fa-store-alt fa-fw"></i> &nbsp;DATOS DE LA COMERCIAL
					</div>
					<div class="card-body" style="background-color:#022424;">
						<div class="p-3">
							<div class="form-group text-white" >
								<strong class="text-dark">CI/NIT:</strong>
								<h6><?php echo $dni; ?></h6>
							</div>
							<div style="background-color:#00FFFF;">
								<hr class="sidebar-divider my-2">
							</div>
							<div class="form-group text-white">
								<strong class="text-dark">NOMBRE:</strong>
								<h6><?php echo $nombre_empresa; ?></h6>
							</div>
							<div style="background-color:#00FFFF;">
								<hr class="sidebar-divider my-2">
							</div>
							<div class="form-group text-white">
								<strong class="text-dark">RAZON SOCIAL:</strong>
								<h6><?php echo $razonSocial; ?></h6>
							</div>
							<div style="background-color:#00FFFF;">
								<hr class="sidebar-divider my-2">
							</div>
							<div class="form-group text-white">
								<strong class="text-dark">TELEFONO:</strong>
								<?php echo $telEmpresa; ?>
							</div>
							<div style="background-color:#00FFFF;">
								<hr class="sidebar-divider my-2">
							</div>
							<div class="form-group text-white">
								<strong class="text-dark">CORREO ELECTRONICO:</strong>
								<h6><?php echo $emailEmpresa; ?></h6>
							</div>
							<div style="background-color:#00FFFF;">
								<hr class="sidebar-divider my-2">
							</div>
							<div class="form-group text-white">
								<strong class="text-dark">DIRECCION:</strong>
								<h6><?php echo $dirEmpresa; ?></h6>
							</div>
							<div style="background-color:#00FFFF;">
								<hr class="sidebar-divider my-2">
							</div>
							<div class="form-group text-white">
								<strong class="text-dark">IMPUESTO GENERAL DE VENTAS IGV (%):</strong>
								<h6><?php echo $igv; ?></h6>
							</div>

						</div>
					</div>
				</div>
			</div>

		<?php } ?>
	</div>


</div>
<!-- /.contenedor-líquido -->

</div>
<!-- Fin del contenido principal -->


<?php include_once "includes/footer.php"; ?>