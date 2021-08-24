</main>
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2021</div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/sbadmin/') ?>js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/sbadmin/') ?>assets/demo/chart-area-demo.js"></script>
<script src="<?= base_url('assets/sbadmin/') ?>assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/sbadmin/') ?>js/datatables-simple-demo.js"></script>
</body>
<?= $this->session->userdata('pesan'); ?>
<?php $this->session->unset_userdata('pesan');
?>
<script>
    function logout() {
        swal({
                title: "Are you sure?",
                text: "Yakin keluar aplikasi ?!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Berhasil logout!", {
                        icon: "success",
                    });
                    setInterval(function() {
                        window.location.replace("<?= base_url('welcome/logout') ?>");
                    }, 1500);
                } else {
                    swal("Batal logout!");
                }
            });
    }
</script>

</html>