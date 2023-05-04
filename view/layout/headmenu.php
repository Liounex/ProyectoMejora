<?php
session_start();
  if (isset($_POST['cerrarSesion'])){
      session_destroy();
      header('Location: ../pages/index');
  }
?>
<?php if (isset($_SESSION['dni_user'])) {?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/proyectomejora/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/proyectomejora/assets/img/favicon.png">
  <title>
    <?php
      if (empty($_GET['dni_user'])) {
        if (strpos($_SERVER['REQUEST_URI'], 'index')) {
          echo 'Dashboard';
        } 
        elseif (strpos($_SERVER['REQUEST_URI'], 'tramite')) {
          echo 'Tramite';
        } 
        elseif (strpos($_SERVER['REQUEST_URI'], 'certificados')) {
          echo 'Certificados';
        }
        elseif (strpos($_SERVER['REQUEST_URI'], 'constancias')) {
          echo 'Constancias';
        }
        else {
          echo 'Examenes';
        }
      }
    ?>
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="/proyectomejora/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/proyectomejora/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="/proyectomejora/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="/proyectomejora/assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="./index" target="">
        <img src="../../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">INDI UNSCH</span>
      </a>
    </div>
    <!-- Ventana para el Administrador-->
    <?php if ($_SESSION['tipo_usuario_id'] == 1) :?>
      <hr class="horizontal dark mt-0">
      <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="./tramite?id=all">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa fa-file text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Tramites</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./certificados?id=certificado">
              <div class="fas fa-certificate icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class=""></i>
              </div>
              <span class="nav-link-text ms-1">Certificados</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./constancias?id=constancia">
              <div class="fas fa-book-open icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class=""></i>
              </div>
              <span class="nav-link-text ms-1">Constancias</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./examenes?id=examen">
              <div class="fas fa-book icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class=""></i>
              </div>
              <span class="nav-link-text ms-1">Examenes</span>
            </a>
          </li>
        </ul>
      </div>
      <!-- Ventana para el Usuario-->
  <?php elseif ($_SESSION['tipo_usuario_id'] == 2) : ?>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item"">
          <a class="nav-link" href="./tramite">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-file text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Tramites</span>
          </a>
        </li>
      </ul>
    </div>
  <?php endif; ?>
  </aside>
<main class="main-content position-relative border-radius-lg ">
<?php } else { 
  header('Location: /proyectomejora/index'); ?>
<?php } ?>