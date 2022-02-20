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
        <center>
            <h1 class="mt-5">Kelas</h1>
        </center>
        <p><a href="/kelas/tambah_kelas.php" class="btn btn-info ml-2">+ Tambah Data</a></p>
        <table class="table table-striped bg-dark mt-2 text-light" border="1">
            <thead>
                <tr>
                    <td class="text-center" scope="col">No. </td>
                    <td scope="col">Nama Kelas</td>
                    <td scope="col">Kompetensi Keahlian</td>
                    <td class="text-center" scope="col">Aksi</td>
                </tr>
            </thead>
            <?php
            // Kita Konfigurasi Pagging disini
            $totalDataHalaman = 5;
            $data = mysqli_query($db, "SELECT * FROM kelas");
            $hitung = mysqli_num_rows($data);
            $totalHalaman = ceil($hitung / $totalDataHalaman);
            $halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
            $dataAwal = ($totalDataHalaman * $halAktif) - $totalDataHalaman;
            // Konfigurasi Selesai
            // Kita panggil tabel kelas
            $sql = mysqli_query($db, "SELECT * FROM kelas ORDER BY nama_kelas LIMIT $dataAwal, $totalDataHalaman");
            $no = 1;
            while ($r = mysqli_fetch_assoc($sql)) { ?>
                <tr>
                    <td class="text-center"><?= $no ?></td>
                    <td><?= $r['nama_kelas']; ?></td>
                    <td><?= $r['kompetensi_keahlian']; ?></t0 d>
                    <td class="text-center"><a href="?hapus&id=<?= $r['id_kelas']; ?>">Hapus</a> |
                        <a href="kelas/edit_kelas.php?id=<?= $r['id_kelas']; ?>">Edit</a< /td>
                </tr>
            <?php $no++;
            } ?>
        </table>
        <!-- Tampilkan tombol halaman -->
        <?php for ($i = 1; $i <= $totalHalaman; $i++) : ?>
            <a href="?hal=<?= $i; ?>"><?= $i; ?></a>
        <?php endfor; ?>
        <!-- Selesai -->
        <hr />
        <?php require_once("footer.php"); ?>
</body>

</html>
<?php
// Tombol Hapus ditekan
if (isset($_GET['hapus'])) {
    $id = $_GET['id'];
    $hapus = mysqli_query($db, "DELETE FROM kelas WHERE id_kelas='$id'");
    if ($hapus) {
        header("location: kelas.php");
    } else {
        echo "<script>alert('Maaf, data tersebut masih terhubung dengan data yang lain');
        </script>";
    }
}
?>