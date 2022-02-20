<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD Data SPP</title>
</head>
<body>
    <!-- Panggil script header -->
    <?php require_once("header.php"); ?>
    <!-- Isi Konten -->
    <div class="container">
    <center><h1 class="mt-5">SPP</h1></center>
    <p><a href="tambah_spp.php" class="btn btn-info ml-2">+ Tambah Data</a></p>
    <table class="table table-striped bg-dark mt-2 text-light"border="1">
        <thead>
        <tr>
            <td class="text-center" scope="col">No. </td>
            <td scope="col">Tahun</td>
            <td scope="col">Nominal</td>
            <td class="text-center" scope="col">Aksi</td>
        </tr>
    </thead>
<?php
// Kita Konfigurasi Pagging disini
$totalDataHalaman = 5;
$data = mysqli_query($db, "SELECT * FROM spp");
$hitung = mysqli_num_rows($data);
$totalHalaman = ceil($hitung / $totalDataHalaman);
$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$dataAwal = ($totalDataHalaman * $halAktif) - $totalDataHalaman;
// Konfigurasi Selesai
// Kita panggil tabel spp
$sql = mysqli_query($db, "SELECT * FROM spp ORDER BY tahun ASC LIMIT $dataAwal, $totalDataHalaman");
$no = 1;
while($r = mysqli_fetch_assoc($sql)){ ?>
        <tr>
            <td class="text-center"><?= $no ?></td>
            <td><?= $r['tahun']; ?></td>
            <td><?= "Rp. " . $r['nominal']; ?></td>
            <td class="text-center"><a href="?hapus&id=<?= $r['id_spp']; ?>">Hapus</a> | 
                <a href="edit_spp.php?id=<?= $r['id_spp']; ?>">Edit</a</td>
        </tr>
<?php $no++; } ?>
    </table>
<!-- Tampilkan tombol halaman -->
<?php for($i=1; $i <= $totalHalaman; $i++): ?>
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
    $hapus = mysqli_query($db, "DELETE FROM spp WHERE id_spp='$id'");
    if($hapus){
        header("location: spp.php");
    }else{
        echo "<script>alert('Maaf, data tersebut masih terhubung dengan data yang lain');
        </script>";
    }
}
?>