<div class="card-body">
    <form role="form" action="<?= APP_URL . '/view/content/new' ?>" method="POST" autocomplete="off">
        <div class="mb-3">
            <select name="tprocedure" id="tprocedure" class="form-control form-control-lg" aria-label="tipo_tramite" required>
                <option value="" disabled selected>Seleccione el tipo de tramite</option>
                <option value="1" required>Certificado</option>
                <option value="2">Constancia</option>
                <option value="3">Examen de Suficiencia</option>
                <option value="4">Examen de Ubicacion</option>
            </select>
        </div>
        <div class="mb-3">
            <input type="number" class="form-control form-control-lg" placeholder="Cantidad" aria-label="Cantidad" name="cantidad" id="cantidadDocs" value="1" min="1" max="5" required>
        </div>
        <div class="mb-3">
            <input type="hidden" class="form-control form-control-lg" placeholder="Dni" value="<?= $_SESSION['dni_user'] ?>" aria-label="Dni" name="dni" required>
        </div>
        <div class="mb-3">
            <input type="hidden" class="form-control form-control-lg" placeholder="Nombre" value="<?= $_SESSION['nombres'] ?>" aria-label="nombre" name="nombre" required>
        </div>
<!--         <div class="mb-3">
            <input type="text" class="form-control form-control-lg" placeholder="Apellido Paterno" name="ap_paterno" required>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control form-control-lg" placeholder="Apellido Materno" name="ap_materno" required>
        </div> -->
        <div class="mb-3">
            <input type="hidden" class="form-control form-control-lg" placeholder="Correo" value="<?= $_SESSION['correo'] ?>" aria-label="correo" name="correo" required>
        </div>
        <div class="mb-3">
            <input type="hidden" class="form-control form-control-lg" placeholder="Numero de celular" value="<?= $_SESSION['telefono'] ?>" aria-label="celular" name="celular" required>
        </div>
        <div id="prueba"></div>
        <!--<div class="mb-3">
            <input type="hidden" class="form-control form-control-lg" placeholder="" aria-label="" name="idtipo" value="">
        </div>-->
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Proceder</button>
        </div>
    </form>
    <script src="<?= APP_URL . '/assets/js/select.js' ?>"></script>
    <script>
        const selectedOption = document.querySelector("#tprocedure");
        const testOption = document.querySelector("#cantidadDocs");
        selectedOption.addEventListener("change", () => {
            let numberOption = selectedOption.value;
            console.dir(testOption);
            if (numberOption == 3 || numberOption == 4) {
                testOption.readOnly = true;
                console.dir(testOption);
            } else if (numberOption == 1 || numberOption == 2) {
                testOption.readOnly = false;
            }
        });
    </script>
</div>