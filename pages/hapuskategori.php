<?php 
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include '../config/koneksi.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "DELETE FROM kategori WHERE id_kategori = '$id'";
    if(mysqli_query($conn, $query)){
       echo "<script>
        alert('Kategori Berhasil dihapus');
        window.location.href='kategori.php';
       </script>";
    } else {
         echo "<script>
            alert('Kategori Gagal dihapus');
            window.location.href='kategori.php';
        </script>";
    }
} else {
     echo "<script>
        alert('ID Kategori Tidak ditemukan');
        window.location.href='kategori.php';
       </script>";
}
?>