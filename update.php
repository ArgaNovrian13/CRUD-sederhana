<?php
require 'koneksi.php';
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id = '$id'");
    $row = mysqli_fetch_array($query);
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      if(isset($_POST['update'])){
        $nama = htmlspecialchars($_POST['nama_lengkap']);
        $tglLahir = htmlspecialchars($_POST['tgl_lahir']);
        $jenisKelamin = htmlspecialchars($_POST['jenis_kelamin']);
        $nim = htmlspecialchars($_POST['nim']);
        $email = htmlspecialchars($_POST['email']);
        $jurusan = htmlspecialchars($_POST['jurusan']);
        $kelas = htmlspecialchars($_POST['kelas']);
    
        $sql = mysqli_query($koneksi,"UPDATE mahasiswa SET nama_lengkap = '$nama', tgl_lahir = '$tglLahir', jenis_kelamin = '$jenisKelamin',nim = '$nim',email = '$email',jurusan = '$jurusan',kelas = '$kelas' WHERE id = '$id'");
        if($sql){
          echo "
          <script>
            alert('Data Berhasilh Diupdate');
            document.location.href = 'index.php';
          </script>
          ";
        }else {
          echo "
          <script>
            alert('Data Gagal Diupdate');
            document.location.href = 'update.php';
          </script>
          ";
        }
      }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
  <!-- Link Bulma -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
  <!-- Link Eksternal CSS -->
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container is half">
  <div>
    <h2 class="is-size-3 has-text-centered" id="judulUpdate">Update Data</h2>
  </div>
  <div id="formUpdate">
    <form action="" method="POST">
      <input type="hidden" name="id" value="<?= $row['id'] ?>">
      <label for="nama_lengkap" class="label">Nama Lengkap</label>
      <input type="text"  class="input is-bordered" name="nama_lengkap"  id="nama_lengkap" value="<?= $row['nama_lengkap']?>">
      <label for="nama_lengkap" class="label is-bordered">Tanggal Lahir</label>
      <input type="date" class="input is-bordered" name="tgl_lahir" id="tgl_lahir" value="<?= $row['tgl_lahir'] ?>">
      <label for="nama_lengkap" class="label">Jenis Kelamin</label>
      <input type="radio" name="jenis_kelamin" value="Laki-Laki" <?php if($row['jenis_kelamin'] == 'Laki-Laki') echo 'checked'; ?>>
      <label for="laki-laki" class="radio">Laki-Laki</label>
      <input type="radio" name="jenis_kelamin" value="Perempuan" <?php if($row['jenis_kelamin'] == 'Perempuan') echo 'checked'; ?>>
      <label for="perempuan" class="radio">Perempuan</label>
      <label for="nim" class="label">NIM</label>
      <input type="text" class="input is-bordered" name="nim" id="nim" value="<?= $row["nim"] ?>">
      <label for="email" class="label">Email</label>
      <input type="email" name="email" class="input is-bordered" id="email" value="<?= $row["email"] ?>">
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
      <input type="text" name="kelas"  class="input is-bordered" id="kelas" value="<?= $row["kelas"] ?>">
      <button type="submit" class="button is-fullwidth is-hoverable mt-2 is-warning is-size-5 " name="update">Update</button>
    </form>
  </div>
  </div>
</body>
</html>
