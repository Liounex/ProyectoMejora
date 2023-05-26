<?php
include_once __DIR__ . '/layout/headlogin.php';
require_once __DIR__ . '/../Controllers/UserControllers.php';
require_once __DIR__ . '/../Controllers/ProcedureControllers.php';

$newQuery = false;
if (isset($_POST['codtramite'])) {
  $user = new UserControllers();
  $doc = new ProcedureControllers();
  $arrayURI = $_POST['codtramite'];
  $tramiteDetail = $user->showDetail($arrayURI);
  $docDetail = $doc->showDetails($arrayURI);
  $newQuery = true;
}
?>
<h4 class="font-weight-bolder">Estado de Trámite</h4>
<p class="mb-0">Ingrese su numero de DNI y código de pago</p>
</div>
<div class="card-body">
  <form role="form" action="" method="POST" autocomplete="on">
    <div class="mb-3">
      <input type="text" onkeypress="return valideKey(event);" class="form-control form-control-lg" placeholder="Numero de DNI" aria-label="username" name="dniusuario" maxlength="8" required>
    </div>
    <div class="mb-3">
      <input type="text" class="form-control form-control-lg" placeholder="Código de Pago" aria-label="Comtraseña" name="codtramite" required>
    </div>
    <div class="text-center">
      <button type="submit" name="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Consultar</button>
    </div>
  </form>
</div>
<?php if ($newQuery) : ?>
  <div class="card-body">
    <div class="mb-3">
      <label>Información Básica</label>
      <div class="mb-3">
        <label class="text-x text-secondary mb-1">CODIGO DE PAGO: <?= $tramiteDetail['pago_cod'] ?></label>
      </div>
      <div class="mb-3">
        <label class="text-x text-secondary mb-1">TIPO TRAMITE: <?= $tramiteDetail['nombre'] ?></label>
      </div>
      <div class="mb-3">
        <label class="text-x text-secondary mb-1">IDIOMA: <?= $tramiteDetail['idioma'] ?></label>
      </div>
      <div class="mb-3">
        <label class="text-x text-secondary mb-1">NOMBRES: <?= $tramiteDetail['nombres'] ?></label>
      </div>
      <div class="mb-3">
        <label class="text-x text-secondary mb-1">APELLIDOS: <?= $tramiteDetail['apellidos'] ?></label>
      </div>
      <div class="mb-3">
        <?php $obj = new UserControllers();
        $datos = $obj->description($tramiteDetail['tramite_id']);
        ?>
        <?php foreach ($datos as $key => $value) : ?>
          <!-- Solo si el estado se encuentra en Observado -->
          <?php $observations = [$value['obs1'], $value['obs2'], $value['obs3']]; ?>
          <?php if (empty(array_filter($observations))) : ?>
            <label class="text-x text-secondary mb-2">Sin Observaciones</label>
          <?php else : ?>
            <label class="text-x text-secondary mb-2">
              Observaciones <br>
              <?php foreach ($observations as $index => $observation) : ?>
                <?php if (!empty($observation)) : ?>
                  <?= ($index + 1) ?>. <?= $observation ?> <br>
                <?php endif; ?>
              <?php endforeach; ?>
            </label>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
      <label>Estado</label><br>
      <?php if ($value['estado_id'] == 4) : ?>
        <label class="text-x text-secondary mb-2">Finalizado</label>
        <form action="./content/vercerti" method="POST">
          <input type="hidden" name="tramite" value="<?= $value['descripciont'] ?>">
          <input type="hidden" name="name" value="<?= $value['nombres'] ?>">
          <input type="hidden" name="ap" value="<?= $value['ap_paterno'] ?>">
          <input type="hidden" name="am" value="<?= $value['ap_materno'] ?>">
          <input type="hidden" name="idioma" value="<?= $value['idioma'] ?>">
          <button type="submit" class="btn btn-success">Descargar Certificado</button>
        </form>
      <?php elseif ($value['estado_id'] == 1) : ?>
        <label class="text-x text-secondary mb-2">Iniciado</label>
      <?php elseif ($value['estado_id'] == 2) : ?>
        <label class="text-x text-secondary mb-2">En Proceso</label>
      <?php elseif ($value['estado_id'] == 3) : ?>
        <label class="text-x text-secondary mb-2">Observado "Revise las observaciones Arriba"</label>
      <?php else : ?>
        <label class="text-x text-secondary mb-2">Rechazado</label>
      <?php endif; ?>
    </div>
    <label>Voucher de Pago</label>
    <div class="row">
      <div class="col-12 text-start">
        <?php
        $fileExtension = pathinfo($tramiteDetail['voucher'], PATHINFO_EXTENSION);
        if ($fileExtension === 'pdf') {
          // Mostrar PDF
          echo '
            <object data="' . $tramiteDetail['voucher'] . '" type="application/pdf" width="100%" height="500px" class="mb-3">
              <p>No tienes un complemento de PDF instalado, pero puedes <a href="' . $tramiteDetail['voucher'] . '">descargar el archivo PDF</a>.</p>
            </object>
            ';
        } else {
          // Mostrar imagen
          echo '<img class="mb-3" src="' . $tramiteDetail['voucher'] . '" alt="Archivo adjunto" style="max-width: 60%;" >';
        }
        ?>
      </div>
      <form action="./content/updatedoc" method="post" enctype="multipart/form-data">
        <input type="hidden" name="cod" id="cod" value="<?= $value['pago_cod'] ?>">
        <div class="mb-3">
          <input type="file" name="vaucher" id="vaucher" class="form-control form-control-lg" aria-label="vaucher" accept=".jpg, .jpeg, .png, .pdf">
        </div>

        <label>Copia de DNI</label>
        <div class="col-12 text-start">
          <object class="mb-3" data="<?= $value['copia'] ?>" type="application/pdf" width="100%" height="400px">
            <p>
              No tienes un complemento de PDF instalado, pero puedes
              <a href="<?php $value['copia']; ?>">descargar el archivo PDF.</a>
            </p>
          </object>
        </div>
        <div class="mb-3">
          <input type="file" name="copydni" id="copydni" class="form-control form-control-lg" aria-label="copydni" accept=".pdf">
        </div>
        <div class="text-center">
          <button class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Realizar Cambios</button>
        </div>
    </div>
  </div>
  </form>
<?php endif ?>
<?php include_once __DIR__ . '/layout/footerlogin.php'; ?>
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