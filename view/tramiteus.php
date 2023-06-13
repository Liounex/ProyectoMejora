  <?php
  include_once __DIR__ . '/layout/headmenu.php';
  include_once __DIR__ . '/layout/nav.php';
  require_once APP_ROOT . '/../Controllers/UserControllers.php';
  require_once __DIR__ . '/../Controllers/DocControllers.php';
  $obj = new UserControllers();
  $datos = $obj->show($_SESSION['dni_user']);
  $datos2 = $obj->showadmin();
  ?>
  <!-- Todo para el Administrador-->
  <?php if ($_SESSION['tipo_usuario_id'] == 1) : ?>
    <div class="container-fluid py-4 mb-5">
      <div class="row">
        <h5 class="text-white">TRAMITES EN LISTA</h5>
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
                  <?php if ($datos2) : ?>
                    <?php foreach ($datos2 as $key => $value2) : ?>
                      <?php $collapseId = "collapse" . $value2['tramite_id'] ?>
                      <tr>
                        <td>
                          <h6 class="mb-0 text-sm"><?= $value2['nombre'] ?></h6>
                          <p class="text-xs text-secondary mb-0"><?= $value2['descripciont'] ?></p>
                        </td>
                        <td>
                          <!-- Estado de tramite -->
                          <?php if ($value2['descripcion'] == 'Finalizado') : ?>
                            <p class="text-xs text-whte mb-0 btn btn-success"><?= $value2["descripcion"] ?></p>
                          <?php elseif ($value2['descripcion'] == 'Rechazado') : ?>
                            <p class="text-xs text-white mb-0 btn btn-danger"><?= $value2["descripcion"] ?></p>
                          <?php elseif ($value2['descripcion'] == 'En Proceso') : ?>
                            <p class="text-xs text-white mb-0 btn btn-primary"><?= $value2["descripcion"] ?></p>
                          <?php elseif ($value2['descripcion'] == 'Observado') : ?>
                            <p class="text-xs text-white mb-0 btn btn-warning"><?= $value2["descripcion"] ?></p>
                          <?php elseif ($value2['descripcion'] == 'Iniciado') : ?>
                            <p class="text-xs text-white mb-0 btn btn-info"><?= $value2["descripcion"] ?></p>
                          <?php endif; ?>
                        <td>
                          <?php if ($value2['idioma'] == 'EN PROCESO') : ?>
                            <h6 class="mb-0 text-sm">Sin Especificar</h6>
                          <?php else : ?>
                            <h6 class="mb-0 text-sm"><?= $value2['idioma'] ?></h6>
                          <?php endif; ?>
                          <?php if ($value2['nivel'] == 'EN PROCESO') : ?>
                            <?php if (!empty($value2['nivel'])) : ?>
                              <p class="text-xs text-secondary mb-0">Sin Especificar</p>
                            <?php endif; ?>
                          <?php else : ?>
                            <p class="mb-0 text-sm"><?= $value2['nivel'] ?></p>
                          <?php endif; ?>
                        </td>
                        <td>
                          <?php if ($value2['status'] == 1) : ?>
                            <p class="text-xs text-secondary mb-0"><i class='fas fa-donate' style='font-size:38px;color:green'></i></p>
                          <?php else : ?>
                            <p class="text-xs text-secondary mb-0"><i class='fas fa-donate' style='font-size:38px;color:red'></i></p>
                          <?php endif; ?>
                        </td>
                        <td>
                          <h6 class="mb-0 text-sm"><?= $value2['nombres'] ?></h6>
                          <p class="text-xs text-secondary mb-0"><?= $value2['ap_paterno'] . ' ' . $value2['ap_materno'] ?></p>
                        </td>
                        <td>
                          <p class="text-xs text-secondary mb-0"><?= $value2['cantidad'] ?></p>
                        </td>
                        <td>
                          <p class="text-xs text-secondary mb-0"><?= $value2['fechainit'] ?></p>
                        </td>
                        <td>
                          <a class="btn" href="<?= APP_URL . '/view/content/accept?id=' . $value2["tramite_id"] . '&cod=' . $_GET["id"] ?>" title="Aceptar"><i class="fa fa-check-circle-o"></i></a>
                          <a class="btn" data-bs-toggle="collapse" href="#<?= $collapseId ?>" role="button" aria-expanded="false" aria-controls="<?= $collapseId ?>" title="Observacion">
                            <i class="fa fa-eye"></i>
                          </a>
                          <a class="btn" href="<?= APP_URL . '/view/content/decline?id=' . $value2["tramite_id"] . '&cod=' . $_GET["id"] ?>" title="Rechazar"><i class="fa fa-ban"></i></a>
                          <!--Boton de Observacion y un collapse -->
                          <div class="collapse" id="<?= $collapseId ?>">
                            <form action="<?= APP_URL . '/view/content/observation?id=' . $value2["tramite_id"] . '&cod=' . $_GET["id"] ?>" method="post">
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
    <!-- EndAdministradores -->
    <!-- Para los Directores -->
  <?php elseif ($_SESSION['tipo_usuario_id'] == 4) : ?>
    <?php
    $obj = new DocControllers();
    $ver = $obj->verestado(2);
    ?>
    <div class="container-fluid py-4 mb-5">
      <div class="row">
        <h5 class="text-white">TRAMITES EN LISTA</h5>
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
                  <?php if ($ver) : ?>
                    <?php foreach ($ver as $key => $data) : ?>
                      <?php $collapseId = "collapse" . $data['tramite_id'] ?>
                      <tr>
                        <td>
                          <h6 class="mb-0 text-sm"><?= $data['nombre'] ?></h6>
                          <p class="text-xs text-secondary mb-0"><?= $data['descripciont'] ?></p>
                        </td>
                        <td>
                          <?php if ($data['descripcion'] == 'Finalizado') : ?>
                            <p class="text-xs text-whte mb-0 btn btn-success"><?= $data["descripcion"] ?></p>
                          <?php elseif ($data['descripcion'] == 'En Proceso') : ?>
                            <p class="text-xs text-white mb-0 btn btn-primary"><?= $data["descripcion"] ?></p>
                          <?php endif; ?>
                        </td>
                        <td>
                          <h6 class="mb-0 text-sm"><?= $data['idioma'] ?></h6>
                          <!--                           <p class="text-xs text-secondary mb-0"><?php #$data['nivel'] 
                                                                                                ?></p> -->
                        </td>
                        <td>
                          <?php if ($data['status'] == 1) : ?>
                            <p class="text-xs text-secondary mb-0"><i class='fas fa-donate' style='font-size:38px;color:green'></i></p>
                          <?php else : ?>
                            <p class="text-xs text-secondary mb-0"><i class='fas fa-donate' style='font-size:38px;color:red'></i></p>
                          <?php endif; ?>
                        </td>
                        <td>
                          <h6 class="mb-0 text-sm"><?= $data['nombres'] ?></h6>
                          <p class="text-xs text-secondary mb-0"><?= $data['ap_paterno'] . ' ' . $data['ap_materno'] ?></p>
                        </td>
                        <td>
                          <p class="text-xs text-secondary mb-0"><?= $data['cantidad'] ?></p>
                        </td>
                        <td>
                          <p class="text-xs text-secondary mb-0"><?= $data['fechainit'] ?></p>
                        </td>
                        <td>
                          <?php if ($data['descripcion'] == 'En Proceso') : ?>
                            <a href="<?= APP_URL . '/view/content/certid?id=' . $data["tramite_id"] ?>" class="btn"><i class="fa fa-file-o"></i></a>
                          <?php elseif ($data['descripcion'] == 'Finalizado') : ?>
                            <label for="">Tramite Procesado</label>
                          <?php endif; ?>
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
    <!-- EndDirectores -->
    <!-- Todo para el usuario-->
  <?php elseif ($_SESSION['tipo_usuario_id'] == 2) : ?>
    <div class="container-fluid py-4 mb-5">
      <div class="row">
        <h5 class="text-white">REALIZAR UN NUEVO TRAMITE</h5>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">AGREGAR TRAMITE</p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <button type="button" class="border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                      <i class="fa fa-plus text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </button>
                  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">Nuevo Tramite</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <?php include_once __DIR__ . '/form.php'; ?>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ESTADO DE LOS TRAMITES -->
    <div class="container-fluid py-4">
      <h5>ESTADO DE MIS TRAMITES</h5>
      <div class="row">
        <?php if ($datos) : ?>
          <?php foreach ($datos as $key => $value) : ?>
            <div class="col-xl-3 col-sm-6 mb-xl-2 mb-4">
              <div class="card">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <p class="text-sm mb-0 text-uppercase font-weight-bold"><?= $value['nombre'] ?></p>
                        Codigo de pago
                        <p class="text-sm mb-0 text-uppercase font-weight-bold"><?= $value['pago_cod'] ?> </p>
                        <h5 class="font-weight-bolder"></h5>
                        <p class="mb-0">
                          <?php if ($value['estado_id'] == 1) : ?>
                            <?php $bg = 'icon icon-shape bg-gradient-primary shadow-warning text-center rounded-circle'; ?>
                            <?php $ico = '<i class="fa fa-get-pocket opacity-10" aria-hidden="true"></i>'; ?>
                            <span class="text-primary text-sm font-weight-bolder"><?= $value['descripcion'] ?></span>
                          <?php elseif ($value['estado_id'] == 2) : ?>
                            <?php $bg = 'icon icon-shape bg-gradient-info shadow-warning text-center rounded-circle'; ?>
                            <?php $ico = '<i class="fa fa-clock-o opacity-10" aria-hidden="true"></i>'; ?>
                            <span class="text-secondary text-sm font-weight-bolder"><?= $value['descripcion'] ?></span>
                          <?php elseif ($value['estado_id'] == 3) : ?>
                            <?php $bg = 'icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle'; ?>
                            <?php $ico = '<i class="fa fa-eye opacity-10" aria-hidden="true"></i>'; ?>
                            <span class="text-warning text-sm font-weight-bolder"><?= $value['descripcion'] ?></span>
                          <?php elseif ($value['estado_id'] == 4) : ?>
                            <?php $bg = 'icon icon-shape bg-gradient-success shadow-warning text-center rounded-circle'; ?>
                            <?php $ico = '<i class="fa fa-thumbs-o-up opacity-10" aria-hidden="true"></i>'; ?>
                        <form action="./content/vercerti" method="POST">
                          <input type="hidden" name="tramite" value="<?= $value['descripciont'] ?>">
                          <input type="hidden" name="name" value="<?= $value['nombres'] ?>">
                          <input type="hidden" name="ap" value="<?= $value['ap_paterno'] ?>">
                          <input type="hidden" name="am" value="<?= $value['ap_materno'] ?>">
                          <input type="hidden" name="idioma" value="<?= $value['idioma'] ?>">
                          <button type="submit" class="border border-0 bg-transparent"><i class="fa fa-file-text" style="font-size:20px;color:green" title="Descargar Certificado"></i></button>
                        </form>
                        <span class="text-success text-sm font-weight-bolder"><?= $value['descripcion'] ?></span>
                      <?php else : ?>
                        <?php $bg = 'icon icon-shape bg-gradient-danger shadow-warning text-center rounded-circle'; ?>
                        <?php $ico = '<i class="fa fa-ban opacity-10" aria-hidden="true"></i>'; ?>
                        <span class="text-danger text-sm font-weight-bolder"><?= $value['descripcion'] ?></span>
                      <?php endif; ?>
                      <form action="./detalle" method="POST" class="p-0 m-0">
                        <input type="hidden" name="id" value="<?php echo $value['tramite_id']; ?>">
                        <button type="submit" class="border border-0 bg-transparent p-0 text-info text-sm font-weight-bolder">Detalle</button>
                      </form>
                      </p>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="<?= $bg ?>">
                        <?= $ico; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- EndUsuarios -->
          <?php endforeach; ?>
        <?php else : ?>
          <p class="text-sm mb-0 text-uppercase font-weight-bold">SIN TRAMITES INICIADOS </p>
        <?php endif; ?>
      </div>
    <?php endif; ?>
    </div <?php include_once __DIR__ . '/layout/footermenu.php'; ?>