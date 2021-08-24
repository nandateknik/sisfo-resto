<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" data-navbar-on-scroll="data-navbar-on-scroll">
    <div class="container"><a class="navbar-brand d-inline-flex" href="<?= base_url('assets/public/') ?>index.html"><img class="d-inline-block" src="<?= base_url('assets/public/') ?>assets/img/gallery/logo.svg" alt="logo" /><span class="text-1000 fs-3 fw-bold ms-2 text-gradient">foodwaGon</span></a>
        <div class="text-rigt">
            <?php
            $jumlah = count($this->cart->contents());
            ?>
            <?php if (!empty($jumlah)) : ?>
                <a href="<?= base_url('welcome/checkout') ?>"><i class="fa fa-cart-plus"></i> <span class="text-danger"><?= $jumlah ?></span></a>

            <?php endif; ?>
        </div>
    </div>
</nav>