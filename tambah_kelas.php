<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah Kelas</title>
</head>

<body>
    <!-- Panggil header -->
    <?php require("header.php"); ?>
    <!-- Konten -->
    <center>
        <h3 class="btn btn-dark mt-5">Tambah Kelas</h3>
    </center>
    <form action="" method="POST">
        <table cellpadding="5">
            <tr>
                <td>Nama Kelas :</td>
                <td><input type="text" name="nama" class="btn btn-outline-dark"></td>
            </tr>
            <tr>
                <td>Kompetensi Keahlian :</td>
                <td><input type="text" name="kk" class="btn btn-outline-dark mt-2"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="simpan" class="btn btn-primary mt-2">Simpan</button></td>
            </tr>
        </table>
    </form>
    <hr />
    <!-- Panggil footer -->
    <?php require("footer.php"); ?>
</body>

</html>
<?php
// Proses Simpan
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $kk = $_POST['kk'];
    $simpan = mysqli_query($db, "INSERT INTO kelas VALUES(NULL, '$nama', '$kk')");
    if ($simpan) {
        header("location: kelas.php");
    } else {
        echo "<script>alert('Data sudah ada');</script>";
    }
}
?>