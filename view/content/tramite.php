<?php
    require '../layout/headmenu.php';
    require '../layout/nav.php';
    require 'C:/xampp/htdocs/proyectomejora/Controllers/UserControllers.php';
    $obj = new UserControllers();
    $datos = $obj->show($_SESSION['dni_user']);

    $datos2 = $obj->showadmin();
?>

<!-- Todo para el Administrador-->
<?php if ($_SESSION['tipo_usuario_id'] == 1) :?>
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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">FECHA DE PRESENTACION</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ACCIONES</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if ($datos2) : ?>
                    <?php foreach ($datos2 as $key => $value2) : ?>
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
                              <a href=""><i class="fa fa-check-circle-o"></i></a>
                              <a href=""><i class="fa fa-eye"></i></a>
                              <a href=""><i class="fa fa-ban"></i></a>
                              <!--<a href=""><i class="fa fa-check-circle"></i></a> -->
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

<!-- Todo para el usuario-->
<?php elseif ($_SESSION['tipo_usuario_id'] == 2) :?>
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
                        <?php require './form.php'; ?>
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
      <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <a href="./pago" class="btn btn-success" type="button"><i class="fa fa-money"></i> Realizar Pago</a>
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
                      <p class="text-sm mb-0 text-uppercase font-weight-bold"><?= $value['pago_id'] ?> </p>
                      <h5 class="font-weight-bolder"></h5>
                      <p class="mb-0">
                        <?php if ($value['estado_id'] == 1) :?>
                          <?php $bg = 'icon icon-shape bg-gradient-primary shadow-warning text-center rounded-circle'; ?>
                          <?php $ico = 'fa fa-get-pocket opacity-10'; ?>
                          <span class="text-primary text-sm font-weight-bolder"><?= $value['descripcion'] ?></span>
                        <?php elseif ($value['estado_id'] == 2) :?>
                          <?php $bg = 'icon icon-shape bg-gradient-info shadow-warning text-center rounded-circle'; ?>
                          <?php $ico = 'fa fa-clock-o opacity-10'; ?>
                          <span class="text-secondary text-sm font-weight-bolder"><?= $value['descripcion'] ?></span>
                        <?php elseif ($value['estado_id'] == 3) :?>
                          <?php $bg = 'icon icon-shape bg-gradient-danger shadow-warning text-center rounded-circle'; ?>
                          <?php $ico = 'fa fa-eye opacity-10'; ?>
                          <span class="text-danger text-sm font-weight-bolder"><?= $value['descripcion'] ?></span>
                        <?php else : ?>
                          <?php $bg = 'icon icon-shape bg-gradient-success shadow-warning text-center rounded-circle'; ?>
                          <?php $ico = 'fa fa-thumbs-o-up opacity-10'; ?>
                          <span class="text-success text-sm font-weight-bolder"><?= $value['descripcion'] ?></span>
                        <?php endif; ?>
                      &nbsp;<a class="text-primary text-sm font-weight-bolder" 
                                data-bs-toggle="collapse" href="#collapseExample" 
                                role="button" aria-expanded="false" aria-controls="collapseExample">
                        Detalle
                      </a>
                    </p>
                    <div class="collapse" id="collapseExample">
                      <?php if ($value['total'] == 0) :?>
                          <?php $statepage = 'No Pago' ?>
                      <?php else : ?>
                          <?php $statepage = 'Pagado' ?>
                      <?php endif; ?>
                      Idioma: 
                      <span class="text-sm font-weight-bolder"><?= $value['idioma']?></span><br>
                      Nivel: 
                      <span class="text-sm font-weight-bolder"><?= $value['nivel']?></span><br>
                      Año: 
                      <span class="text-sm font-weight-bolder"><?= $value['year']?></span><br>
                      Pago: 
                      <span class="text-sm font-weight-bolder"></span><?= $statepage ?><br>
                    </div>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="<?= $bg ?>">
                      <i class="<?= $ico ?>" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else : ?>
        <p class="text-sm mb-0 text-uppercase font-weight-bold">SIN TRAMITES INICIADOS </p>
      <?php endif;?>
    </div>
  <?php endif;?>
</div
<?php
    require '../layout/footermenu.php';
?>
