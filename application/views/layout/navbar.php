<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="<?= base_url('dashboard') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>

                    <div class="sb-sidenav-menu-heading">Menu</div>
                    <a class="nav-link" href="<?= base_url('menu/tambah') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Tambah Makanan
                    </a>
                    <a class="nav-link" href="<?= base_url('menu') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                        Data Makanan
                    </a>

                    <div class="sb-sidenav-menu-heading">Laporan</div>
                    <a class="nav-link" href="<?= base_url('laporan') ?>">
                        <div class="sb-nav-link-icon"><i class="fa fa-print"></i></div>
                        Laporan Penjualan
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?= $this->session->userdata('nama');
                ?>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>