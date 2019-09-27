<?php
//memasukkan file config.php
include('koneksi.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
	<style type="text/css">		
	</style>
	<title></title>
	
</head>
<body >
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container"style="background: #F7F7F7 ;">
			<a> <h2><font color=black>Crud sederhana</color></h2> </a>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">	
				</ul>
			</div>
		</div>
	</nav>
	<div class="container text-left" style="margin-top:22px">
		<h2>Semua Data</h2>
		 <a href="tambah.php" class="btn btn-dark btn-xs">Tambah data</a>
		<hr>

		<table class="table table-striped table-hover table-sm table-bordered">
			<thead class="table-secondary">
				<tr>
					<th>NO.</th>
					<th>Nama</th>
					<th>Username</th>
					<th>Password</th>
					<th>Email</th>
					<th>Opsi</th> 
				</tr>
			</thead>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY id DESC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$data['nama'].'</td>
							<td>'.$data['username'].'</td>
							<td>'.$data['password'].'</td>
							<td>'.$data['email'].'</td>
							<td>
								<a href="edit.php?id='.$data['id'].'" class="badge badge-dark">Edit</a>
								<a href="delete.php?id='.$data['id'].'" class="badge badge-dark" onclick="return confirm(\'hapus data?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
		
	</div>
</body>
</html>