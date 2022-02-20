<?php
 require_once('require.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Siswa</title>
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

</head>
<body>
<?php require("header.php");?>
</br>
</br>
<div class="content-wrapper">
<form method="post">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Isi Data Siswa</h3>
              </div>
             
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label>NISN</label>
                    <input type="text" class="form-control" name="nisn" placeholder="Enter NISN">
                  </div>

                  <div class="form-group">
                    <label>NIS</label>
                    <input type="text" class="form-control" name="nis" placeholder="Enter NIS">
                  </div>

                  <div class="form-group">
                    <label>Nama Siswa</label>
                    <input type="text" class="form-control" name="nama" placeholder="Enter Nama Siswa">
                  </div>

                  <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Kelas</label>
                  <div class="col-sm-10">
                    <select name="kelas" class="form-control">
                    <?php
                    $kelas = mysqli_query($db, "SELECT * FROM kelas");
                    while($r = mysqli_fetch_assoc($kelas)){ ?>
                    <option value="<?= $r['id_kelas']; ?>"><?= $r['nama_kelas'] . " | ". $r['kompetensi_keahlian']; ?></option>
                    <?php } ?>      
                    </select></td>
                  </div>
                  </div>

                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="Enter Alamat">
                  </div>

                  <div class="form-group">
                    <label>No Handphone</label>
                    <input type="text" class="form-control" name="no" placeholder="Enter No. Handphone">
                  </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="simpan">Submit</button>
                </div>
              </form>
            </div>

</body>
</html>
<?php
// Proses Simpan
if(isset($_POST['simpan'])){
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $no = $_POST['no'];
    $simpan = mysqli_query($db, "INSERT INTO siswa VALUES
    ('$nisn', '$nis', '$nama', '$kelas', '$alamat', '$no')");
        if($simpan){
            header("location: siswa.php");
        }else{
            echo "<script>alert('Data sudah ada');</script>";
        }
}
?>