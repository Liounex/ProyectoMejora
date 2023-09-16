</div>
</div>
<div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
  <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('<?= APP_URL . '/assets/img/acceso4.png' ?>'); background-size: cover;">
    <span class="mask bg-gradient-primary opacity-3"></span>
    <h4 class="mt-5 text-white font-weight-bolder position-relative"></h4>
    <p class="text-white position-relative"></p>
  </div>
</div>

</div>
</div>
</div>
</section>
</main>
<!--   Core JS Files   -->
<script src="<?= APP_URL . '/assets/js/core/popper.min.js' ?>"></script>
<script src="<?= APP_URL . '/assets/js/plugins/perfect-scrollbar.min.js' ?>"></script>
<script src="<?= APP_URL . '/assets/js/core/bootstrap.min.js' ?>"></script>
<script src="<?= APP_URL . '/assets/js/plugins/smooth-scrollbar.min.js' ?>"></script>
<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?= APP_URL . '/assets/js/argon-dashboard.min.js?v=2.0.4' ?>"></script>


</body>

</html>