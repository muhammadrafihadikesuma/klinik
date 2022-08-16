<?php
require '../api/koneksi.php';
// require 'api_checksessions.php';
?>

<!-- ======= Header ======= -->
<?php require '../widgets/header.php'; ?>
<!-- End Header -->

<!-- ======= Sidebar ======= -->
<?php require '../widgets/sidebar.php'; ?>
<!-- End Sidebar-->

<body>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>DATA PENYAKIT</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../pages/home.php">Home</a></li>
                    <!-- <li class="breadcrumb-item"><a href="../forms/add_penyakit.php">Input Penyakit</a></li> -->
                    <li class="breadcrumb-item active">Data Penyakit</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="card shadow mb-4">
                <div class="col-lg-12">
                    <div class="card-body">
                        <h5 class="card-title">Data Penyakit</h5>
                        <div class="card-body">
                            <h6><button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#inputPenyakit">
                                    Input Penyakit
                                </button>
                            </h6>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NOMOR PENYAKIT</th>
                                            <th>NAMA PENYAKIT</th>
                                            <th>DESKRIPSI</th>
                                            <th style="text-align:center;">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require '../api/koneksi.php';
                                        $sql = mysqli_query($koneksi, "SELECT* from tbl_penyakit order by id_penyakit DESC") or die("error karena" . mysqli_error($connection));
                                        $no = 1;
                                        while ($read = mysqli_fetch_array($sql)) {
                                            $id_penyakit = $read['id_penyakit'];
                                            $nama_penyakit = $read['nama_penyakit'];
                                            $deskripsi = $read['deskripsi'];

                                        ?>
                                            <tr>
                                                <td><?php echo $no++;  ?></td>
                                                <td><?php echo $id_penyakit;  ?></td>
                                                <td><?php echo  $nama_penyakit;  ?></td>
                                                <td style="text-align: justify;"><?php echo  $deskripsi;  ?></td>
                                                <td style="position: relative;">
                                                    <a href="../forms/edit_penyakit.php?id=<?= $read['id_penyakit'] ?>" class="label label-sm label-info"> <i class="bi bi-pencil-square btn btn-success btn-sm"></i></a>
                                                    <a href="../api/delete_penyakits.php?id=<?= $read['id_penyakit'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapusnya ?')"><i class="bi bi-trash btn btn-danger btn-sm"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
    </main>
    <!-- End #main -->
</body>
<?php require '../widgets/footer.php'; ?>
<!-- Modal Input Penyakit-->
<div class="modal fade" id="inputPenyakit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Input Penyakit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                require '../api/koneksi.php';
                $query = mysqli_query($koneksi, "SELECT max(id_penyakit) as kodeTerbesar FROM tbl_penyakit");
                $data = mysqli_fetch_array($query);
                $idPenyakit = $data['kodeTerbesar'];
                $urutans = (int) substr($idPenyakit, 6, 5);
                $urutans++;
                $hurufs = "PWSPKT";
                $idPenyakit = $hurufs . sprintf("%05s", $urutans);
                ?>

                <form action="../api/add_penyakits.php" method="POST">

                    <!-- Nomor Penyakit -->
                    <div class="col-12"></div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="2" name="id_penyakit" value="<?php echo $idPenyakit; ?>" placeholder="Masukkan" readonly>
                        <label for="2">Nomor Penyakit</label>
                    </div>

                    <!-- Nama Penyakit -->
                    <div class="col-12"></div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="1" onkeyup="my1()" name="nama_penyakit" placeholder="Masukkan Nama Penyakit" required>
                        <label for="1">Nama Penyakit</label>
                    </div>

                    <!-- Deskripsi -->
                    <div class="col-12"></div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="6" name="deskripsi" data-enable-grammarly="false" placeholder="Masukkan Keluhan Pasien" style="height: 250px;" onkeyup="my6()" required></textarea>
                        <label for="6">Deskripsi</label>
                    </div>

                    <div class="col-sm-10 text-center">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>

                </form><!-- End General Form Elements -->

            </div>

        </div>
    </div>
</div>