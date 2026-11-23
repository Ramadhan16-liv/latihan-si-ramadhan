
<?php 
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include '../config/koneksi.php';

// Mengambil data dari tabel kategori
$kategori = "SELECT * FROM kategori";

// Menjalankan query
$tampilkategori = mysqli_query($conn, $kategori);

// Mengecek query
if (!$tampilkategori) {
    die("Query gagal: " . mysqli_error($conn));
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
      <li><a href="Dashboard.php">Dashboard</a></li>
      <li><a href="kategori.php">Kategori</a></li>
      <li><a href="#">User</a></li>
      <li><a href="berita.php">Berita</a></li>
      <li><a href="#">Galeri</a></li>
      <li><a href="logout.php" class="logout">Logout</a></li>
    </ul>
  </div>

  <div class="main-content">
    <header>
      <h1>Data Kategori</h1>
      <P>Kelola data kategori berita di sini.</p>

      <a href="tambahkategori.php" class="btn-tambah">
        + Tambah Kategori
      </a>
    </header>

    <section class="cards">
      <div class="card">

        <table>
          <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Detail</th>
          </tr>

          <?php
          $no = 1;

          while ($row = mysqli_fetch_assoc($tampilkategori)) {
          ?>

          <tr>
            <td><?= $no++; ?></td>

            <td>
              <?= htmlspecialchars($row['nama_kategori']); ?>
            </td>

            <td>
              <a href="editkategori.php?id=<?= $row['id_kategori']; ?>">
                EDIT
              </a>

              <a href="hapuskategori.php?id=<?= $row['id_kategori']; ?>"
                 onclick="return confirm('Yakin ingin menghapus data ini?')">
                HAPUS
              </a>
            </td>
          </tr>

          <?php } ?>

        </table>

      </div>
    </section>
  </div>

</body>
</html>
