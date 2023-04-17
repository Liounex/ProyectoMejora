var modal = document.getElementById("myModal");
var span = document.getElementsByClassName("close")[0];
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        }
}
modal.style.display = "block";