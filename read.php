<?php
require 'koneksi.php';
$sql = mysqli_query($koneksi,"SELECT * FROM mahasiswa");
if(mysqli_num_rows($sql) > 0){
  while($row= mysqli_fetch_assoc($sql)){
     $hasilData[] = $row;
  }
}