<?php
require '../api/koneksi.php';
$id = $_SESSION['id'];
$query = mysqli_query($koneksi, " SELECT * FROM tbl_user WHERE id='$id'");
while ($read = mysqli_fetch_array($query)) {
    $id_author = $read['id'];
    $author = $read['nama'];
}
?>

<?php
require '../api/koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_pasien WHERE id_pasien='$id'");
while ($edit = mysqli_fetch_array($query)) {
    # code...
    $id_pasien = $edit['id_pasien'];
    $nama_pasien = $edit['nama_pasien'];
    $jk = $edit['jk'];
    $no_bpjs = $edit['no_bpjs'];
    $tgl_lahir = $edit['tgl_lahir'];
    $status_pasien = $edit['status_pasien'];
    $nama_pekerja = $edit['nama_pekerja'];
    $jabatan_pekerja = $edit['jabatan_pekerja'];
    $status_pekerja = $edit['status_pekerja'];
    $nohp_pekerja = $edit['nohp_pekerja'];
    $estate = $edit['estate'];
    $op = $edit['op'];
    $authors = $edit['author'];
}

header("location:https://api.whatsapp.com/send?phone=$nohp_pekerja&text=Hallo Bapak/Ibu %20$nama_pasien,%20%0DApakah sudah ada perubahan mengenai keluhan sebelumnya?");

?>
