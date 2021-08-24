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
    <div class="card p-3">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="<?= base_url('menu/insertMenu') ?>">
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Makanan</label>
                    <input name="foto" class="form-control" type="file" id="foto">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Makanan</label>
                    <input name="nama" type="text" class="form-control" id="nama" placeholder="Masukan nama makanan">
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga Makanan</label>
                    <input name="harga" type="number" class="form-control" id="harga" placeholder="Masukan harga makanan">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
$this->load->view('layout/footer');
?>