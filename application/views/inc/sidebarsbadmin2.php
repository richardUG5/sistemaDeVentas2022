<!-- Sidebar -->

<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" >
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-user-tie fa-fw"></i>&nbsp;ADMINISTRADOR
        </div>
</a>

<div class="sidebar-brand d-flex align-items-center justify-content-center">
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
            <img src="<?php echo base_url(); ?>sbadmin2/img/rug.jpg" class="img-profile rounded-circle" alt="Responsive image" class="mx-auto d-block">
        </a>
    </li>
</div>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
           <!-- <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>SISTEMA WEB</span></a>
            </li> -->
<!--
            <li>
                <div class="container my-auto">
                    <?php// echo form_open_multipart('empleado/index'); ?>
                      <button type="submit" name="buton2" class="btn btn-info">GESTION DE EMPLEADO</button>
                      <?php// echo form_close(); ?>
                </div>
            </li> <br>

            <li>
                <div class="container my-auto">
                    <?php// echo form_open_multipart('producto/index'); ?>
                      <button type="submit" name="buton3" class="btn btn-dark">GESTION DE PRODUCTO</button>
                      <?php// echo form_close(); ?>
                </div>
            </li> <br> -->

            <!-- Divider 
            <hr class="sidebar-divider">  -->

            <!-- Heading -->
<!--            <div class="sidebar-heading">
                Interface
            </div>
-->

<!-- ------------------------ para gestion de usuarios ---------------------------------------- -->
            <li class="nav-item">                
                  <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseTwo">
                    <i class="fa fa-users"></i>Gestion Usuarios
                    <span class="fa fa-chevron-down"></span>
                  </a>
                  <ul class="nav child_menu">
                    <li>
                        <?php echo form_open_multipart('usuarios/index1');?>
                          <button type="submit" class="col-md-12 btn btn-outline-info" style="background-color: transparent; border: none;"><i class="fas fa-user-tie fa-fw"></i>&nbsp; 
                            Usuarios
                          </button>
                        <?php echo form_close();?>
                    </li>
                  <!--  <li>
                        <?php //echo form_open_multipart('empleado/index');?>
                          <button type="submit" class="col-md-12 btn btn-outline-info" style="background-color: transparent; border: none;"><i class="fas fa-user-tie fa-fw"></i>&nbsp;
                            Empleados
                          </button>
                        <?php //echo form_close();?>
                    </li> -->
                    <li>
                        <?php echo form_open_multipart('comercial/index');?>
                          <button type="submit" class="col-md-12 btn btn-outline-info" style="background-color: transparent; border: none;"><i class="fas fa-store-alt fa-fw"></i> &nbsp;
                            Comercial
                          </button>
                        <?php echo form_close();?>
                    </li>
                  </ul>                
            </li>
        <hr class="sidebar-divider my-0">
<!-- fin empleados ------------------------------------------------------------------------->
<!-- inicio para gestion de productos --------------------------------------------------------------->
<li class="nav-item">
    <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseTwo">
      <i class="fa fa-cubes"></i>Gestion de Productos
      <span class="fa fa-chevron-down"></span>
    </a>
    <ul class="nav child_menu">
        <li>
            <?php echo form_open_multipart('producto/index');?>
              <button type="submit" class="col-md-12 btn btn-outline-info" style="background-color: transparent; border: none;"> <i class="fas fa-box fa-fw"></i> &nbsp;Productos
              </button>
            <?php echo form_close();?>
        </li>
        <li>
            <?php echo form_open_multipart('categoria/index');?>
              <button type="submit" class="col-md-12 btn btn-outline-info" style="background-color: transparent; border: none;"> <i class="fas fa-tags fa-fw"></i> &nbsp;Categorías
              </button>
            <?php echo form_close();?> 
        </li>
        <li>
            <?php echo form_open_multipart('medida/index');?>
              <button type="submit" class="col-md-12 btn btn-outline-info" style="background-color: transparent; border: none;"> <i class="fas fa-hand-holding-usd fa-fw"></i>&nbsp;Medida
              </button>
            <?php echo form_close();?>
        </li>
  </ul>
</li>
<hr class="sidebar-divider my-0">
<!-- fin productos ------------------------------------------------------------------------->

<!-- ------------------------ para gestion de clientes ---------------------------------------- -->
            <li class="nav-item">                
                  <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseTwo">
                    <i class="fa fa-users"></i>Gestion Clientes
                    <span class="fa fa-chevron-down"></span>
                  </a>
                  <ul class="nav child_menu">
                    <li>
                        <?php echo form_open_multipart('cliente/index');?>
                          <button type="submit" class="col-md-12 btn btn-outline-info" style="background-color: transparent; border: none;" class="btn btn-outline-info btn-block"> <i class="fas fa-child fa-fw"></i> &nbsp;
                            Clientes
                          </button>
                        <?php echo form_close();?>
                    </li>
                  </ul>                
            </li>
<hr class="sidebar-divider my-0">
<!-- fin clientes ------------------------------------------------------------------------->

<!-- ------------------------ para gestion de ventas ---------------------------------------- -->
            <li class="nav-item">                
                  <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseTwo">
                    <i class="fa fa-users"></i>Gestion Ventas
                    <span class="fa fa-chevron-down"></span>
                  </a>

                  <ul class="nav child_menu">
                    <li>
                        <?php echo form_open_multipart('venta/index');?>
                          <button type="submit" class="col-md-12 btn btn-outline-info" style="background-color: transparent; border: none;" class="btn btn-outline-info btn-block"> <i class="fas fa-child fa-fw"></i> &nbsp;
                            Ventas
                          </button>
                        <?php echo form_close();?>
                    </li>
                  </ul>

                  <ul class="nav child_menu">
                    <li>
                        <?php echo form_open_multipart('detalleventa/index');?>
                          <button type="submit" class="col-md-12 btn btn-outline-info" style="background-color: transparent; border: none;" class="btn btn-outline-info btn-block"> <i class="fas fa-child fa-fw"></i> &nbsp;
                            Detalle Ventas
                          </button>
                        <?php echo form_close();?>
                    </li>
                  </ul>                
            </li>
<!-- fin ventas ------------------------------------------------------------------------->



<div class="sidebar-heading">
        GESTION DE INTERFACES
</div>
    <hr class="sidebar-divider my-2">
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Gestion Ventas</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="nueva_venta.php">Nueva venta</a>
                <a class="collapse-item" href="http://localhost/sisWebComVentas/index.php/venta/index">Ventas</a>
            </div>
        </div>
    </li>


<!-- inicio para empleados ------------------------------------------------------------------------->
<!-- ---<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-male"></i>
                    <span>Empleados</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

<?php //echo form_open_multipart('empleado/index');?>
  <button type="submit" class="col-md-11 btn btn-dark" style="background-color: transparent; border: none;">Empleados </button>
<?php// echo form_close();?> -->


<!--
                        <h6 class="collapse-header">Ver:</h6>
                        <?php // echo form_open_multipart('persona/index'); ?>
                            <button type="submit" class="btn btn-light btn-block btn-sm">Persona</button>
                        <?php // echo form_close(); ?>
                        <?php // echo form_open_multipart('profesor/index'); ?>
                            <button type="submit" class="btn btn-light btn-block btn-sm">Profesores</button>
                        <?php // echo form_close(); ?>
                    </div>
                </div>
-->
            </li>
<!-- fin empleados ------------------------------------------------------------------------->



            <!-- Nav Item - Utilities Collapse Menu -->
<!--            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilidades</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Utilidades personalizadas:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colores</a>
                        <a class="collapse-item" href="utilities-border.html">Fronteras</a>
                        <a class="collapse-item" href="utilities-animation.html">Animaciones</a>
                        <a class="collapse-item" href="utilities-other.html">Otro</a>
                    </div>
                </div>
            </li> --------------- -->

            <!-- Divider 
            <hr class="sidebar-divider">   -->

            <!-- Heading -->
<!--            <div class="sidebar-heading">
                Addons
            </div>
-->

            <!-- Nav Item - Pages Collapse Menu -->
<!--            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>  --------------- -->

            <!-- Nav Item - Charts -->
<!--            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>
-->

            <!-- Nav Item - Tables -->
<!--            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>
-->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
<!--            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="<?php //echo base_url(); ?>sbadmin2/img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div>
-->
        </ul>
        <!-- End of Sidebar -->



                <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">