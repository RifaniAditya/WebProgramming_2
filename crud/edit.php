<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>CRUD Dalam PHP</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
<body background="edit.jpg">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">Update</a>
      <button class="navbar-toggler" type="button" data_user-toggle="collapse" data_usertarget="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
  <div class="container" style="margin-top:20px">
    <h2>Edit User</h2>
    
    <hr>
    
    <?php
    //jika sudah mendapatkan parameter GET id dari URL
    if(isset($_GET['id'])){
      //membuat variabel $id untuk menyimpan id dari GET id di URL
      $id = $_GET['id'];
      
      //query ke database SELECT tabel mahasiswa berdasarkan id = $id
      $select = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id='$id'") or die(mysqli_error($koneksi));
      
      //jika hasil query = 0 maka muncul pesan error
      if(mysqli_num_rows($select) == 0){
        echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
        exit();
      //jika hasil query > 0
      }else{
        //membuat variabel $data dan menyimpan data row dari query
        $data = mysqli_fetch_assoc($select);
      }
    }
    ?>
    
    <?php
    //jika tombol simpan di tekan/klik
    if(isset($_POST['submit'])){
      $nama        = $_POST['nama'];
      $username    = $_POST['username'];
      $password    = $_POST['password'];
      $email       = $_POST['email'];

      
      $sql = mysqli_query($koneksi, "UPDATE mahasiswa SET nama='$nama', username='$username', password='$password', email='$email' WHERE id='$id'") or die(mysqli_error($koneksi));
      
      if($sql){
        echo '<script>alert("Berhasil mengubah data."); document.location="index.php?id='.$id.'";</script>';
      }else{
        echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
      }
    }
    ?>
    
    <form action="edit.php?id=<?php echo $id; ?>" method="post">
      <div class="form-group ">
        <label class="col-sm-2 col-form-label">NAMA</label>
        <div class="col-sm-15">
          <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 col-form-label">USERNAME</label>
        <div class="col-sm-15">
          <input type="text" name="username" class="form-control" value="<?php echo $data['username']; ?>" required>
        </div>
      </div>
      <div class="form-group ">
        <label class="col-sm-2 col-form-label">PASSWORD</label>
        <div class="col-sm-15">
          <input type="password" name="password" class="form-control" value="<?php echo $data['password']; ?>" required>
        </div>
      </div>
      <div class="form-group ">
        <label class="col-sm-2 col-form-label">EMAIL</label>
        <div class="col-sm-15">
          <input type="text" name="email" class="form-control" value="<?php echo $data['email']; ?>" required>
        </div>
      </div>
      <div class="form-group ">
        <label class="col-sm-2 col-form-label">&nbsp;</label>
        <div class="col-sm-15">
          <input type="submit" name="submit" class="btn btn-light" value="SIMPAN">
          <a href="index.php" class="btn btn-dark">KEMBALI</a>
        </div>
      </div>
    </form>
    
  </div>
  

</body>
</html>