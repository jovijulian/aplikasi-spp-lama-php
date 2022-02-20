<?php
require_once("require.php");
$id = $_GET['id'];
$kelas = mysqli_query($db, "SELECT * FROM kelas WHERE id_kelas='$id'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit data Kelas</title>
</head>

<body>
    <!-- Panggil header -->
    <?php require("header.php"); ?>
    <!-- Konten -->
    <center>
        <h3 class="btn btn-dark mt-5">Edit data Kelas</h3>
    </center>
    <?php
    while ($row = mysqli_fetch_assoc($kelas)) { ?>
        <form action="" method="POST">
            <table cellpadding="5">
                <input type="hidden" name="id" value="<?= $row['id_kelas']; ?>">
                <tr>
                    <td>Nama Kelas :</td>
                    <td><input type="text" name="nama" value="<?= $row['nama_kelas']; ?>" class="btn btn-outline-dark mt-2"></td>
                </tr>
                <tr>
                    <td>Kompetensi Keahlian :</td>
                    <td><input type="text" name="kk" value="<?= $row['kompetensi_keahlian']; ?>" class="btn btn-outline-dark mt-2"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" name="simpan" class="btn btn-primary mt-2">Simpan</button></td>
                </tr>
            </table>
        </form>
    <?php } ?>
    <hr />
    <!-- Panggil footer -->
    <?php require("footer.php"); ?>
</body>

</html>
<?php
// Proses update
if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kk = $_POST['kk'];
    $update = mysqli_query($db, "UPDATE kelas SET nama_kelas='$nama', kompetensi_keahlian='$kk'
                                 WHERE kelas.id_kelas='$id'");
    if ($update) {
        header("location: kelas.php");
    } else {
        echo "<script>alert('Gagal'); </script>";
    }
}
?>