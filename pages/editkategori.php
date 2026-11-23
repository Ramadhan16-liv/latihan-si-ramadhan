<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include '../config/koneksi.php';

if(isset($_GET['id'])){
    $id_kategori = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM kategori WHERE id_kategori = '$id_kategori'");
    $data = mysqli_fetch_assoc($result);
} else {
    echo "<script>alert('ID Kategori tidak ditemukan')</script>";
}

?>


<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="../assets/admin/adminStyles.css">
</head>
<body>

  <div class="sidebar">
    <h2>Admin Panel</h2>
    <ul>
      <li><a href="#">Dashboard</a></li>
      <li><a href="kategori.php">Kategori</a></li>
      <li><a href="berita.php">Berita</a></li>
      <li><a href="#">Galeri</a></li>
      <li><a href="logout.php" class="logout">Logout</a></li>
    </ul>
  </div>

  <div class="main-content">
    <header>
       
    </header>

    <section class="cards">
        <form action="" method="post">
            <label for="">Nama Kategori</label>
            <br>
            <input type="text" name="nama_kategori" value="<?= $data['nama_kategori'] ?>">
            <br>
            <br>
            <button type="submit" name="submit">Update</button>
        </form>
    </section>
  </div>

<?php 

if(isset($_POST['submit'])){
    $nama_kategori = $_POST['nama_kategori'];
   

    $query = "UPDATE kategori 
              SET nama_kategori = '$nama_kategori' 
              WHERE id_kategori = '$id_kategori'";
    if(mysqli_query($conn, $query)) {
        header("Location: kategori.php");
        exit();
    } else {
        echo "Gagal Insert Data ". mysqli_error($conn);
    }
}

?>
</body>
</html>