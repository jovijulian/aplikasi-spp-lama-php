<?php
require_once("require.php");
$id = $_GET['id'];
$petugas = mysqli_query($db, "SELECT * FROM petugas WHERE id_petugas='$id'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit data Petugas</title>
</head>
<body>
    <!-- Panggil header -->
    <?php require("header.php"); ?>
    <!-- Konten -->
    <center><h3 class="btn btn-dark mt-5">Edit data Petugas</h3></center>
<?php
while($row = mysqli_fetch_assoc($petugas)){?>
    <form action="" method="POST">
        <table cellpadding="5">
            <input type="hidden" name="id" value="<?= $row['id_petugas']; ?>"class="btn btn-dark mt-5">
            <tr>
                <td>Username :</td>
                <td><input type="text" name="user" value="<?= $row['username']; ?>"class="btn btn-outline-dark mt-2"></td>
            </tr>
            <tr>
                <td>Password :</td>
                <td><input type="text" name="pass" value="<?= $row['password']; ?>"class="btn btn-outline-dark mt-2"></td>
            </tr>
            <tr>
                <td>Nama Petugas :</td>
                <td><input type="text" name="nama" value="<?= $row['nama_petugas']; ?>"class="btn btn-outline-dark mt-2"></td>
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
if(isset($_POST['simpan'])){
    $id = $_POST['id'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $nama = $_POST['nama'];
    $update = mysqli_query($db, "UPDATE petugas SET username='$user',
                                 password='$pass', nama_petugas='$nama'
                                 WHERE petugas.id_petugas='$id'");
        if($update){
            header("location: petugas.php");
        }else{
            echo "<script>alert('Gagal'); </script>";
        }
}
?>