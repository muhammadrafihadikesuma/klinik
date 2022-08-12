<?php

require '../api/koneksi.php';

$id = $_GET['id'];

$edit_diagnosa = mysqli_query($koneksi, "UPDATE tbl_diagnosa SET 
                                                           status='selesai'
                                                           WHERE id_diagnosa='$id'");

$ambilpendaftaran = mysqli_query($koneksi, "SELECT * FROM tbl_diagnosa WHERE id_diagnosa = '$id' ");
while ($reads = mysqli_fetch_array($ambilpendaftaran)) {
    # code...
    $id_pendaftaran = $reads['id_pendaftaran'];
}


$edit_pendaftaran = mysqli_query($koneksi, "UPDATE tbl_pendaftaran SET 
                                                           status='selesai'
                                                           WHERE id_pendaftaran='$id_pendaftaran'");

header("location:../pages/apoteker.php");