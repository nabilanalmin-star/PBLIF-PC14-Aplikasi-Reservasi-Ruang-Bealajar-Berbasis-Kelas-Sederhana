<?php
session_start();
include 'conn\config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $username = mysqli_real_escape_string($koneksi, $username);
    $password = mysqli_real_escape_string($koneksi, $password);

    $query = "SELECT * FROM pengguna WHERE nim = '$username' AND PASSWORD = '$password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) === 1) {
    $user = mysqli_fetch_assoc($result);
    $_SESSION['nama']     = $user['nama'];   
    $_SESSION['username'] = $user['nim'];
    $_SESSION['level']    = $user['level_user'];
    $_SESSION['id_pengguna']    = $user['id_pengguna'];
        header("Location: dashboard.php");
        exit;
    } else {
        echo "<script>
        alert('Username atau Password salah!');
        window.location.href = 'loginform.php';
        </script>";
    }
} else {
    header("Location: loginform.php");
    exit;
}
?>