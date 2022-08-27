<?php 
require '../api/koneksi.php';
$id=$_GET['id'];
$delete= mysqli_query($koneksi,"DELETE  from tbl_pasien WHERE id_pasien='$id'")or die(mysqli_error($connection));
$delete= mysqli_query($koneksi,"DELETE  from pangkor WHERE id_pasien='$id'")or die(mysqli_error($connection));
header("location:../pages/pasien_pkr.php");
