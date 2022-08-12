<?php 

require '../api/koneksi.php';

$id_obat=$_POST['id_obat'];
$id_author=$_POST['id_author'];
$nama_obat=$_POST['nama_obat'];
$date=$_POST['date'];
$stok=$_POST['stok'];
$barang_masuk=$_POST['barang_masuk'];
$barang_keluar=$_POST['barang_keluar'];
$satuan=$_POST['satuan'];
$harga=$_POST['harga'];
$kategori=$_POST['kategori'];
$deskripsi=$_POST['deskripsi'];
$author=$_POST['author'];

$send = mysqli_query($koneksi, " INSERT INTO tbl_obat VALUES ('$id_obat',
                                                              '$id_author',
                                                              '$nama_obat',
                                                              '$date',
                                                              '$stok',
                                                              '$barang_masuk',
                                                              '$barang_keluar',
                                                              '$satuan',
                                                              '$harga',
                                                              '$kategori',
                                                              '$deskripsi',
                                                              '$author'
                                                              )");

header("location: ../pages/obat.php");