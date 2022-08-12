<?php

require '../api/koneksi.php';

$id_pendaftaran = $_GET['id'];


$edit = mysqli_query($koneksi, "UPDATE tbl_pendaftaran SET 
                                                           status='diagnosa'
                                                           WHERE id_pendaftaran='$id_pendaftaran'");

header("location:../pages/diagnosa.php");