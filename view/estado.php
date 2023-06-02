<?php
include_once __DIR__ . '/layout/headlogin.php';
require_once __DIR__ . '/../Controllers/UserControllers.php';
require_once __DIR__ . '/../Controllers/ProcedureControllers.php';

$newQuery = false;
if (isset($_POST['dni'])) {
  $user = new UserControllers();
  $doc = new ProcedureControllers();
  $arrayURI = $_POST['dni'];
  $tramiteDetail = $user->showDetail($arrayURI);
  $newQuery = true;
}
?>

<h4 class="font-weight-bolder">Estado de Trámite</h4>
<p class="mb-0">Ingrese su numero de DNI y código de pago</p>
</div>
<div class="card-body">
  <form role="form" action="" method="POST" autocomplete="on">
    <div class="mb-3">
      <input type="text" onkeypress="return valideKey(event);" class="form-control form-control-lg" placeholder="Numero de DNI" aria-label="username" name="dni" id="dni" maxlength="8" required>
    </div>
    <div class="text-center">
      <button type="submit" name="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Consultar</button>
    </div>
  </form>
</div>

<?php if ($newQuery && is_array($tramiteDetail)) : ?>
  <label>Numero de tramites</label>
  <?php foreach ($tramiteDetail as $key => $data) : ?>
    <button class="btn btn-tramite" id="btn-tramite-<?= $data['tramite_id'] ?>"><?php echo $data['descripciont']; ?></button>
  <?php endforeach; ?>
<?php endif; ?>
<?php include_once __DIR__ . '/layout/footerlogin2.php'; ?>
<script src="<?=  APP_URL . '/assets/js/update.js'?>"></script>
<script>
  function valideKey(evt) {
    var code = (evt.which) ? evt.which : evt.keyCode;
    if (code == 8) { // backspace.
      return true;
    } else if (code >= 48 && code <= 57) { // is a number.
      return true;
    } else { // other keys.
      return false;
    }
  }
</script>