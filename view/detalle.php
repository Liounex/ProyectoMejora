<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
    <?php
    include_once __DIR__ . '/layout/headmenu.php';
    include_once __DIR__ . '/layout/nav.php';
    require_once(APP_ROOT . '/../Controllers/UserControllers.php');
    ?>
    <?php $obj = new UserControllers(); ?>
    <?php $datos = $obj->description($_POST['id']);
    ?>
    <div class="container-fluid py-4">
        <div class="row">
            <h5 class="text-white">DETALLE DE TRAMITE</h5>
            <div class="col-xl-4 col-sm-6 mb-xl-0">
                <a href="./tramiteus"><i class="fa fa-arrow-left m-1" style="font-size:20px;color:white"></i></a>
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-12 text-start">
                                <?php foreach ($datos as $key => $value) : ?>
                                    <p class="text-x text-secondary mb-2">Codigo de pago: <?= $value['pago_cod'] ?></p>
                                    <p class="text-x text-secondary mb-2">Tipo de Tramite: <?= $value['nombre'] ?></p>
                                    <p class="text-x text-secondary mb-2">Descripcion: <?= $value['descripciont'] ?></p>
                                    <p class="text-x text-secondary mb-2">Nombre Completo: <?= $value['nombres'] ?></p>
                                    <p class="text-x text-secondary mb-2">Apellido Completo: <?= $value['ap_paterno'] . ' ' . $value['ap_materno'] ?></p>
                                    <!-- Solo si el estado se encuentra en Observado -->
                                    <p class="text-x text-secondary mb-2">Observaciones: <?= $value['nombre'] ?></p>

                                    <?php if ($value['status'] == 0) : ?>
                                        <p class="text-x text-secondary mb-2">Estado de pago: Sin Pago <a href="./pago"><i class="fa fa-money"></i></a></p>
                                    <?php else : ?>
                                        <p class="text-x text-secondary mb-2">Estado de pago: Pagado</p>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-sm-6 mb-xl-0 mb-4">
                <i class="fa fa-file m-1" style="font-size:20px;color:white"></i>
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-12 text-start">
                                <object data="<?= $value['copia'] ?>" type="application/pdf" width="100%" height="500px">
                                    <p>
                                        No tienes un complemento de PDF instalado, pero puedes
                                        <a href="<?php $value['copia']; ?>">descargar el archivo PDF.</a>
                                    </p>
                                </object>
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
    <?php include_once __DIR__ . '/layout/footermenu.php'; ?>
<?php else : ?>
    <?php header('Location: tramiteus'); ?>
<?php endif; ?>