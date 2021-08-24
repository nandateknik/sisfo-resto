<?php
$this->load->view('template/head');
$this->load->view('template/navbar');
?>
<section class="py-5 overflow-hidden bg-primary" id="home">
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Total</th>
                            <th scope="col">Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($this->cart->contents() as $items) : ?>
                            <tr>
                                <td scope="row"><?= $i++; ?></td>
                                <td><?php echo $items['name']; ?></td>
                                <td><?php echo $items['qty']; ?></td>
                                <td>Rp. <?php echo $this->cart->format_number($items['price']); ?></td>
                                <td>Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
                                <td width="200px">
                                    <button id="minus" data-qty="<?= $items['qty'] ?>" data-rowid="<?= $items['rowid'] ?>" class="btn btn-sm btn-secondary"> <i class="fa fa-minus"></i> </button>
                                    <button id="plus" data-qty="<?= $items['qty'] ?>" data-rowid="<?= $items['rowid'] ?>" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> </button>
                                    <button class="btn btn-sm btn-danger" <?php $rowid = $items['rowid'] ?> onclick="hapusRow('<?= $rowid ?>')"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr class="text-primary">
                            <td colspan="3"> </td>
                            <td class="right"><strong>Total</strong></td>
                            <td class="right">Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-right">
                    <button id="btn-bayar" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bayar">Pesan</button>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('template/footer');
?>
<script src="<?= base_url('assets/public/') ?>assets/js/jquery-3.5.1.min.js"></script>
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

                    <form action="<?= base_url('welcome/pesan') ?>" method="post">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Pemesan</label>
                            <input type="text" name="nama" class="form-control" id="nama">
                        </div>
                        <div class="mb-3">
                            <label for="nomeja" class="form-label">No Meja</label>
                            <input type="text" name="nomeja" class="form-control" id="nomeja">
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
    $(document.body).on('click', '#minus', function() {

        $.ajax({
            type: 'post',
            url: '<?= base_url('welcome/minCart') ?>',
            dataType: 'json',
            data: {
                'rowid': $(this).data("rowid"),
                'qty': $(this).data("qty")
            },
        });
        $(document).ajaxStop(function() {
            window.location.reload();
            myModal.show(modalToggle)
        });

    });

    $(document.body).on('click', '#plus', function() {

        $.ajax({
            type: 'post',
            url: '<?= base_url('/welcome/plsCart') ?>',
            dataType: 'json',
            data: {
                'rowid': $(this).data("rowid"),
                'qty': $(this).data("qty")
            },
        });
        $(document).ajaxStop(function() {
            window.location.reload();

        });

    });

    function hapusRow(id) {
        swal({
                title: "Are you sure?",
                text: "Apakah kamu yakin akan hapus data cart ?!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Berhasil! data kamu akan dihapus dan kamu akan dialihkan ke halaman selanjutnya", {
                        icon: "success",
                        button: false,
                    });
                    setInterval(function() {
                        window.location.replace("<?= site_url('welcome/deletecartrow/') ?>" + id + "");
                    }, 1500);
                } else {
                    swal("Data kamu masih aman !");
                }
            });
    }
</script>