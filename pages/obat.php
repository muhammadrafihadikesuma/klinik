<?php

require '../widgets/header.php';
require '../widgets/sidebar.php';

?>

<body>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>DATA OBAT</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../pages/home.php">Home</a></li>
                    <li class="breadcrumb-item active">Data Obat</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="card shadow mb-4">
                <div class="col-lg-12">
                    <div class="card-body">
                        <h5 class="card-title">Data Obat</h5>
                        <div class="card-body">
                            <h6><button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#inputObat">
                                    Input Obat
                                </button>
                            </h6>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NOMOR OBAT</th>
                                            <th>NAMA OBAT</th>
                                            <th>TANGGAL</th>
                                            <th>STOK</th>
                                            <th>OBAT MASUK</th>
                                            <th>OBAT KELUAR</th>
                                            <th>SATUAN</th>
                                            <th>HARGA</th>
                                            <th>KATEGORI</th>
                                            <th>DESKRIPSI</th>
                                            <th>AUTHOR</th>
                                            <th style="text-align:center;">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require '../api/koneksi.php';
                                        $sql = mysqli_query($koneksi, "SELECT* from tbl_obat ORDER BY id_obat DESC") or die("error karena" . mysqli_error($connection));
                                        $no = 1;
                                        while ($read = mysqli_fetch_array($sql)) {
                                            $id_obat = $read['id_obat'];
                                            $id_author = $read['id_author'];
                                            $nama_obat = $read['nama_obat'];
                                            $date = $read['date'];
                                            $stok = $read['stok'];
                                            $barang_masuk = $read['barang_masuk'];
                                            $barang_keluar = $read['barang_keluar'];
                                            $satuan = $read['satuan'];
                                            $harga = $read['harga'];
                                            $kategori = $read['kategori'];
                                            $deskripsi = $read['deskripsi'];
                                            $author = $read['author'];

                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $id_obat; ?></td>
                                                <td><?php echo $nama_obat; ?></td>
                                                <td><?php echo $date; ?></td>
                                                <td><?php echo $stok; ?></td>
                                                <td><?php echo $barang_masuk; ?></td>
                                                <td><?php echo $barang_keluar; ?></td>
                                                <td><?php echo $satuan; ?></td>
                                                <td><?php echo $harga; ?></td>
                                                <td><?php echo $kategori; ?></td>
                                                <td style="text-align: justify;"><?php echo  $deskripsi;  ?></td>
                                                <td><?php echo $author; ?></td>
                                                <td style="position: relative;">
                                                    <a href="../forms/edit_obat.php?id=<?= $read['id_obat'] ?>" class="label label-sm label-info"> <i class="bi bi-pencil-square btn btn-success btn-sm"></i></a>
                                                    <a href="../api/delete_obats.php?id=<?= $read['id_obat'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapusnya ?')"><i class="bi bi-trash btn btn-danger btn-sm"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- End #main -->



    <?php
    require '../widgets/footer.php';
    ?>