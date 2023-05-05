<div class="card-body">
    <form role="form" action="<?= APP_URL . '/view/content/new'?>" method="POST" autocomplete="off">
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
        <div id="prueba"></div>
        <!--<div class="mb-3">
            <input type="hidden" class="form-control form-control-lg" placeholder="" aria-label="" name="idtipo" value="">
        </div>-->
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Proceder</button>
        </div>
    </form>
    <script>
        const select = document.getElementById('tprocedure');
        const inputContainer = document.getElementById('prueba');

        select.onchange = function() {
        const opcionSeleccionada = select.value;

        if (opcionSeleccionada === '1') {
            inputContainer.innerHTML =
            '<div class="mb-3"><input type="text" class="form-control form-control-lg" placeholder="Idioma" aria-label="Idioma" name="idioma" required></div>' +
            '<div class="mb-3"><input type="text" class="form-control form-control-lg" placeholder="Nivel" aria-label="Nivel" name="nivel" required></div>' +
            '<div class="mb-3"><input type="date" class="form-control form-control-lg" placeholder="Año" aria-label="Año" name="year" required></div>';
        } else if (opcionSeleccionada === '2') {
            inputContainer.innerHTML =
            '<div class="mb-3"><input type="text" class="form-control form-control-lg" placeholder="Idioma" aria-label="Idioma" name="idioma" required></div>' +
            '<div class="mb-3"><input type="text" class="form-control form-control-lg" placeholder="Nivel" aria-label="Nivel" name="nivel" required></div>' +
            '<div class="mb-3"><input type="date" class="form-control form-control-lg" placeholder="Año" aria-label="Año" name="year" required></div>';
        } else if (opcionSeleccionada === '3') {
            inputContainer.innerHTML =
            '<div class="mb-3"><input type="text" class="form-control form-control-lg" placeholder="Idioma" aria-label="Idioma" name="idioma" required></div>' +
            '<div class="mb-3"><input type="text" class="form-control form-control-lg" placeholder="Nivel" aria-label="Nivel" name="nivel" required></div>' +
            '<div class="mb-3"><input type="hidden" class="form-control form-control-lg" placeholder="Año" aria-label="Año" name="year" value="0"  required></div>';
        } else if (opcionSeleccionada === '4') {
            inputContainer.innerHTML =
            '<div class="mb-3"><input type="hidden" class="form-control form-control-lg" placeholder="Idioma" aria-label="Idioma" name="idioma" value="INGLES" required></div>' +
            '<div class="mb-3"><input type="hidden" class="form-control form-control-lg" placeholder="Nivel" aria-label="Nivel" name="nivel" value="0"  required></div>' +
            '<div class="mb-3"><input type="hidden" class="form-control form-control-lg" placeholder="Año" aria-label="Año" name="year" value="0"  required></div>';
        } else {
            inputContainer.innerHTML = '';
        }
        };
    </script>
</div>