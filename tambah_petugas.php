<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Petugas</title>
</head>
<body>
    <!-- Panggil header -->
    <?php require("header.php"); ?>
    </br>
    <!-- Konten -->
    <form action="" method="POST">
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container">
        <div class="row mb-3">
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Isi Data Petugas</h3>
              </div>
             
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="user" placeholder="Enter Username">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="pass" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label>Nama Petugas</label>
                    <input type="text" class="form-control" name="nama" placeholder="Enter Nama Petugas">
                  </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="simpan">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
    </form>
<hr />
            <!-- Panggil footer -->
    <?php require("footer.php"); ?>
</body>
</html>
<?php
// Proses Simpan
if(isset($_POST['simpan'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $nama = $_POST['nama'];
    $simpan = mysqli_query($db, "INSERT INTO petugas VALUES(NULL, '$user', '$pass', '$nama', 'Petugas')");
        if($simpan){
            header("location: petugas.php");
        }else{
            echo "<script>alert('Data sudah ada');</script>";
        }
}
?>


</section>