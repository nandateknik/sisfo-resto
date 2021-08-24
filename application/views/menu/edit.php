<?php
$this->load->view('layout/head');
$this->load->view('layout/topbar');
$this->load->view('layout/navbar');
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Menu</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Edit menu makanan</li>
    </ol>
    <div class="card p-3">
        <div class="card-body">
            <div class="row">
                <div class="col-4">

                    <div class="text-center mt-2">
                        <img width="250px" src="<?= base_url('assets/foto/' . $makanan->foto) ?>" alt="">
                        <button data-bs-toggle="modal" data-bs-target="#foto" class="mt-3 btn btn-primary">Ganti Foto</button>
                    </div>
                </div>
                <div class="col-8">
                    <form method="post" action="<?= base_url('menu/updateMenu') ?>">
                        <div class="mb-3">
                            <input type="hidden" value="<?= $makanan->id ?>" name="id" id="id">
                            <label for="nama" class="form-label">Nama Makanan</label>
                            <input name="nama" value="<?= $makanan->nama ?>" type="text" class="form-control" id="nama" placeholder="Masukan nama makanan">
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga Makanan</label>
                            <input name="harga" value="<?= $makanan->harga ?>" type="number" class="form-control" id="harga" placeholder="Masukan harga makanan">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->load->view('layout/footer');
?>

<!-- Modal -->
<div class="modal fade" id="foto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="<?= base_url('menu/updateFoto') ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="hidden" value="<?= $makanan->id ?>" name="id" id="id">
                        <input type="hidden" name="oldfoto" id="oldfoto" value="<?= $makanan->foto ?>">
                        <label for="foto" class="form-label">Foto Makanan</label>
                        <input name="foto" class="form-control" type="file" id="foto">
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>