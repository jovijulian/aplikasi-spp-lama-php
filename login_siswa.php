<?php
session_start();
require_once("koneksi.php");
if(isset($_SESSION['nisn'])){
    header("location: index_siswa.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
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

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>
				<form class="login100-form validate-form" action="" method="POST">
					<span class="login100-form-title">
						Login
					</span>
                    <?php
// Kita akan membuat proses login nya disini
if(isset($_POST['login'])){
    $nisn = $_POST['nisn'];
    $cari = mysqli_query($db, "SELECT * FROM siswa WHERE nisn='$nisn'");
    $hasil = mysqli_fetch_assoc($cari);
        // Jika data yang dicari kosong
        if(mysqli_num_rows($cari) == 0){
            echo "<td colspan='2'><center>NISN belum terdaftar!</center></td>";
        }else{
        // Jika nisn siswa sesuai dengan database maka akan redirect ke halaman utama dan akan dibuatkan sesi
            $_SESSION['nisn'] = $_POST['nisn'];
            header("location: index_siswa.php");
        }
}
?>
					<div class="wrap-input100 validate-input" data-validate = "NISN is required">
						<input class="input100" type="text" name="nisn" placeholder="NISN">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Apakah anda seorang petugas? 
						</span>
						<a class="txt2" href="login_petugas.php">
							Disini
						</a>
                    </div>			
                </form>

			</div>
		</div>
	</div>
	
	

	
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