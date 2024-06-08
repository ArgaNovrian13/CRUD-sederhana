<?php
require 'read.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Read Data</title>
  <!-- Link Bulma -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
</head>
<body>
  <div class="container is-widescreen">
    <div id="judul">
      <h2 class="mt-5 is-size-3 has-text-centered is-uppercase has-text-success ">Read Data Mahasiswa</h2>
    </div>
    <div id="tambahData">
      <button class="p-3 button is-link ">
        <a href="create.php" class="has-text-light has-text-weight-bold ">Tambah Data Mahasiswa</a>
      </button>
    </div>
<div class="table-container ">
    <table class="table is-bordered is-striped mt-4 has-text-centered">
      <thead class="has-background-success">
        <tr>
          <th >No</th>
          <th>Nama Lengkap</th>
          <th>Tanggal Lahir</th>
          <th>Jenis Kelamin</th>
          <th>Nim</th>
          <th>Email</th>
          <th>Jurusan</th>
          <th>Kelas</th>
          <th>Aksi</th>
        </tr>
      </thead>
        <tbody>
        <?php $i = 1 ?>
        <?php foreach( $hasilData as $data ):?>
          <tr>
          <td><?= $i++ ?></td>
          <td><?= htmlspecialchars($data["nama_lengkap"]); ?></td>
          <td><?= htmlspecialchars($data["tgl_lahir"]); ?></td>
          <td><?= htmlspecialchars($data["jenis_kelamin"]) ?></td>
          <td><?= htmlspecialchars($data["nim"]) ?></td>
          <td><?= htmlspecialchars($data["email"]) ?></td>
          <td><?= htmlspecialchars($data["jurusan"]) ?></td>
          <td><?= htmlspecialchars($data["kelas"]) ?></td>
          <td >
            <button class="button is-small is-warning is-rounded mb-2  is-hoverable ">
              <a href="update.php?id=<?=$data['id'];?>" class="has-text-weight-bold has-text-dark">Ubah</a>
            </button>
            <button class="button is-small is-danger is-rounded text-is-white is-hoverable">
              <a href="delete.php?id=<?=$data['id']?>" class="has-text-weight-bold has-text-white" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
            </button>
          </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    </div>
    <footer>
      <p class="has-text-centered mt-6">Copyright &copy; <?= date('Y');?></p>
    </footer>
  </div>
</body>
</html>