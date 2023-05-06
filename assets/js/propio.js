var modal = document.getElementById("myModal");
var span = document.getElementsByClassName("close")[0];
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        }
}
modal.style.display = "block";




var boton = document.getElementById("basic-addon2");
boton.addEventListener("click", function() {
  var input = document.getElementById("code");
  input.select();
  document.execCommand("copy");
  notificacion.textContent = "Codigo de pago copiado al portapapeles";
  notificacion.style.display = "block";
  setTimeout(function() {
    notificacion.style.display = "none";
  }, 3000);
});