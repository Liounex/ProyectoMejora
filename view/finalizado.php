<?php
include_once __DIR__ . '/layout/headmenu.php';
include_once __DIR__ . '/layout/nav.php';
require_once APP_ROOT . '/../Controllers/DocControllers.php';
$obj = new DocControllers();
$ver = $obj->verestado(4);
?>
<div class="container-fluid py-4 mb-5">
    <div class="row">
        <h5 class="text-white">TRAMITES FINALIZADOS</h5>
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
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <h6 class="mb-0 text-sm"><?= $data['idioma'] ?></h6>
                                            <?php if (!empty($data['nivel'])) : ?>
                                                <p class="text-xs text-secondary mb-0"><?= $data['nivel'] ?></p>
                                            <?php endif; ?>
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
</div <?php include_once __DIR__ . '/layout/footermenu.php'; ?>