<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') :
    include_once __DIR__ . '/layout/headmenu.php';
    include_once __DIR__ . '/layout/nav.php';
    require_once(APP_ROOT . '/../Controllers/UserControllers.php');

    $obj = new UserControllers();
    $datos = $obj->description($_POST['id']);
    $dolar = 0.00; // Valor predeterminado para $dolar
?>


    <script src="https://www.paypal.com/sdk/js?client-id=AVUiaXyUPSgJqxipeSeAJBOqqLRWuMAnXPEOiXIcKaFp3LllEKXSRhDAuMpKubk_9kO6PGwXYN3CyJPP&currency=USD&components=buttons"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                                    <label class="text-x mb-2">Codigo de pago:</label>
                                    <label class="text-x text-secondary mb-2" for=""> <?= $value['pago_cod'] ?></label><br>
                                    <label class="text-x mb-2">Tipo de Tramite:</label>
                                    <label class="text-x text-secondary mb-2" for=""> <?= $value['nombre'] ?></label><br>
                                    <label class="text-x mb-2">Descripcion:</label>
                                    <label class="text-x text-secondary mb-2" for=""> <?= $value['descripciont'] ?></label><br>
                                    <label class="text-x mb-2">Nombre Completo:</label>
                                    <label class="text-x text-secondary mb-2" for=""> <?= $value['nombres'] ?></label><br>
                                    <label class="text-x mb-2">Apellido Completo:</label>
                                    <label class="text-x text-secondary mb-2">Apellido Completo: <?= $value['ap_paterno'] . ' ' . $value['ap_materno'] ?></label><br>
                                    <!-- Solo si el estado se encuentra en Observado -->
                                    <?php $observations = [$value['obs1'], $value['obs2'], $value['obs3']]; ?>
                                    <?php if (empty(array_filter($observations))) : ?>
                                        <label class="text-x mb-2">Sin Observaciones</label><br>
                                    <?php else : ?>
                                        <label class="text-x mb-2">
                                            Observaciones <br>
                                            <?php foreach ($observations as $index => $observation) : ?>
                                                <?php if (!empty($observation)) : ?>
                                                    <?= ($index + 1) ?>. <?= $observation ?> <br>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </label>
                                    <?php endif; ?>
                                    <label class="text-x mb-2"> Precio :</label>
                                    <label class="text-x text-secondary mb-2"> <?= number_format($value['total'], 2) . ' Soles Peruanos' ?> </label><br>
                                    <?php
                                    if (is_array($datos) && isset($value['total'])) {
                                        $dolar = number_format(floatval($value['total']) / 3.70, 2);
                                    }
                                    ?>
                                    <?php if ($value['status'] == 0) : ?>
                                        <label class="">Estado de pago:</label>
                                        <label class="text-x text-secondary mb-2"> Sin Pago</label>
                                        <div id="paypal-button-container"></div>
                                    <?php else : ?>
                                        <label class="">Estado de pago:</label>
                                        <label class="text-x text-secondary mb-2"> Pagado</label>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <hr>
                                <form action="./content/updatedoc" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="cod" id="cod" value="<?= $value['pago_cod'] ?>">

                                        <div class="mb-3">
                                            <label>Voucher de Pago</label>
                                            <input type="file" name="vaucher" id="vaucher" class="form-control form-control-lg" aria-label="" accept=".jpg, .jpeg, .png, .pdf">
                                        </div>
                                        <div class="mb-3">
                                            <label>Copia de Dni</label>
                                            <input type="file" name="copydni" id="copydni" class="form-control form-control-lg" aria-label="" accept=".pdf">
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary">Subir</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-sm-6 mb-xl-0 mb-4">
                <!--                 <i class="fa fa-file m-1" style="font-size:20px;color:white"></i> -->
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
    </div>
    </div>
    </div>
    <?php include_once __DIR__ . '/layout/footermenu.php'; ?>
    <?php include_once __DIR__ . '/content/uscript.php'; ?>
<?php else : ?>
    <?php header('Location: dashboard'); ?>
<?php endif; ?>