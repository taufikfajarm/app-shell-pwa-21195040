<?php 
session_start();

include '../koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($koneksi, "select * from user where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);

if($cek>0){
    $data = mysqli_fetch_assoc($login);

    if($data['level']=="admin"){
        
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['level'] = "admin";
        header("location:tables-data.php");

    } else if($data['level']=="marketing eksekutif"){
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "marketing eksekutif";
        header("location:staff/halaman_marketing.php");

    } else if($data['level']=="pengawas lapangan") {
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "pengawas lapangan";
        header("location:staff/halaman_lapangan.php");

    } else {
        header("location:index.php?pesan=gagal");
    }
} else {
    header("location:index.php?pesan=gagal");
    echo "gagal login";
}

?>