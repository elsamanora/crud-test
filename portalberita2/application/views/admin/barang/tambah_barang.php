<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/_partial/head.php") ?>
</head>

<body id="page-top">

    <?php $this->load->view("admin/_partial/navbar.php") ?>
    <div id="wrapper">

        <?php $this->load->view("admin/_partial/sidebar.php") ?>

        <div id="content-wrapper">

            <div class="container-fluid">

                <?php $this->load->view("admin/_partial/breadcrumb.php") ?>

                <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php endif; ?>

                <div class="card mb-3">
                    <div class="card-header">
                        <a href="<?php echo base_url() . 'admin/barang/tampil'; ?>" method="post"><i class=" fas fa-arrow-left"></i> Kembali</a>
                    </div>
                    <div class="container">

                        <div class="row mt-3">
                            <div class="col-md-11">
                                <div class="card">
                                    <div class="card-header">
                                        Form Tambah Data Barang
                                    </div>
                                    <div class="card-body">

                                        <form action="<?php base_url('admin/barang/tambahData') ?>" method="post" enctype="multipart/form-data">

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="inpt_kd_barang">Kode barang</label>
                                                        <input type="text" class="form-control" id="inpt_kd_barang" name="val_kd_barang" value="<?= set_value('val_kd_barang') ?>" placeholder="Masukkan Kode Barang">
                                                        <?php echo form_error('val_kd_barang') ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="inpt_nama_barang">Nama barang</label>
                                                        <input type="text" class="form-control" id="inpt_nama_barang" name="val_nama_barang" value="<?= set_value('val_nama_barang') ?>" placeholder="Masukkan Nama barang">
                                                        <?php echo form_error('val_nama_barang') ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="inpt_nama_barang">Deskripsi barang</label>
                                                        <input type="text" class="form-control" id="inpt_deskripsi_barang" name="val_deskripsi_barang" value="<?= set_value('val_deskripsi_barang') ?>" placeholder="Masukkan Deskripsi barang">
                                                        <?php echo form_error('val_deskripsi_barang') ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="inpt_stok_barang">Stok barang</label>
                                                        <input type="text" class="form-control" id="inpt_stok_barang" name="val_stok_barang" value="<?= set_value('val_stok_barang') ?>" placeholder="Masukkan Stok barang">
                                                        <?php echo form_error('val_stok_barang') ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="inpt_harga_barang">Harga barang</label>
                                                        <input type="text" class="form-control" id="inpt_harga_barang" name="val_harga_barang" value="<?= set_value('val_harga_barang') ?>" placeholder="Masukkan harga barang">
                                                        <?php echo form_error('val_harga_barang') ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" name="tambah" class="btn btn-primary">Tambah Data</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

                <!-- Sticky Footer -->
                <?php $this->load->view("admin/_partial/footer.php") ?>

            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /#wrapper -->


        <?php $this->load->view("admin/_partial/scrolltop.php") ?>
        <?php $this->load->view("admin/_partial/modal.php") ?>

        <?php $this->load->view("admin/_partial/js.php") ?>
        <script>
            function deleteConfirm(url) {
                $('#btn-delete').attr('href', url);
                $('#deleteModal').modal();
            }
        </script>
</body>

</html> 