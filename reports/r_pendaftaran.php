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

<!-- <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script> -->
<!-- <link rel="stylesheet"  href="https://cdn.datatables.net/v/dt/dt-1.11.4/date-1.1.1/datatables.min.css" /> -->

<!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.4/date-1.1.1/datatables.min.js"></script> -->

<!-- <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" /> -->
<!-- <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script> -->
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.4/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/datatables.min.css" /> -->


<body>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>DATA PENDAFTARAN</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../pages/home.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="../forms/add_pendaftaran.php">Input Pendaftaran</a></li>
                    <li class="breadcrumb-item active">Data Pendaftaran</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="card shadow mb-4">
                <div class="col-lg-12">
                    <div class="card-body">
                        <h5 class="card-title">Data Pasien</h5>
                        <div class="card-body">
                            <table border="0" cellspacing="5" cellpadding="5">
                                <tbody>
                                    <tr>
                                        <td>Start Date:</td>
                                        <td><input type="text" class="form-control ml-2" id="min" name="min"></td>
                                    </tr>
                                    <tr>
                                        <td>End Date:</td>
                                        <td><input type="text" class="form-control ml-2 mt-2" id="max" name="max"></td>
                                    </tr>
                                </tbody>
                            </table>

                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example" width="100%" cellspacing="1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NO. PENDAFTARAN</th>
                                            <th>NO. PASIEN</th>
                                            <th>NAMA</th>
                                            <th>TANGGAL</th>
                                            <th>INFORMASI</th>
                                            <th>KELUHAN</th>
                                            <th>STATUS</th>
                                            <th>AUTHOR</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        require '../api/koneksi.php';
                                        $sql = mysqli_query($koneksi, "SELECT * from tbl_pendaftaran order by id_pendaftaran DESC") or die("error karena" . mysqli_error($koneksi));
                                        $no = 1;
                                        while ($read = mysqli_fetch_array($sql)) {
                                            $id_pendaftaran = $read['id_pendaftaran'];
                                            $id_pasien = $read['id_pasien'];
                                            $tanggal_pendaftaran = $read['tanggal_pendaftaran'];
                                            $tinggi_badan = $read['tinggi_badan'];
                                            $berat_badan = $read['berat_badan'];
                                            $lingkar_perut = $read['lingkar_perut'];
                                            $tensi_darah = $read['tensi_darah'];
                                            $suhu = $read['suhu'];
                                            $nadi = $read['nadi'];
                                            $pernafasan = $read['pernafasan'];
                                            $keluhan_pasien = $read['keluhan_pasien'];
                                            $status = $read['status'];
                                            $author = $read['author'];

                                        ?>
                                            <tr>
                                                <td style="width:2%" ;><?php echo $no++;  ?></td>
                                                <td style="width:3%; text-align:center;"><?php echo  $id_pendaftaran;  ?></td>
                                                <td style="width:3%; text-align:left;"><?php echo  $id_pasien;  ?></td>
                                                <td style="width:15%; text-align:left;">
                                                    <?php
                                                    require '../api/koneksi.php';
                                                    $pasien = mysqli_query($koneksi, "SELECT * from tbl_pasien where id_pasien='$id_pasien'") or die("error karena " . mysqli_error($koneksi));
                                                    while ($reads = mysqli_fetch_array($pasien)) {
                                                        echo $nama_pasien = $reads['nama_pasien'];
                                                    }
                                                    ?>
                                                </td>
                                                <td style="width:5%; text-align:left;"><?php echo  $tanggal_pendaftaran;  ?></td>
                                                <td style="width:20%; text-align:left;"><?php echo "Tinggi : ";
                                                                                        echo $tinggi_badan, " Cm";
                                                                                        echo " <br> Berat Badan : ";
                                                                                        echo $berat_badan, " Kg";
                                                                                        echo " <br> Lingkar Perut : ";
                                                                                        echo $lingkar_perut, " Cm";
                                                                                        echo " <br> Tensi Darah : ";
                                                                                        echo $tensi_darah, " mmHg";
                                                                                        echo " <br> Suhu : ";
                                                                                        echo $suhu, " °C";
                                                                                        echo " <br> Nadi : ";
                                                                                        echo $nadi, " kali per menit";
                                                                                        echo " <br> Pernafasan : ";
                                                                                        echo $pernafasan, " kali per menit"; ?></td>
                                                <td><?php echo  $keluhan_pasien;  ?></td>
                                                <td style="width: 8%;"><?php echo  $status;  ?></td>
                                                <td style="width: 20%;"><?php echo  $author;  ?></td>
                                                <td style="text-align: center; width: 7%;">
                                                    <a href="../forms/edit_pendaftaran.php?id=<?= $read['id_pendaftaran'] ?>" class="label label-sm label-info">
                                                        <i class="bi bi-pencil-square btn btn-success btn-sm"></i></a>
                                                    <a href="../api/delete_pendaftaran.php?id=<?= $read['id_pendaftaran'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapusnya ?')">
                                                        <i class="bi bi-trash btn btn-danger btn-sm"></i></a>
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

    <?php require '../widgets/footer.php'; ?>
<script>
    var minDate, maxDate;
 
 // Custom filtering function which will search data in column four between two values
 $.fn.dataTable.ext.search.push(
     function( settings, data, dataIndex ) {
         var min = minDate.val();
         var max = maxDate.val();
         var date = new Date( data[4] );
  
         if (
             ( min === null && max === null ) ||
             ( min === null && date <= max ) ||
             ( min <= date   && max === null ) ||
             ( min <= date   && date <= max )
         ) {
             return true;
         }
         return false;
     }
 );
  
 $(document).ready(function() {
     // Create date inputs
     minDate = new DateTime($('#min'), {
         format: 'MMMM Do YYYY'
     });
     maxDate = new DateTime($('#max'), {
         format: 'MMMM Do YYYY'
     });
  
     // DataTables initialisation
     var table = $('#example').DataTable();
  
     // Refilter the table
     $('#min, #max').on('change', function () {
         table.draw();
     });
 });
</script>
