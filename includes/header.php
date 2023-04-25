<?php
 ob_start();
function bc($title){
    return '<div class="pagetitle">
      <h1>'.$title.'</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Bosh sahifa</a></li>
          <li class="breadcrumb-item">Modullar</li>
          <li class="breadcrumb-item active">'.$title.'</li>
        </ol>
      </nav>
    </div>';
}
$user = $conn->prepare("SELECT * FROM users WHERE user_id = $user_id");
$user->execute();
$user = $user->fetch();
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PulStat - Sizning yordamchingiz</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="/" class="logo d-flex align-items-center">
        <i class="bi bi-shield-check" style="font-size:26px;"></i> 
        <span class="d-none d-lg-block" style="margin-left:5px;">PulStat</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="/assets/img/<?php echo $user['photo'];?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $user['name'];
            ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
                <h6><?php echo $user['name'];?></h6>
              <span><?php if ($user['rights'] < '1') echo 'Foydalanuvchi'; else echo 'Sayt yaratuvchisi';
              ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="/modules/profile.php">
                <i class="bi bi-person"></i>
                <span>Mening profilim</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="/modules/profile.php">
                <i class="bi bi-gear"></i>
                <span>Profil sozlamalari</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="/auth/logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Chiqish</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
<li class="nav-heading">SAHIFALAR</li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="/?">
          <i class="bi bi-grid"></i>
          <span>Bosh sahifa</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="/modules/allExpenses.php">
          <i class="bi bi-bar-chart"></i>
          <span>Barcha harajatlar</span>
        </a>
      </li><!-- End Profile Page Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="/modules/statExpenses.php">
          <i class="bi bi-card-list"></i>
          <span>Hisobotlar</span>
        </a>
      </li><!-- End Register Page Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" href="/contact.php">
          <i class="bi bi-envelope"></i>
          <span>Bog'lanish</span>
        </a>
      </li><!-- End Contact Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">