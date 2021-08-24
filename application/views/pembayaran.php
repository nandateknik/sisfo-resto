<?php
$this->load->view('layout/head');
$this->load->view('layout/topbar');
$this->load->view('layout/navbar');
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Pembayaran</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Transaksi pembayaran</li>
    </ol>

    <div class="card m-4">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" value="<?= $pesanan->nama ?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="nomeja" class="form-label">No Meja</label>
                            <input type="text" class="form-control" id="nomeja" value="<?= $pesanan->no_meja ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card m-4">
        <div class="card-body mt-2">
            <table class="table">
                <thead>
                    <th scope="col">Nama</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Total</th>

                    </tr>
                </thead>
                <tbody><?php $sum = 0; ?>
                    <?php foreach ($listpesanan as $items) : ?>

                        <tr>
                            <td><?= $items->nama ?></td>
                            <td><?= $items->jumlah ?></td>
                            <td>Rp. <?= number_format($items->harga) ?></td>
                            <td>Rp. <?= number_format($items->total) ?></td>
                            <?php $sum += $items->total; ?>
                        </tr>

                    <?php endforeach; ?>
                    <tr>
                        <td colspan="3">Total</td>
                        <td class="text-danger">Rp. <?= number_format($sum) ?></td>
                    </tr>
                </tbody>
            </table>
            <div class="text-center">
                <button data-bs-toggle="modal" data-bs-target="#bayar" class="btn btn-primary">Bayar</button>
            </div>
        </div>
    </div>
    <?php
    $this->load->view('layout/footer');
    ?>
    <!-- Modal -->
    <div class="modal fade" id="bayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">

                        <form action="<?= base_url('dashboard/insertPembayaran') ?>" method="post">
                            <div class="mb-3">
                                <input type="hidden" name="id" id="id" value="<?= $pesanan->id ?>">
                                <label for="total" class="form-label">Total</label>
                                <input readonly type="number" value="<?= $sum ?>" name="total" class="form-control" id="total">
                            </div>
                            <div class="mb-3">
                                <label for="kembalian" class="form-label">Kembalian</label>
                                <input readonly type="number" name="kembalian" class="form-control" id="kembalian">
                            </div>
                            <div class="mb-3">
                                <label for="dibayar" class="form-label">Dibayar</label>
                                <input type="number" onkeyup="myFunction()" name="dibayar" class="form-control" id="dibayar">
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function myFunction() {
            var bayar = parseInt(document.getElementById("dibayar").value);
            var total = parseInt(document.getElementById("total").value);
            document.getElementById('kembalian').value = bayar - total;

        }
    </script>