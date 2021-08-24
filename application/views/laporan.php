<?php
$this->load->view('layout/head');
$this->load->view('layout/topbar');
$this->load->view('layout/navbar');
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Laporan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pencarian data laporan</li>
    </ol>
    <form class="d-print-none" action="" method="post">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <div class="row">

                        <div class="col-5">
                            <div class="mb-3">
                                <label for="dari" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="dari" name="dari">
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="mb-3">
                                <label for="dari" class="form-label">Hingga</label>
                                <input type="date" class="form-control" id="hingga" name="hingga">
                            </div>
                        </div>
                        <div class="col-2 mt-4">
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </form>
    <?php if (!empty($laporan)) : ?>
        <div class="card mb-4 mt-4">
            <div class="card-header">
                <a class="d-none-print" href="javascript:print()"> <i class="fa fa-print"></i>
                    Daftar Pembayaran</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Dibayar</th>
                            <th>Kembalian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        $dibayar = 0;
                        $kembalian = 0;
                        ?>
                        <?php foreach ($laporan as $data) : ?>
                            <tr>
                                <td><?= $data->waktu ?></td>
                                <td>Rp. <?= number_format($data->total) ?></td>
                                <td>Rp. <?= number_format($data->dibayar) ?></td>
                                <td>Rp. <?= number_format($data->kembalian) ?></td>
                            </tr>
                            <?php
                            $total += $data->total;
                            $dibayar += $data->dibayar;
                            $kembalian += $data->kembalian;
                            ?>
                        <?php endforeach; ?>
                        <tr>
                            <th>Total</th>
                            <th>Rp. <?= number_format($total) ?></th>
                            <th>Rp. <?= number_format($dibayar) ?></th>
                            <th>Rp. <?= number_format($kembalian) ?></th>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php
$this->load->view('layout/footer');
?>