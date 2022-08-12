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
            <h1>DATA RUJUKAN</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../pages/home.php">Home</a></li>
                    <li class="breadcrumb-item active">Data Rujukan</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data Rujukan</h5>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NO MR</th>
                                        <th>NAMA</th>
                                        <th>JK</th>
                                        <th>NO BPJS</th>
                                        <th>RS RUJUKAN</th>
                                        <th>POLI</th>
                                        <th>TGL RUJUKAN</th>
                                        <th>DIAGNOSA</th>
                                        <th>ALAMAT</th>
                                        <th>TGL BUAT</th>
                                        <th style="text-align:center;">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require '../api/koneksi.php';
                                    $sql = mysqli_query($koneksi, "SELECT* from tbl_rujukan order by id asc") or die("error karena" . mysqli_error($connection));
                                    $no = 1;
                                    while ($a = mysqli_fetch_array($sql)) {
                                        $idx = $a['id'];
                                        $id = $a['id_pasien'];
                                        $d1 = $a['no_bpjs'];
                                        $d2 = $a['rs'];
                                        $d3 = $a['poli'];
                                        $d4 = $a['tgl_rujuk'];
                                        $d5 = $a['hasil_diagnosa'];
                                        $d6 = $a['alamat'];
                                        $d7 = $a['tgl_buat_rujukan'];

                                    ?>
                                        <tr style="font-size:12px;" ;>
                                            <td style="width:2%" ;><?php echo $no++;  ?></td>
                                            <td style="width:5%; text-align:left;"><?php echo  $id;  ?></td>
                                            <td style="width:7%; text-align:left;">
                                                <?php
                                                $sql1 = mysqli_query($koneksi, "SELECT * from tbl_pasien where id_pasien='$id' ") or die("error karena" . mysqli_error($connection));
                                                $hasil = mysqli_fetch_array($sql1);
                                                $nm = $hasil['nama_pasien'];
                                                $jk = $hasil['jk'];
                                                $bpjs = $hasil['no_bpjs'];

                                                echo  $nm;
                                                ?>
                                            </td>
                                            <td style="width:3%; text-align:left;">
                                                <?php
                                                if ($jk == "1") {
                                                    echo "Laki-laki";
                                                } else {
                                                    echo "Perempuan";
                                                }
                                                ?>
                                            </td>
                                            <td style="width:5%; text-align:left;"><?php echo $bpjs;  ?></td>
                                            <td style="width:5%; text-align:left;"><?php echo $d2;  ?></td>

                                            <td style="width:5%; text-align:left;"><?php echo $d3;  ?></td>
                                            <td style="width:5%; text-align:left;"><?php echo $d4;  ?></td>

                                            <td style="width:5%; text-align:left;"><?php echo $d5;  ?></td>
                                            <td style="width:5%; text-align:left;"><?php echo $d6;  ?></td>
                                            <td style="width:5%; text-align:left;"><?php echo $d7;  ?></td>




                                            <td style="width:4%; text-align:center;">

                                                <a onclick="return konfirmasi()" href="sekred.php?page=hapus_data_rujukan&id=<?php echo $idx; ?>" class="label label-sm label-danger"> Del</a>

                                            </td>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php require '../widgets/footer.php'; ?>