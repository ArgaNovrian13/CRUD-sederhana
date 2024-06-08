<?php
require 'koneksi.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(isset($_POST['create'])){
    $namaLengkap = htmlspecialchars($_POST['nama_lengkap']);
    $tglLahir = htmlspecialchars($_POST['tgl_lahir']);
    $jenisKelamin = htmlspecialchars($_POST['jenis_kelamin']);
    $nim = htmlspecialchars($_POST['nim']);
    $email = htmlspecialchars($_POST['email']);
    $jurusan = htmlspecialchars($_POST['jurusan']);
    $kelas = htmlspecialchars($_POST['kelas']);
    if(!filter_var($email,FILTER_SANITIZE_EMAIL)){
      echo "<script>alert('Email Tidak Valid');</script>";
    }
    $query = mysqli_query($koneksi,"INSERT INTO mahasiswa (id,nama_lengkap,tgl_lahir,jenis_kelamin,nim,email,jurusan,kelas) VALUES (NULL,'$namaLengkap','$tglLahir','$jenisKelamin','$nim','$email','$jurusan','$kelas')");
    if($query){
      echo "<script>
      alert('Data Tersimpan');
      document.location.href = 'index.php';
      </script>";
    }else {
      echo  "<script>
      alert('Data Gagal Tersimpan');
      document.location.href = 'create.php';
      </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create</title>
  <!-- Link Bulma -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
  <!-- Link Eksternal CSS -->
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
      <div>
        <h2 class="has-text-centered is-size-3" id="judulCreate">Create Data</h2>
      </div>               
      <div id="formCreate">
        <form action="" method="POST">
          <label for="nama_lengkap" class="label">Nama Lengkap</label>
          <input type="text"  class="input" name="nama_lengkap" id="nama_lengkap" autocomplete="off" required placeholder="Masukan Nama Lengkap...">
          <label for="tgl_lahir" class="label mt-2">Tanggal Lahir</label>
          <input type="date" class="input" name="tgl_lahir" id="tgl_lahir" required>
          <label for="jenis_kelamin" class="label">Jenis Kelamin</label>
          <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki" >
          <label for="Laki-Laki" class="radio">Laki-Laki</label>
          <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan" >
          <label for="Laki-Laki" class="radio">Perempuan</label>
          <label for="nim" class="label">Nim</label>
          <input type="text" name="nim" id="nim"  class="input" autocomplete="off" required placeholder="Masukkan Nim...">
          <label for="email" class="label">Email</label>
          <input type="email" class="input" name="email" id="email" autocomplete="off" placeholder="Masukkan Email..." required>
          <label for="jurusan" class="label">Jurusan</label>
         <div class="select is-fullwidth" id="jurusan">
          <select name="jurusan" id="jurusan">
            <option value="Teknik Informatika">Teknik Informatika</option>
            <option value="Sistem Informasi">Sistem Informasi</option>
            <option value="Teknologi Informasi">Teknologi Informasi</option>
            <option value="Ilmu Komputer">Ilmu Komputer</option>
            <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
          </select>
         </div>
          <label for="kelas" class="label">Kelas</label>
          <div class="select is-fullwidth" id="kelas">
          <select name="kelas" id="kelas">
            <option value="Pagi">Pagi</option>
            <option value="Malam">Malam</option>
          </select>
          </div>
          <br>
          <button type="submit" name="create" class=" button is-fullwidth is-hoverable mt-2 is-primary">Create</button>
        </form>
      </div>                                 
  </div>
</body>
</html>