<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD </title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" >
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">Tambah Data</a>
			<button class="navbar-toggler" type="button"  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
					</li
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="container" style="margin-top:20px">
		<h2><font color=black>Tambah User</color></h2>
		
		<hr>
		
		<?php
		if(isset($_POST['submit'])){
			$nama		= $_POST['nama'];
			$username	= $_POST['username'];
			$password	= $_POST['password'];
			$email		= $_POST['email'];
			
			$cek = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nama='$nama'") or die(mysqli_error($koneksi));
			
			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO mahasiswa(nama, username, password, email) VALUES('$nama', '$username', '$password', '$email')") or die(mysqli_error($koneksi));
				
				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal menambahkan data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, nama sudah ada.</div>';
			}

			if (empty(nama) || empty(username) || empty(password) || empty(email)) {
				echo "<strong> Data harus diisi </strong>";
			}else{
			}
		}

		?>
		
		<form action="tambah.php" method="post">
			<div class="form-group">
				<label class="col-sm-2 col-form-label">NAMA</label>
				<div class="col-sm-15">
					<input type="text" name="nama" onkeypress="return event.charCode <48 || event.charCode >57" class="form-control" size="4" placeholder="nama lengkap" prequired>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 col-form-label">USERNAME</label>
				<div class="col-sm-15">
					<input type="text" name="username" class="form-control" placeholder="username" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 col-form-label">PASSWORD</label>
				<div class="col-sm-15">
					<input type="password" name="password" class="form-control" placeholder="password" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 col-form-label">EMAIL</label>
				<div class="col-sm-15">
					<input type="text" name="email" class="form-control" placeholder="email" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-15">
					<input type="submit" name="submit" class="btn btn-light" value="SIMPAN" >
					<a href="index.php" class="btn btn-dark">KEMBALI</a>
				</div>
			</div>
		</form>
	</div>
</body>
</html>