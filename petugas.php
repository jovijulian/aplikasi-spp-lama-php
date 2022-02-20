<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD Data Kelas</title>
</head>
<body>
    <!-- Panggil script header -->
    <?php require_once("header.php"); ?>
    <!-- Isi Konten -->
<div class="container">
    <center><h1 class="mt-5">Petugas</h1></center>
    <p class="ml-2 mt-2"><button type="button" class="btn btn-info"><a href="tambah_petugas.php" class="text-light">+ Tambah Data</a></button></p>
    <table class="table table-striped bg-dark mt-2 text-light" border="1">
  <thead>
    <tr>
      <td class="text-center" scope="col">No. </td>
      <td scope="col">Username</td>
      <td scope="col">Password</td>
      <td scope="col">Nama Petugas</td>
      <td scope="col">Level</td>
      <td class="text-center" scope="col">Aksi</td>
    </tr>
  </thead>
<?php
// Kita buat konfigurasi pagging
$jmlhDataHal = 5;
$data = mysqli_query($db, "SELECT * FROM petugas");
$jmlhData = mysqli_num_rows($data);
$jmlhHal = ceil($jmlhData / $jmlhDataHal);
$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$dataAwal = ($jmlhData * $halAktif) - $jmlhData;
// Konfigurasi Selesai
// Kita panggil tabel petugas
$sql = mysqli_query($db, "SELECT * FROM petugas LIMIT $dataAwal, $jmlhDataHal");
$no = 1;
while($r = mysqli_fetch_assoc($sql)){ ?>
        <tr>
            <td class="text-center"><?= $no ?></td>
            <td><?= $r['username']; ?></td>
            <td><?= $r['password']; ?></td>
            <td><?= $r['nama_petugas']; ?></td>
            <td><?= $r['level']; ?></td>
            <td class="text-light text-center"><a href="?hapus&id=<?= $r['id_petugas']; ?>">Hapus</a> | 
                <a href="edit_petugas.php?id=<?= $r['id_petugas']; ?>">Edit</a</td>
        </tr>
<?php $no++; } ?>
    </table>
<!-- Sekarang kita buat tombol halamannya -->
<?php for($i=1; $i <= $jmlhHal; $i++): ?>
        <a href="?hal=<?= $i; ?>"><?= $i; ?></a>
<?php endfor; ?>
<!-- Selesai -->
    <hr />
    <?php require_once("footer.php"); ?>
</body>
</html>
<?php
// Tombol Hapus ditekan
if(isset($_GET['hapus'])){
    $id = $_GET['id'];
    $hapus = mysqli_query($db, "DELETE FROM petugas WHERE id_petugas='$id'");
    if($hapus){
        header("location: petugas.php");
    }else{
        echo "<script>alert('Maaf, data tersebut masih terhubung dengan data yang lain');
        </script>";
    }
}
?>