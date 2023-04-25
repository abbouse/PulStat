<?php
require "../config/config.php"; 
?>
<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta content="width=device-width, initial-scale=1.0" name="viewport"><title>A'zo bo'lish</title><meta name="robots" content="noindex, nofollow"><meta content="" name="description"><meta content="" name="keywords"><link href="assets/img/favicon.png" rel="icon"><link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"><link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"><link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"><link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet"><link href="/assets/css/style.css" rel="stylesheet"></head><body><main><div class="container"><section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4"><div class="container"><div class="row justify-content-center"><div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
    <?php
if (isset($_SESSION['username'])) {
    header("location: /index.php");
}


if (isset($_POST['submit'])) {


    if ($_POST['email'] == '' or $_POST['name'] == '' or $_POST['password'] == '') {
        echo "<script>alert('Please fill all the fields')</script>";
    } else {
        $email = $_POST['email'];
        $username = $_POST['name'];
        $password = md5(md5($_POST['password']));

        $insert = $conn->prepare("INSERT INTO users (email, name, password, reg_date) VALUES
             (:email, :username, :mypassword, :rega)");

        $insert->execute([
            ':email' => $email,
            ':username' => $username,
            ':mypassword' => $password,
            ':rega' => date('Y-m-d H:i:s')
        ]);
    }
    echo "<script>window.location.href = 'login.php';</script>";
    //header("location: login.php");

}
?>
<div class="d-flex justify-content-center py-4"> <a href="index.html" class="logo d-flex align-items-center w-auto"> <i class="bi bi-shield-check" style="font-size:50px;"></i> <span class="d-none d-lg-block" style="margin-left:10px;">PulStat</span> </a></div><div class="card mb-3"><div class="card-body"><div class="pt-1 pb-2"><h5 class="card-title text-center pb-0 fs-4">Profil yaratish</h5></div><form action="" method="post" class="row g-3 needs-validation" novalidate><div class="col-12"> <label for="yourName" class="form-label">Sizni nima deb chaqiraylik?</label> <input type="text" name="name" class="form-control" id="yourName" required><div class="invalid-feedback">Iltimos ismingiz yoki laqabingizni yozing!</div></div><div class="col-12"> <label for="yourEmail" class="form-label">Sizning e-mail</label> <input type="email" name="email" class="form-control" id="yourEmail" required><div class="invalid-feedback">Iltimos e-mail ma'lumotlaringizni kiriting!</div></div><div class="col-12"> <label for="yourPassword" class="form-label">Parol</label> <input type="password" name="password" class="form-control" id="yourPassword" required><div class="invalid-feedback">Parol kiritmadingiz!</div></div><div class="col-12"> <button name="submit" class="btn btn-primary w-100" type="submit"> DAVOM ETISH </button></div></form></div></div><div class="credits">Made with ❤ | ️<a href="https://t.me/trdvab">Abbos Turdaliev</a></div></div></div></div></section></div></main> <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script></body></html>