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