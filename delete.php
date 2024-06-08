<?php
require 'koneksi.php';
$id = $_GET['id'];
$sql = mysqli_query($koneksi,"DELETE  FROM  mahasiswa WHERE id = '$id'");
if($sql){
  echo "
  <script>
  alert('Data Berhasil Dihapus');
  document.location.href='index.php';
  </script>
  ";
}else {
  echo "
  <script>
  alert('Data Gagal Dihapus');
  document.location.href='index.php';
  </script>
  ";
}