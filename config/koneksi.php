<?php

$servername = "localhost";
$database = "latihan";
$username = "root";
$password = "";

// membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);

// cek koneksi
if(!$conn){
    die("Koneksi Gagal:". mysqli_connect_error());
}



?>