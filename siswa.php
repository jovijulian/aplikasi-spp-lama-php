<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html>

<head>
	<title>Simple CRUD Application in PHP & MySQL - Read</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
<?php require_once("header.php"); ?>
    
<div class="container">
    <center><h1 class="mt-5">Tabel Siswa</h1></center></br>
    <p class="btn btn-info"><a href="tambah_siswa.php" class="text-light">+ Tambah Data</a></p>
	<div class="row">
		<table class="table table-striped bg-dark mt-2 text-light"border="1">
            <thead>
			<tr>
                <td class="text-center" scope="col">No. </td>
                <td scope="col">NISN</td>
                <td scope="col">NIS</td>
                <td scope="col">Nama Siswa</td>
                <td scope="col">Kelas</td>
                <td scope="col">Alamat</td>
                <td scope="col">No. Telp</td>
                <td class="text-center" scope="col">Aksi</td>
			</tr>
        </thead>

<?php
$totalDataHalaman = 5;
$data = mysqli_query($db, "SELECT * FROM siswa");
$hitung = mysqli_num_rows($data);
$totalHalaman = ceil($hitung / $totalDataHalaman);
$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$dataAwal = ($totalDataHalaman * $halAktif) - $totalDataHalaman;

$sql = mysqli_query($db, "SELECT * FROM siswa
JOIN kelas ON siswa.id_kelas = kelas.id_kelas
ORDER BY nama LIMIT $dataAwal, $totalDataHalaman ");
$no = 1;
while($r = mysqli_fetch_assoc($sql)){ ?>
        <tr>
            <td class="text-center"><?= $no ?></td>
            <td><?= $r['nisn']; ?></td>
            <td><?= $r['nis']; ?></td>
            <td><?= $r['nama']; ?></td>
            <td><?= $r['nama_kelas'] . " | " . $r['kompetensi_keahlian']; ?></td>
            <td><?= $r['alamat']; ?></td>
            <td><?= $r['no_telp']; ?></td>
            <td class="text-center"><a href="?hapus&nisn=<?= $r['nisn']; ?>">Hapus</a> | 
                <a href="edit_siswa.php?nisn=<?= $r['nisn']; ?>">Edit</a</td>
        </tr>
        
<?php $no++; } ?>
    </table>

<!-- Tampilkan tombol halaman -->
<?php for($i=1; $i <= $totalHalaman; $i++): ?>
        <a href="?hal=<?= $i; ?>"><?= $i; ?></a>
<?php endfor; ?>

<!-- delete -->
<?php
if(isset($_GET['hapus'])){
    $nisn = $_GET['nisn'];
    $hapus = mysqli_query($db, "DELETE FROM siswa WHERE nisn='$nisn'");
    if($hapus){
        header("location: siswa.php");
    }else{
        echo "<script>alert('Maaf, data tersebut masih terhubung dengan data yang lain');
        </script>";
    }
}
?>

<!-- Selesai -->
    <hr />
		</table>
	</div>
</div>
 <?php require_once("footer.php"); ?> 



<!--===============================================================================================-->	
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
</body>
</html>
