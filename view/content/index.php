<?php
    require '../layout/headmenu.php';
    require '../layout/nav.php';
?>
<?php if ($_SESSION['tipo_usuario_id'] == 1) :?>
  <div class="container-fluid py-4">
    <h1 class="text-white">Ventana Administrador </h1>
  </div>
<?php elseif ($_SESSION['tipo_usuario_id'] == 2) : ?>
    <div class="container-fluid py-4">
      <h1 class="text-white">Ventana Usuario </h1>
    </div>
<?php endif; ?>
<?php
    require '../layout/footermenu.php';
?>



    

