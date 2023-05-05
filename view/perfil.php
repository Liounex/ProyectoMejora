<?php
include_once __DIR__ . '/layout/headmenu.php';
include_once __DIR__ . '/layout/nav.php';
?>
<div class="main-content position-relative max-height-vh-100 h-100">
  <!-- Menu de perfil-->
  <div class="card shadow-lg mx-4 card-profile-bottom">
    <div class="card-body p-3">
      <div class="row gx-4">
        <div class="col-auto">
          <div class="avatar avatar-xl position-relative">
            <img src="../../assets/img/favicon.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
          </div>
        </div>
        <div class="col-auto my-auto">
          <div class="h-100">
            <h5 class="mb-1">
              <?= $_SESSION['nombres'] ?>
            </h5>
            <p class="mb-0 font-weight-bold text-sm">
              Activo
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Menu de perfil-->
</div>
<!-- Cuerpo-->
<div class="container-fluid py-4">
  <div class="row">
    <form>
      <div class="col-md-8">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Editar Perfil</p>
              <button class="btn btn-primary btn-sm ms-auto">Aceptar Cambios</button>
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm">Informacion de usuario</p>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Nombre Completo</label>
                  <input class="form-control" type="text" value="<?= $_SESSION['nombres'] ?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Correo Electronico</label>
                  <input class="form-control" type="email" value="<?= $_SESSION['correo'] ?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Apellido Paterno</label>
                  <input class="form-control" type="text" value="<?= $_SESSION['ap_paterno'] ?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Apellido Materno</label>
                  <input class="form-control" type="text" value="<?= $_SESSION['ap_materno'] ?>">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  </form>
</div>
<?php include_once __DIR__ . '/layout/footermenu.php'; ?>