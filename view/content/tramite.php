<?php
    require '../layout/headmenu.php';
    require '../layout/nav.php';
    require 'C:/xampp/htdocs/proyectomejora/Controllers/UserControllers.php';
    $obj = new UserControllers();
    $datos = $obj->show($_SESSION['dni_user']);
?>

<?php if ($_SESSION['tipo_usuario_id'] == 1) :?>
<div class="container-fluid py-4 mb-5">
    <h1 class="text-white">Ventana Para Administrador</h1>
</div>
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
                          <h5 class="font-weight-bolder">
                          </h5>
                          <p class="mb-0">
                            <span class="text-success text-sm font-weight-bolder"></span>
                          </p>
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
              <span style="color: white;">Boton de Prueba (Puede o no puede estar)</span>
              <button class="btn btn-success" type="button">Pagar un Tramite</button>
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
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold"><?= $value['nombre'] ?> </p>
                                            Codigo de pago
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold"><?= $value['pago_id'] ?> </p>
                                            <h5 class="font-weight-bolder"></h5>
                                            <p class="mb-0">
                                                <?php if ($value['estado_id'] == 1) :?>
                                                    <span class="text-primary text-sm font-weight-bolder"><?= $value['descripcion'] ?></span>
                                                <?php elseif ($value['estado_id'] == 2) :?>
                                                    <span class="text-secondary text-sm font-weight-bolder"><?= $value['descripcion'] ?></span>
                                                <?php elseif ($value['estado_id'] == 3) :?>
                                                    <span class="text-danger text-sm font-weight-bolder"><?= $value['descripcion'] ?></span>
                                                <?php else : ?>
                                                    <span class="text-success text-sm font-weight-bolder"><?= $value['descripcion'] ?></span>
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <a href="">
                                            <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                                <i class="fa fa-clock-o opacity-10" aria-hidden="true"></i>
                                            </div>
                                        </a>
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
</div>
<?php
    require '../layout/footermenu.php';
?>
