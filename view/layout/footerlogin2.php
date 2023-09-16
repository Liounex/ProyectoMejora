</div>
</div>
<style>
    #js-content-container {
        max-height: 100%;
        overflow-y: scroll;
    }
</style>
<div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
    <div id="js-content-container">
        <div id="resultado"></div>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>