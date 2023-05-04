<?php
    require '../layout/headmenu.php';
    require '../layout/nav.php';
    require 'C:/xampp/htdocs/proyectomejora/Controllers/UserControllers.php';
    $obj = new UserControllers();
    $datos = $obj->showdata($_GET['id']);
?>

<div class="container-fluid py-4">
<div class="row">
      <h5 class="text-white">EXAMENES EN LISTA</h5>
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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">FECHA DE PRESENTACION</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ACCIONES</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if ($datos) : ?>
                    <?php foreach ($datos as $key => $value2) : ?>
                      <?php $collapseId = "collapse" . $value2['tramite_id'] ?>
                        <tr>
                          <td>
                            <h6 class="mb-0 text-sm"><?= $value2['nombre']?></h6>
                            <p class="text-xs text-secondary mb-0"><?= $value2['descripciont']?></p>
                          </td>
                          <td>
                            <p class="text-xs text-secondary mb-0"><?= $value2['descripcion'] ?></p>
                          </td>
                          <td>
                            <h6 class="mb-0 text-sm"><?= $value2['idioma'] ?></h6>
                            <p class="text-xs text-secondary mb-0"><?= $value2['nivel'] .' '. $value2['year'] ?></p>
                          </td>
                          <td>
                            <p class="text-xs text-secondary mb-0"><?= $value2['total'] ?></p>
                          </td>
                          <td>
                            <h6 class="mb-0 text-sm"><?= $value2['nombres'] ?></h6>
                            <p class="text-xs text-secondary mb-0"><?= $value2['ap_paterno'] .' '. $value2['ap_materno'] ?></p>
                          </td>
                          <td>
                            <p class="text-xs text-secondary mb-0"><?= $value2['fechainit'] ?></p>
                          </td>
                          <td>
                          <p class="text-lg-center text-secondary mb-0">
                              <a class="btn" href="./actions/accept?id=<?= $value2['tramite_id']?>=&cod=<?= $_GET['id']?>"><i class="fa fa-check-circle-o"></i></a>
                              <a class="btn" href="./actions/decline?id=<?= $value2['tramite_id'] ?>=&cod=<?= $_GET['id']?>"><i class="fa fa-ban"></i></a>
                              <!--Boton de Observacion y un collapse -->
                              <button class="btn" data-bs-toggle="collapse" href="#<?= $collapseId ?>" 
                                role="button" aria-expanded="false" aria-controls="<?= $collapseId ?>">
                                <i class="fa fa-eye"></i>
                              </button>
                              <div class="collapse" id="<?= $collapseId ?>">
                                <form action="./actions/observation?id=<?= $value['tramite_id'] ?>=&cod=<?= $_GET['id']?>" method="post">
                                  <div class="mb-3">
                                    <input type="text" class="form-control form-control-lg" placeholder="Observacion" aria-label="Observacion" name="obser" required>
                                  </div>
                                  <div class="mb-3">
                                    <button type="submit" class="btn btn-success">Enviar</button>
                                  </div>
                                </form>
                              </div>
                            </p>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                      <?php else : ?>
                        <td colspan="7" >
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

<?php
    require '../layout/footermenu.php';
?>