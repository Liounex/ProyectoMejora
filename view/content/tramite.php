<?php
    require '../layout/headmenu.php';
    require '../layout/nav.php';
?>
<div class="container-fluid py-4 mb-5">
  <div class="row">
    <h5>REALIZAR UN NUEVO TRAMITE</h5>
        <!-- Posible Forech-->
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
          <!-- Fin forech-->
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <span style="color: white;">Boton de Prueba (Puede o no puede estar)</span>
          <button class="btn btn-success" type="button">Pagar un Tramite</button>
        </div>
      </div>
    </div>  
        


<!-- ESTADO DE LOS TRAMITES -->
<?php
    require 'c:/xampp/htdocs/proyectomejora/Controllers/UserControllers.php';
    $data = new UserControllers();
    $data->showdata();
?>
<table width=100 border=1>
  <thead>
    <tr>
      <th>dfdfsdsffds</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $poo) :?>
      <tr>
        <td><?php echo $data['nombres'] ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
  </table>


  
    <div class="container-fluid py-4">
      <div class="row">
        <h5>ESTADO DE MIS TRAMITES PENDIENTES</h5>
        <!-- Posible Forech-->
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-uppercase font-weight-bold">CERTIFICADO INGLES NIV II</p>
                      <h5 class="font-weight-bolder">
                        
                      </h5>
                      <p class="mb-0">
                        <span class="text-danger text-sm font-weight-bolder">Pendiente</span>
                        
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
          <!-- Fin forech-->
        </div>
    </div> 
    <div class="container-fluid py-4">
      <div class="row">
        <h5>TRAMITES OBSERVADOS</h5>
        <!-- Posible Forech-->
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-uppercase font-weight-bold">CERTIFICADO QUECHUA INTERMEDIO</p>
                      <h5 class="font-weight-bolder">
                        
                      </h5>
                      <p class="mb-0">
                        <span class="text-danger text-sm font-weight-bolder">OBSERVADO</span>
                        
                      </p>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <a href="">
                        <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                            <i class="fa fa-exclamation-triangle opacity-10" aria-hidden="true"></i>
                        </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Fin forech-->
        </div>
    </div>   
    <div class="container-fluid py-4">
      <div class="row">
        <h5>TRAMITES REALIZADOS</h5>
        <!-- Posible Forech-->
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-uppercase font-weight-bold">CERTIFICADO QUECHUA BASICO</p>
                      <h5 class="font-weight-bolder">
                        
                      </h5>
                      <p class="mb-0">
                        <span class="text-success text-sm font-weight-bolder">Realizado</span>
                        
                      </p>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <a href="">
                        <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                            <i class="fa fa-check-circle opacity-10" aria-hidden="true"></i>
                        </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Fin forech-->
        </div>
    </div>
<?php
    require '../layout/footermenu.php';
?>
