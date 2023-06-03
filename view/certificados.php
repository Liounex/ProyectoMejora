<?php
include_once __DIR__ . '/layout/headmenu.php';
include_once __DIR__ . '/layout/nav.php';
require_once(APP_ROOT . '/../Controllers/UserControllers.php');
$obj = new UserControllers();
$datos = $obj->showdata($_GET['id']);

?>
<div class="container-fluid py-4">
  <div class="row">
    <h5 class="text-white">CERTIFICADOS EN LISTA</h5>
    <div class="col-12">
      <div class="card mb-4">
        <div class="table-responsive p-0">
          <table class="table mb-0 text-center">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">TIPO DE TRAMITE</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ESTADO</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">DETALLE</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PAGO</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SOLICITANTE</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CANTIDAD</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">FECHA DE PRESENTACION</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ACCIONES</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($datos) : ?>
                <?php foreach ($datos as $key => $value) : ?>
                  <?php $collapseId = "collapse" . $value['tramite_id'] ?>
                  <tr>
                    <td>
                      <h6 class="mb-0 text-sm"><?= $value['nombre'] ?></h6>
                      <p class="text-xs text-secondary mb-0"><?= $value['descripciont'] ?></p>
                    </td>
                    <td>
                      <?php if ($value['descripcion'] == 'Finalizado') : ?>
                        <p class="text-xs text-whte mb-0 btn btn-success"><?= $value["descripcion"] ?></p>
                      <?php elseif ($value['descripcion'] == 'Rechazado') : ?>
                        <p class="text-xs text-white mb-0 btn btn-danger"><?= $value["descripcion"] ?></p>
                      <?php elseif ($value['descripcion'] == 'En Proceso') : ?>
                        <p class="text-xs text-white mb-0 btn btn-primary"><?= $value["descripcion"] ?></p>
                      <?php elseif ($value['descripcion'] == 'Observado') : ?>
                        <p class="text-xs text-white mb-0 btn btn-warning"><?= $value["descripcion"] ?></p>
                      <?php elseif ($value['descripcion'] == 'Iniciado') : ?>
                        <p class="text-xs text-white mb-0 btn btn-info""><?= $value["descripcion"] ?></p>
                      <?php endif; ?>
                    </td>
                    <td>
                          <?php if ($value['idioma'] == 'EN PROCESO') : ?>
                            <h6 class=" mb-0 text-sm">Sin Especificar</h6>
                        <?php else : ?>
                        <h6 class="mb-0 text-sm"><?= $value['idioma'] ?></h6>
                      <?php endif; ?>
                      <?php if ($value['nivel'] == 'EN PROCESO') : ?>
                        <?php if (!empty($value['nivel'])) : ?>
                          <p class="text-xs text-secondary mb-0">Sin Especificar</p>
                        <?php endif; ?>
                      <?php else : ?>
                        <p class="mb-0 text-sm"><?= $value['nivel'] ?></p>
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php if ($value['status'] == 1) : ?>
                        <p class="text-xs text-secondary mb-0"><i class='fas fa-donate' style='font-size:38px;color:green'></i></p>
                      <?php else : ?>
                        <p class="text-xs text-secondary mb-0"><i class='fas fa-donate' style='font-size:38px;color:red'></i></p>
                      <?php endif; ?>
                    </td>
                    <td>
                      <h6 class="mb-0 text-sm"><?= $value['nombres'] ?></h6>
                      <p class="text-xs text-secondary mb-0"><?= $value['ap_paterno'] . ' ' . $value['ap_materno'] ?></p>
                    </td>
                    <td>
                      <p class="text-xs text-secondary mb-0"><?= $value['cantidad'] ?></p>
                    </td>
                    <td>
                      <p class="text-xs text-secondary mb-0"><?= $value['fechainit'] ?></p>
                    </td>
                    <td>
                      <a class="btn" href="<?= APP_URL . '/view/content/accept?id=' . $value["tramite_id"] . '&cod=' . $_GET["id"] ?>" title="Aceptar"><i class="fa fa-check-circle-o"></i></a>
                      <a class="btn" data-bs-toggle="collapse" href="#<?= $collapseId ?>" role="button" aria-expanded="false" aria-controls="<?= $collapseId ?>" title="Observacion">
                        <i class="fa fa-eye"></i>
                      </a>
                      <a class="btn" href="<?= APP_URL . '/view/content/decline?id=' . $value["tramite_id"] . '&cod=' . $_GET["id"] ?>" title="Rechazar"><i class="fa fa-ban"></i></a>
                      <!--Boton de Observacion y un collapse -->
                      <div class="collapse" id="<?= $collapseId ?>">
                        <form action="<?= APP_URL . '/view/content/observation?id=' . $value["tramite_id"] . '&cod=' . $_GET["id"] ?>" method="post">
                          <div>
                            <!-- form-control form-control-lg -->
                            <input type="text" class="form-control mb-1" placeholder="Observacion" aria-label="Observacion" name="obser" required>
                            <button type="submit" class="btn btn-success">Enviar</button>
                          </div>
                        </form>
                      </div>
                      <a class="btn" href="<?= APP_URL . '/view/detail?id=' . $value2["tramite_id"] ?>" title="Detalle"><i class="fa fa-info"></i></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else : ?>
                <td colspan="7">
                  <p class="text-xs text-secondary mb-0">Sin Registros</p>
                </td>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div <?php include_once __DIR__ . '/layout/footermenu.php'; ?>