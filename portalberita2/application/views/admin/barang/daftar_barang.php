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

                <!-- DataTables -->
                <div class="card mb-3">
                    <div class="card-header">
                        <a href="<?php echo site_url('admin/barang/tambah') ?>"><i class="fas fa-plus"></i> Tambah Barang</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Deskripsi Barang</th>
                                        <th>Stok Barang</th>
                                        <th>Harga Barang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    foreach ($barang as $b) : //this is make an error, use ':' to fix (barang diatas bukan berasal dari database namun ia berasal dari controller line 16 isi $data)
                                        ?>
                                    <tr>
                                        <td><?php echo $b->nama_barang ?></td><!-- itu nama field di dalam table -->
                                        <td><?php echo $b->deskripsi_barang ?></td>
                                        <td><?php echo $b->stok_barang ?></td>
                                        <td><?php echo $b->harga_barang ?></td>
                                        <td width="250">
                                            <a href="<?php echo site_url('admin/barang/edit/' . $b->kode_barang) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                                            <a onclick="deleteConfirm('<?php echo site_url('admin/barang/hapus/' . $b->kode_barang) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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