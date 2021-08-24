<?php
$this->load->view('layout/head');
$this->load->view('layout/topbar');
$this->load->view('layout/navbar');
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Pesanan baru</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Pesanan sudah dibayar</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Total Penjualan</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <div class="small text-white"><i class="fas fa-angle-right"></i> Rp. <?= number_format($counttotal->total) ?></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Pesanan dibatalkan</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Daftar pesanan
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Tanggal</th>
                        <th>No Meja</th>
                        <th>Status</th>
                        <th>Menu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pesanan as $data) : ?>
                        <tr>
                            <td><?= $data->nama ?></td>
                            <td><?= $data->tanggal ?></td>
                            <td><?= $data->no_meja ?></td>
                            <td><?= $data->status ?></td>
                            <td><a href="<?= base_url('dashboard/pembayaran/' . $data->id) ?>" class="btn btn-primary">BAYAR</a></td>
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