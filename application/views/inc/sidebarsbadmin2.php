<!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"> M E N U <sup>5</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>SISTEMA WEB VENTAS</span></a>
            </li>

            <li>
                <div class="container my-auto">
                    <?php echo form_open_multipart('empleado/index'); ?>
                      <button type="submit" name="buton2" class="btn btn-info">GESTION DE EMPLEADO</button>
                      <?php echo form_close(); ?>
                </div>
            </li> <br>

            <li>
                <div class="container my-auto">
                    <?php echo form_open_multipart('producto/index'); ?>
                      <button type="submit" name="buton3" class="btn btn-dark">GESTION DE PRODUCTO</button>
                      <?php echo form_close(); ?>
                </div>
            </li> <br>

            <!-- Divider 
            <hr class="sidebar-divider">  -->

            <!-- Heading -->
<!--            <div class="sidebar-heading">
                Interface
            </div>
-->

<!-- ------------------------ para gestion de empleados ---------------------------------------- -->
            <li class="nav-item">
                
                  <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseTwo">
                    <i class="fa fa-users"></i>Gestion Empleados
                    <span class="fa fa-chevron-down"></span>
                  </a>
                  <ul class="nav child_menu">
                    <li>
                        <?php echo form_open_multipart('empleado/index');?>
                          <button type="submit" class="col-md-11 btn btn-dark" style="background-color: transparent; border: none;">
                            Empleados
                          </button>
                        <?php echo form_close();?>
                    </li>
                    <li>
                        <?php echo form_open_multipart('sucursal/index');?>
                          <button type="submit" class="col-md-11 btn btn-dark" style="background-color: transparent; border: none;">
                            Sucursales
                          </button>
                        <?php echo form_close();?>
                    </li>
                  </ul>                
            </li>


<!-- inicio para productos ------------------------------------------------------------------------->
<li>
    <a>
      <i class="fa fa-cubes"></i>Gestion de Productos
      <span class="fa fa-chevron-down"></span>
    </a>
    <ul class="nav child_menu">
        <li>
            <?php echo form_open_multipart('producto/index');?>
              <button type="submit" class="col-md-11 btn btn-dark" style="background-color: transparent; border: none;"> Productos
              </button>
            <?php echo form_close();?>
        </li>
        <li>
            <?php echo form_open_multipart('categoria/index');?>
              <button type="submit" class="col-md-11 btn btn-dark" style="background-color: transparent; border: none;"> Categorías
              </button>
            <?php echo form_close();?> 
        </li>
        <li>
            <?php echo form_open_multipart('marca/index');?>
              <button type="submit" class="col-md-11 btn btn-dark" style="background-color: transparent; border: none;"> Fabricante
              </button>
            <?php echo form_close();?>
        </li>
  </ul>
</li>
<!-- fin productos ------------------------------------------------------------------------->

<!-- para usuarios ------------------------------------------------------------------------->
            <li>
                  <a>
                    <i class="fa fa-users"></i>Usuarios
                    <span class="fa fa-chevron-down"></span>
                  </a>
                  <ul class="nav child_menu">
                    <li>
                        <?php echo form_open_multipart('usuarios/inicio');?>
                          <button type="submit" class="col-md-11 btn btn-dark" style="background-color: transparent; border: none;">
                            Usuarios
                          </button>
                        <?php echo form_close();?>
                    </li>
                  </ul>
                </li>

<!-- inicio para empleados ------------------------------------------------------------------------->
<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-male"></i>
                    <span>Empleados</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

<?php echo form_open_multipart('empleado/index');?>
  <button type="submit" class="col-md-11 btn btn-dark" style="background-color: transparent; border: none;">Empleados </button>
<?php echo form_close();?>


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
                <img class="sidebar-card-illustration mb-2" src="<?php echo base_url(); ?>sbadmin2/img/undraw_rocket.svg" alt="...">
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