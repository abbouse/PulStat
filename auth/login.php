<?php
session_start();
ob_start();
require '../config/config.php';
?>
<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1.0" name="viewport"><title>Kirish</title><meta name="robots" content="noindex, nofollow"><meta content="" name="description"><meta content="" name="keywords"><link href="assets/img/favicon.png" rel="icon"><link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"><link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"><link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"><link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet"><link href="/assets/css/style.css" rel="stylesheet"></head><body><main><div class="container"><section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4"><div class="container"><div class="row justify-content-center">
<div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
<?php
if (isset($_COOKIE['user_id'])) {
  header("location: /index.php");
}

if (isset($_POST['submit'])) {
  if (empty($_POST['username']) or empty($_POST['password'])) {
    echo '<div class="alert alert-danger" role="alert">Iltimos barcha maydonlarni to\'ldiring!</div>';
    // header('location:../index.php');
  } else {
    $email = $_POST['username'];
    $password = $_POST['password'];
    $sql = $conn->prepare("SELECT * FROM `users` WHERE `email` = ?");
    $sql->bindParam(1, $email, PDO::PARAM_STR);
    $sql->execute();
    $login = $sql->fetch();
    $psw = md5(md5($password));
    if ($login != null) {
      if ($psw == $login['password']) {
        setcookie('user_id', $login['user_id'], time() + 86400, "/");
        // echo '<div class="alert alert-success" role="alert">Your account has been verified successfully.</div>';
        header('location: /index.php');
      } else {
        echo '<div class="alert alert-danger" role="alert">Kirish muvaffaqiyatsiz!</div>';
      }
    }
  }
}
?>
<div class="d-flex justify-content-center py-4"> <a href="index.html" class="logo d-flex align-items-center w-auto"> <i class="bi bi-shield-check" style="font-size:50px;"></i> <span class="d-none d-lg-block" style="margin-left:10px;">PulStat</span> </a></div><div class="card mb-3"><div class="card-body"><div class="pt-1 pb-2"><h5 class="card-title text-center pb-0 fs-4">Profilga kirish</h5></div><form action="" method="post" class="row g-3 needs-validation" novalidate><div class="col-12"> <label for="yourUsername" class="form-label">E-mail kiriting</label><div class="input-group has-validation"><input type="text" name="username" class="form-control" id="yourUsername" required><div class="invalid-feedback">Iltimos e-mailni kiriting!</div></div></div><div class="col-12"> <label for="yourPassword" class="form-label">Parol</label> <input type="password" name="password" class="form-control" id="yourPassword" required><div class="invalid-feedback">Iltimos parolni kiriting!</div></div><div class="col-12"><div class="form-check"> <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe"> <label class="form-check-label" for="rememberMe">Parolni eslab qolish</label></div></div><div class="col-12"> <button name="submit" class="btn btn-primary w-100" type="submit"> PROFILGA KIRISH </button></div><div class="col-12"><p class="small mb-0">Sizda profil yo'qmi? <a href="/auth/register.php">Yangi profil yaratish</a></p></div></form></div></div><div class="credits">Made with ❤ | ️<a href="https://t.me/trdvab">Abbos Turdaliev</a></div></div></div></div></section></div></main> <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a></body></html>