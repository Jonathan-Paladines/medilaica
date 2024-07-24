<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario | JonasDev</title>
        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
    
        <!-- Custom styles for this template-->
        <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">MEDILaica <sup>v1</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                    aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse show" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                        <a class="collapse-item active" href="formuno.html">Formulario</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Jonathan Paladines</span>
                                <img class="img-profile rounded-circle"
                                    src= "{{ asset('img/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->


                <!-- Begin Page Content -->
<div class="container-fluid mt-3">
    <div class="row">
        <legend>Datos personales - Básicos</legend>

            <div class="form-group col-sm-3 mb-3">
                <label for="cedula">Cédula:</label>
                <input type="text" name="cedula" class="form-control">
            </div>
            <div class="form-group col-sm-3 mb-3">
                <label for="nombres">Nombres:</label>
                <input type="text" name="nombres" class="form-control">
            </div>
            <div class="form-group col-sm-3 mb-3">
                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" class="form-control">
            </div>
            <div class="form-group col-sm-3 mb-3">
                <label for="fnacimiento">Fecha de Nacimiento:</label>
                <input type="date" name="fnacimiento" class="form-control">
            </div>
            <div class="form-group col-sm-3 mb-3">
                <label for="ecivil">Estado civil:</label>
                <select name="ecivil" id="ecivil" class="form-control">
                    <option value="ec1">Soltero</option>
                    <option value="ec2">Casado</option>
                    <option value="ec3">Viudo</option>
                    <option value="ec4">Divorciado</option>
                    <option value="ec5">Unión Libre</option>
                </select>
            </div>
            <div class="form-group col-sm-3 mb-3">
                <label for="genero">Sexo:</label>
                <input type="text" name="genero" class="form-control">
            </div>
            <div class="form-group col-sm-3 mb-3">
                <label for="tsangr">Tipo de Sangre:</label>
                <select name="tsangre" id="tsangre" class="form-control">
                    <option value="s1">A(+)</option>
                    <option value="s2">A(-)</option>
                    <option value="s3">O(+)</option>
                    <option value="s4">O(-)</option>
                    <option value="s5">AB(+)</option>
                    <option value="s6">AB(-)</option>
                    <option value="s7">B(+)</option>
                    <option value="s8">B(-)</option>
                    <option value="s9">N/S</option>
                </select>
            </div>
            <div class="fform-group col-sm-3 mb-3">
                <label for="telefono1">Telefono #1:</label>
                <input type="text" name="telefono1" class="form-control"><br>
            </div>
            <div class="form-group col-sm-3 mb-3">
                <label for="telefono2">Telefono #2:</label>
                <input type="text" name="telefono2" class="form-control"><br>
            </div>
            <div class="form-group col-sm-3 mb-3">
                <label for="correo1">Correo personal:</label>
                <input type="text" name="correo1" class="form-control"><br>
            </div>
            <div class="form-group col-sm-3 mb-3">
                <label for="correo2">Correo Institucional:</label>
                <input type="text" name="correo2" class="form-control"><br>
            </div>
            <div class="form-group col-sm-3 mb-3">
                <label for="etnia">Etnia:</label>
                <input type="text" name="etnia" class="form-control"><br>
            </div>
            <div class="form-group col-sm-3 mb-3">
                <label for="nacionalidad">Nacionalidad:</label>
                <input type="text" name="nacionalidad" class="form-control"><br>
            </div>
            <div class="form-group col-sm-3 mb-3">
                <label for="paisresidencia">País de Residencia:</label>
                <input type="text" name="paisresidencia" class="form-control"><br>
            </div>
            <div class="form-group col-sm-3 mb-3">
                <label for="provresidencia">Provincia de Residencia:</label>
                <input type="text" name="provresidencia" class="form-control"><br>
            </div>
            <div class="form-group col-sm-3 mb-3">
                <label for="ciudresidencia">Ciudad de Residencia:</label>
                <input type="text" name="ciudresidencia" class="form-control"><br>
            </div>
            <div class="form-group col-sm-12 mb-3">
                <label for="domicilio">Domicilio:</label>
                <input type="text" name="domicilio" class="form-control"><br>
            </div>



            <legend>Datos personales - Secundarios</legend>
            <div class="form-group col-sm-4 mb-3">
                <label for="vacuna">Vacuna:</label>
                <select name="vacuna" id="vacuna" class="form-control">
                    <option value="pfizer">Pfizer</option>
                    <option value="astrazeneca">Astrazeneca</option>
                    <option value="sinovac">Sinovac</option>
                    <option value="cansino">Cansino</option>
                    <option value="janssen">Janssen</option>
                    <option value="moderna">Moderna</option>
                    <option value="otro">Otro</option>
                </select>
            </div>
            <div class="form-group col-sm-2 mb-3">
                <label for="numvacuna">Número de Vacuna:</label>
                <input type="number" name="numvacuna" min="0" max="6" class="form-control">
            </div>
            <div class="form-group col-sm-12 mb-3">
                <label for="alergia">Alergia:</label>
                <input type="text" name="alergia" class="form-control">
            </div>
            <div class="form-group col-sm-12 mb-3">
                <label for="antepersonales">Antecedentes personales:</label>
                <input type="text" name="antepersonales" class="form-control">
            </div>
            <div class="form-group col-sm-12 mb-3">
                <label for="antequirurgico">Antecedentes quirurgicos:</label>
                <input type="text" name="antequirurgico" class="form-control">
            </div>
            <div class="form-group col-sm-12 mb-3">
                <label for="antefamiliares">Antecedentes familiares:</label>
                <input type="text" name="antefamiliares" class="form-control">
            </div>
            <div class="form-group col-sm-12 mb-3">
                <label for="obsficha">Observación Ficha:</label>
                <input type="text" name="obsficha" class="form-control">
            </div>
            <div class="form-group col-sm-4 mb-3">
                <label for="lugartrabajo">Lugar de trabajo:</label>
                <input type="text" name="lugartrabajo" class="form-control">
            </div>
            <div class="form-group col-sm-4 mb-3">
                <label for="profesion">Profesión / Ocupación:</label>
                <input type="text" name="profesion" class="form-control">
            </div>
            <div class="form-group col-sm-4 mb-3">
                <label for="facultad">Facultad:</label>
                <select name="facultad" id="facultad" class="form-control">
                    <option value="FADM">Facultad de Administración</option>
                    <option value="FEDU">Facultad de Educación</option>
                    <option value="FIIC">Facultad de Ingeniería Industria y Construcción</option>
                    <option value="FCSD">Facultad de Ciencias Sociales y Decrecho</option>
                    <option value="POSG">Posgrado</option>
                    <option value="NAP">No Aplica</option>
                </select>
            </div>
            <div class="form-group col-sm-4 mb-3">
                <label for="carrera">Carrera:</label>
                <select name="carrera" id="carrera" class="form-control">
                    <option value="ADMN">Administración de Empresas</option>
                    <option value="COMX">Comercio Exterior</option>
                    <option value="CNAU">Contabilidad y Auditoría</option>
                    <option value="MARK">Marketing</option>
                    <option value="COMN">Comunicación</option>
                    <option value="DRCH">Derecho</option>
                    <option value="ECON">Economía</option>
                    <option value="PRMO">Periodismo</option>
                    <option value="PSCI">Psicología</option>
                    <option value="EDIN">Educación  Básica</option>
                    <option value="EDBA">Educación Inicial</option>
                    <option value="PSCO">Psicopedagogía</option>
                    <option value="ARQT">Arquitectura</option>
                    <option value="INCV">Ingeniería Civil</option>
                    <option value="POSG">Posgrado</option>
                    <option value="CAVI">Carreras Virtuales</option>
                    <option value="NAP">No Aplica</option>
                </select>
            </div>
            <div class="form-group col-sm-4 mb-3">
                <label for="nivel">Nivel / Semestre:</label>
                <select name="nivel" id="nivel" class="form-control">
                    <option value="1">Primero</option>
                    <option value="2">Segundo</option>
                    <option value="3">Tercero</option>
                    <option value="4">Cuarto</option>
                    <option value="5">Quinto</option>
                    <option value="6">Sexto</option>
                    <option value="7">Septimo</option>
                    <option value="8">Octavo</option>
                    <option value="9">Noveno</option>
                    <option value="10">Décimo</option>
                    <option value="11">Décimo Primero</option>
                    <option value="12">Décimo Segundo</option>
                    <option value="13">POSGRADO</option>
                    <option value="NAP">No Aplica</option>
                </select>
            </div>
            <div class="form-group col-sm-4 mb-3">
                <label for="tipo">Tipo:</label>
                <select name="tipo" id="tipo" class="form-control">
                    <option value="administrativo">Administrativo</option>
                    <option value="docente">Docente</option>
                    <option value="estudiante">Estudiante</option>
                    <option value="otro">Otro</option>
                </select>
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; MEDILaica 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

    </div>
</div>

    
</body>
</html>