<?php 
session_start();
include '../config/koneksi.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman - Login</title>
</head>

<?php 
    if(isset($_POST['login'])){
        $input = $_POST['username'];
        $password = $_POST['password'];

        // cek apakah input berupa email atau username
        if(filter_var($input, FILTER_VALIDATE_EMAIL)) {
            $query = "SELECT * FROM users WHERE email = '$input'";
        } else {
            $query = "SELECT * FROM users WHERE username = '$input'";
        }
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) >0) {
            $row = mysqli_fetch_assoc($result);

            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['nama_lengkap'] = $row['nama_lengkap'];
                $_SESSION['username'] = $row['username'];

                // arahkan ke dashboard admin
                header("Location: Dashboard.php");
                exit();
            }
            else {
                echo "Password Salah";
            }
        }
        else {
            echo "username / Email tidak ditemukan";
        }
    }
?>

<body>
    <form action="" method="POST">
        <label for="">Username / Email</label><br>
        <input type="text" name="username" required><br><br>

        <label for="">password</label><br>
        <input type="password" name="password" required> <br> <br>

        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>