</main>
<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->




<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<script src="<?= base_url('assets/public/') ?>vendors/@popperjs/popper.min.js"></script>
<script src="<?= base_url('assets/public/') ?>vendors/bootstrap/bootstrap.min.js"></script>
<script src="<?= base_url('assets/public/') ?>vendors/is/is.min.js"></script>
<script src="<?= base_url('assets/public/') ?>https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
<script src="<?= base_url('assets/public/') ?>vendors/fontawesome/all.min.js"></script>
<script src="<?= base_url('assets/public/') ?>assets/js/theme.js"></script>

<link href="<?= base_url('assets/public/') ?>https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&amp;display=swap" rel="stylesheet">
</body>

</html><?= $this->session->userdata('pesan'); ?>
<?php $this->session->unset_userdata('pesan');
?>