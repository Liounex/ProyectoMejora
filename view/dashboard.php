<?php
include_once __DIR__ . '/layout/headmenu.php';
include_once __DIR__ . '/layout/nav.php';
?>
<?php if ($_SESSION['tipo_usuario_id'] == 1) : ?>
  <div class="container-fluid py-4">
    <h1 class="text-white">Ventana Administrador </h1>
  </div>
<?php elseif ($_SESSION['tipo_usuario_id'] == 2) : ?>
  <div class="container-fluid py-4">
    <h1 class="text-white">Ventana Usuario </h1>
  </div>
<?php elseif ($_SESSION['tipo_usuario_id'] == 4) : ?>
  <div class="container-fluid py-4">
    <h1 class="text-white">Ventana Director </h1>
  </div>
<?php endif; ?>
<?php include_once __DIR__ . '/layout/footermenu.php'; ?>