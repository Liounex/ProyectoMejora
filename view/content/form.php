<div class="card-body">
    <form role="form" action="../content/actions/new" method="POST" autocomplete="off">
        <div class="mb-3">
            <select name="tprocedure" id="tprocedure" class="form-control form-control-lg" aria-label="tipo_tramite" required>
                <option value="0" disabled selected>Seleccione el tipo de tramite</option>
                <option value="1">Certificado</option>
                <option value="2">Constancia</option>
                <option value="3">Examen de Suficiencia</option>
                <option value="4">Examen de Ubicacion</option>
            </select>
        </div>
        <div class="mb-3">
            <input type="hidden" class="form-control form-control-lg" placeholder="Dni" value="<?= $_SESSION['dni_user'] ?>" aria-label="Dni" name="dni" required>
        </div>
        <div class="mb-3">
            <input type="hidden" class="form-control form-control-lg" placeholder="Nombre" value="<?= $_SESSION['nombres'] ?>" aria-label="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <input type="hidden" class="form-control form-control-lg" placeholder="Correo" value="<?= $_SESSION['correo'] ?>" aria-label="correo" name="correo" required>
        </div>
        <div class="mb-3">
            <input type="hidden" class="form-control form-control-lg" placeholder="Numero de celular" value="<?= $_SESSION['telefono'] ?>" aria-label="celular" name="celular" required>
        </div>
        <!--<div class="mb-3">
            <input type="hidden" class="form-control form-control-lg" placeholder="" aria-label="" name="idtipo" value="">
        </div>-->
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Proceder</button>
        </div>
    </form>
</div>