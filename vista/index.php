<!DOCTYPE html>
<html lang="en">

<head>

  <meta http-equiv="Expires" content="0">
  <meta http-equiv="Last-Modified" content="0">
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  <meta http-equiv="Pragma" content="no-cache">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Flux-Academy - Dashboard</title>
  <!-- Favicon-->
  <link rel="icon" href="/vista/login/img/favicon.ico" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../assets/plugins/summernote/summernote-bs4.min.css">

  <link rel="stylesheet" href="../assets/css/dataTables.semanticui.min.css">

  <link rel="stylesheet" href="../assets/css/semantic.min.css">
  <link rel="stylesheet" href="../assets/css/custom.css">
  <link rel="stylesheet" href="./estilos.css">

</head>

<?php

session_start();

if(isset($_SESSION['nombredelusuario']))
{
	$usuarioingresado = $_SESSION['nombredelusuario'];
  $usuarioid = $_SESSION['idUsuario'];
  $nombreyapellido = $_SESSION['nombreyapellido'];
  $imagenProfile = $_SESSION['imagenProfile'];
}
else
{
	header('location: /vista/login/login.php');
}

if(isset($_POST['btncerrar']))
{
	session_destroy();
	header('location: /vista/login/login.php');
}
?>

<body class="hold-transition sidebar-mini layout-fixed">



  <div class="wrapper">
  


    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="../assets/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    
    <?php 
      echo "<script> cargar_contenido('contenido_principal','admin/index.php'); </script>";

      ?>  

      <script type=”text/javascript”>
 
      $(document).ready(function (){
       
          var userName=”xiaoming”;
       
          alert(userName);
       
      });
      </script>


    <form method="POST">
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a onclick="cargar_contenido('contenido_principal','somos/contacto.php')" class="nav-link" style="cursor:pointer ;">Contactanos</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a onclick="cargar_contenido('contenido_principal','somos/nosotros.php')" class="nav-link" style="cursor:pointer ;">Ayuda</a>
          </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Navbar Search -->
          <li class="nav-item" style="padding-right: 20px ;">
            <input class="bg-teal color-palette btn-sm" type="submit" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;" value="Cerrar sesión" name="btncerrar" />
          </li>
        </ul>
      </nav>
    </form>
    <!-- Navbar -->
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../vista/index.php" class="brand-link">
        <img src="../assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Flux Academy</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../assets/img/<?php echo ($imagenProfile)?>" class="img-circle elevation-2" alt="User Image" style="width:40px; height: 40px;">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo ($nombreyapellido) ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="index.php" class="nav-link active bg-teal color-palette">
                <i class="nav-icon fas fa-solid fa-bahai"></i>
                <p>
                  Inicio
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/widgets.html" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Usuario
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a onclick="cargar_contenido('contenido_principal','usuario/perfil_usuario.php')" class="nav-link" style="cursor:pointer ;">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Mi Perfil</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a onclick="cargar_contenido('contenido_principal','curso/cursosusuario.php')" class="nav-link" style="cursor:pointer ;">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Mis cursos</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-header">CATÁLOGO</li>
            <li class="nav-item">
              <a onclick="cargar_contenido('contenido_principal','curso/cursos.php')" class="nav-link" style="cursor:pointer ;">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                  Cursos
                </p>
              </a>
            </li>
            <!--<li class="nav-header">MANUALES</li>
            <li class="nav-item">
              <a onclick="cargar_contenido('contenido_principal','usuario/manual.php')" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Manual de Usuario
                </p>
              </a>
            </li> 
            <li class="nav-header">ADMINISTRADOR</li>
            <li class="nav-item">
              <a onclick="cargar_contenido('contenido_principal','admin/listar_usuarios.php')" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Lista de Usuarios
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a onclick="cargar_contenido('contenido_principal','admin/listar_cursos.php')" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Lista de Cursos
                </p>
              </a>
            </li>
            <li class="nav-header">Reportes</li>
            <li class="nav-item">
              <a href="pages/widgets.html" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Generar Reportes
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/vista/reportesFPDF/reporteUsuario.php" target="_blank" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Reporte de Usuarios</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/vista/reportesFPDF/reporteCurso.php" target="_blank" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Reporte de Cursos</p>
                  </a>
                </li>
              </ul>
            </li>-->
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Main content -->
      <section class="content">

        <div class="dashboard" id="contenido_principal">
          <div class="col-md-6 dashboard--hijo">
            <img src="../assets/img/dashboard.png">
            <!-- /.card -->
          </div>
        
          <div class="col-md-6 dashboard--hijo">
            <h1>¡Bienvenido, <?php echo ($nombreyapellido) ?>!</h1>
            <p>Gracias por ser parte de la familia Flux Academy</p>
            <p>¡Empieza a creecer ahora mísmo!</p>
            <button class="btn btn-primary btn-lg px-4 me-sm-3" onclick="cargar_contenido('contenido_principal','curso/cursos.php')"> Explorar cursos</button>
            <!-- /.card -->
          </div>
        </div>
        
      </section>

      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2022 Flux Academy.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.2
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../assets/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    function cargar_contenido(contenedor, contenido) {
      $("#" + contenedor).load(contenido);
    }
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <script>
  function ModalRegistroCurso() {
    $("#modal_curso").modal({
      backdrop: 'static',
      keyboard: false
    })
    $("#modal_curso").modal('show');
  }
</script>
  <!-- Bootstrap 4 -->
  <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="../assets/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="../assets/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="../assets/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="../assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="../assets/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../assets/plugins/moment/moment.min.js"></script>
  <script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="../assets/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../assets/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../assets/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../assets/js/pages/dashboard.js"></script>

  <script src="../assets/js/jquery-3.5.1.js"></script>
  <script src="../assets/js/jquery.dataTables.min.js"></script>
  <script src="../assets/js/dataTables.semanticui.min.js"></script>
  <script src="../assets/js/semantic.min.js"></script>

</body>

</html>