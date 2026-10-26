<?php 

    // Menentukan konfigurasi koneksi ke database
    $servername = 'localhost';  // Nama host database +-
    $password = '';           // Password database 
    $username = 'root';       // Username database 
    $database = 'latihan'; // Nama database yang digunakan


    // Membuat koneksi ke database menggunakan MySQLi
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Mengecek apakah koneksi berhasil atau tidak
    // if(!$conn) {
    //     die("Koneksi Gagal:". mysqli_connect_error()); 
    // }

    // echo "Koneksi Berhasil"; // Jika koneksi berhasil, tampilkan pesan ini
    // mysqli_close($conn);

?>