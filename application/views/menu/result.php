<?php
$this->load->view('layout/head');
$this->load->view('layout/topbar');
$this->load->view('layout/navbar');
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Menu</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Tambah menu makanan</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Makanan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($makanan as $menu) : ?>
                        <tr>
                            <td>
                                <div class="container">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <img width="86px" height="86px" src="<?= base_url('assets/foto/' . $menu->foto) ?>">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="d-flex justify-content-between">
                                                <h1><?= $menu->nama ?></h1>
                                                <a href="<?= base_url('menu/edit/' . $menu->id) ?>"><i class="fa fa-wrench"></i></a>
                                            </div>

                                            <p> <span class="badge bg-primary"><?= $menu->status ?></span> Rp. <?= number_format($menu->harga) ?></p>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
$this->load->view('layout/footer');
?>