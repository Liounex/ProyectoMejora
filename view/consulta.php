<?php
include_once __DIR__ . '/layout/headlogin.php';
require_once __DIR__ . '/../Controllers/UserControllers.php';
?>

<h4 class="font-weight-bolder">Consultar Trámite</h4>
<p class="mb-0">Ingrese su numero de DNI y código de trámite</p>
</div>
<div class="card-body">
  <form role="form" action="<?= APP_URL . '/view/details.php'?>" method="POST" autocomplete="on">
    <div class="mb-3">
      <input type="text"  onkeypress="return valideKey(event);" class="form-control form-control-lg" placeholder="Numero de DNI" aria-label="username" name="dniusuario" maxlength="8" required>
    </div>
    <div class="mb-3">
      <input type="text" class="form-control form-control-lg" placeholder="Código de trámite" aria-label="Comtraseña" name="codtramite" required>
    </div>
    <div class="text-center">
      <button type="submit" name="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Consultar</button>
    </div>
    </form>
</div>
<div class="card-footer text-center pt-0 px-lg-2 px-1">
  <p class="mb-4 text-sm mx-auto">
    Tramites sin usuario
  <a href="<?= APP_URL . '/view/registro'?>" class="text-primary text-gradient font-weight-bold">Haga el proceso aqui</a>
  </p>
</div>
<?php include_once __DIR__ . '/layout/footerlogin.php'; ?>

<script>
  function valideKey(evt){
    
    // code is the decimal ASCII representation of the pressed key.
    var code = (evt.which) ? evt.which : evt.keyCode;
    
    if(code==8) { // backspace.
      return true;
    } else if(code>=48 && code<=57) { // is a number.
      return true;
    } else{ // other keys.
      return false;
    }
  }
</script>