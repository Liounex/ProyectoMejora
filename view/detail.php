<?php if ($_SERVER['REQUEST_METHOD'] === 'GET' || $_SERVER['REQUEST_METHOD'] === 'POST') : ?>
    <?php
    include_once __DIR__ . '/layout/headmenu.php';
    include_once __DIR__ . '/layout/nav.php';
    require_once APP_ROOT . '/../Controllers/UserControllers.php';
    ?>
    <?php $obj = new UserControllers(); ?>
    <?php $datos = $obj->description($_GET['id']); ?>
    <?php foreach ($datos as $key => $value) : ?>
    <?php endforeach; ?>
    <div class="container-fluid py-4">
        <div class="row">
            <h5 class="text-white">DETALLE DE TRAMITE</h5>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <a href="./dashboard"><i class="fa fa-arrow-left m-1" style="font-size:20px;color:white"></i></a>
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-12 text-start">
                                <div class="mb-4">
                                    <label>Observaciones hechas por el administrador</label>
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
                                </div>
                                <div class="mb-1">
                                    <label>Vaucher de pago</label>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-start">
                                        <?php
                                        $fileExtension = pathinfo($value['voucher'], PATHINFO_EXTENSION);
                                        if ($fileExtension === 'pdf') {
                                            // Mostrar PDF
                                            echo '
                                        <object data="' . $value['voucher'] . '" type="application/pdf" width="100%" height="500px">
                                            <p>No tienes un complemento de PDF instalado, pero puedes <a href="' . $value['voucher'] . '">descargar el archivo PDF</a>.</p>
                                        </object>
                                    ';
                                        } else {
                                            // Mostrar imagen
                                            echo '<img src="' . $value['voucher'] . '" alt="Archivo adjunto" style="max-width: 50%;" >';
                                        }
                                        ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-sm-6 mb-xl-0 mb-4">
                <i class="fa fa-file m-1" style="font-size:20px;color:white"></i>
                <div class="card">
                    <div class="card-body p-3">
                        <label>Copia de dni</label>
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
    <?php header('Location: dashboard'); ?>
<?php endif; ?>