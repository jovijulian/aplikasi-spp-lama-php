<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah SPP</title>
</head>
<body>
    <!-- Panggil header -->
    <?php require("header.php"); ?>
    <!-- Konten -->
    <center><h3 class="btn btn-dark mt-5">Tambah SPP</h3></center>
    <form action="" method="POST">
        <table cellpadding="5">
            <tr>
                <td>Tahun :</td>
                <td><input type="text" name="tahun" class="btn btn-outline-dark"></td>
            </tr>
            <tr>
                <td>Nominal :</td>
                <td><input type="text" name="nominal" class="btn btn-outline-dark mt-2" ></td>
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
if(isset($_POST['simpan'])){
    $tahun = $_POST['tahun'];
    $nominal = $_POST['nominal'];
    $simpan = mysqli_query($db, "INSERT INTO spp VALUES(NULL, '$tahun', '$nominal')");
        if($simpan){
            header("location: spp.php");
        }else{
            echo "<script>alert('Data sudah ada');</script>";
        }
}
?>