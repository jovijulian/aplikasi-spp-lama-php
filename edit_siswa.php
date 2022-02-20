<?php
require_once("require.php");
$nisnSiswa = $_GET['nisn'];
$siswa = mysqli_query($db, "SELECT * FROM siswa WHERE nisn='$nisnSiswa'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit data Siswa</title>
</head>
<body>
    <!-- Panggil header -->
    <?php require("header.php"); ?>
    <!-- Konten -->
    <center><h3 class="btn btn-dark mt-5">Edit data Siswa</h3></center>
<?php
while($row = mysqli_fetch_assoc($siswa)){?>
    <form action="" method="POST">
        <table cellpadding="5">
            <input type="hidden" name="nisn" value="<?= $row['nisn']; ?>">
            <tr>
                <td>Nama :</td>
                <td><input type="text" name="nama" value="<?= $row['nama']; ?>" class="btn btn-outline-dark mt-2"></td>
            </tr>
            <tr>
                <td>Kelas :</td>
                <td><select name="kelas" class="btn btn-outline-dark mt-2">
<?php
$kelas = mysqli_query($db, "SELECT * FROM kelas");
while($r = mysqli_fetch_assoc($kelas)){ ?>
                        <option value="<?= $r['id_kelas']; ?>"><?= $r['nama_kelas'] . " | " 
                    . $r['kompetensi_keahlian']; ?></option>
<?php } ?>          </select></td>
            </tr>
            <tr>
                <td>Alamat :</td>
                <td><input type="text" name="alamat" value="<?= $row['alamat']; ?>" class="btn btn-outline-dark mt-2"></td>
            </tr>
            <tr>
                <td>No. Telp :</td>
                <td><input type="tel" name="no" value="<?= $row['no_telp']; ?>"class="btn btn-outline-dark mt-2"></td>
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
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $no = $_POST['no'];
    $update = mysqli_query($db, "UPDATE siswa SET nama='$nama',
                                 id_kelas='$kelas', alamat='$alamat', no_telp='$no' 
                                 WHERE siswa.nisn='$nisn'");
        if($update){
            header("location: siswa.php");
        }else{
            echo "<script>alert('Gagal'); </script>";
        }
}
?>