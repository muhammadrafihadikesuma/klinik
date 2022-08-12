<?php 
require '../api/koneksi.php';
$id=$_GET['id'];
$delete=mysqli_query($koneksi,"DELETE  from tbl_pendaftaran where id_pendaftaran='$id'")or die(mysqli_error($connection));

header("location:../pages/pendaftaran.php");
