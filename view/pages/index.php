<?php
  require '../layout/headlogin.php';
  require '../../Controllers/UserControllers.php';
  session_start();
  if (isset($_POST['username']) && isset($_POST['password'])) {
    $login = new UserControllers();
    echo $login->login($_POST['username'], $_POST['password']);
  }
?>
<h4 class="font-weight-bolder">Acceder</h4>
<p class="mb-0">Ingrese su Correo y contraseña</p>
</div>
<div class="card-body">
  <form role="form" action="" method="POST" autocomplete="off">
    <div class="mb-3">
      <input type="email" class="form-control form-control-lg" placeholder="example12@gmail.com" aria-label="username" name="username">
    </div>
    <div class="mb-3">
      <input type="password" class="form-control form-control-lg" placeholder="Contraseña" aria-label="Comtraseña" name="password">
    </div>
    <div class="form-check form-switch">
      <input class="form-check-input" type="checkbox" id="rememberMe">
      <label class="form-check-label" for="rememberMe">Recuerdame</label>
    </div>
    <div class="text-center">
      <button type="submit" name="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Acceder</button>
    </div>
    </form>
</div>
<div class="card-footer text-center pt-0 px-lg-2 px-1">
  <p class="mb-4 text-sm mx-auto">
    Tramites sin usuario
  <a href="./registro" class="text-primary text-gradient font-weight-bold">Haga el proceso aqui</a>
  </p>
</div>
<?php
    require '../layout/footerlogin.php';