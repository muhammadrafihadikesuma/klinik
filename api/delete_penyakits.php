<?php 
require '../api/koneksi.php';
$id=$_GET['id'];
$delete=mysqli_query($koneksi,"DELETE  from tbl_penyakit where id_penyakit='$id'")or die(mysqli_error($connection));

header("location:../pages/penyakit.php");
