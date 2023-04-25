<?php
require('../config/config.php');
require('../includes/header.php');

echo bc("Hisobotlar");
$kun = isset($_GET['kun']) ? trim($_GET['kun']) : 'bugun';
$hafta = isset($_GET['hafta']) ? trim($_GET['hafta']) : 'joriy';
$oy = isset($_GET['oy']) ? trim($_GET['oy']) : 'joriy';
$yil = isset($_GET['yil']) ? trim($_GET['yil']) : 'joriy';

if ($kun == "kecha"){
    $kwhere = "`expensedate` = DATE_SUB(CURRENT_DATE(),INTERVAL 1 DAY)";
}else{
    $kun= "bugun";
    $kwhere = "`expensedate` = '".date("Y-m-d")."'";
}
    $kunn = $conn->query("SELECT SUM(`expense`) as `expense` FROM `expenses` WHERE `user_id` = $user_id AND $kwhere")->fetch();
    
//kun tugadi, hafta boshi
if ($hafta == "avvalgi"){
    $hafta = "avvalgi";
    $hwhere = "week(`expensedate`, 1) = week(now(), 1)-1";
}else{
    $hafta = "joriy";
    $hwhere = "week(`expensedate`, 1) = week(now(), 1)";
}
    $haftaa = $conn->query("SELECT SUM(`expense`) as `expense` FROM `expenses` WHERE `user_id` = $user_id AND $hwhere")->fetch();
    
//hafta ohiri, oy boshi
if ($oy == "avvalgi"){
    $oy = "avvalgi";
    $owhere = "month(`expensedate`) = month(now())-1";
}else{
    $oy = "joriy";
    $owhere = "month(`expensedate`) = month(now())";
}
    $oyy = $conn->query("SELECT SUM(`expense`) as `expense` FROM `expenses` WHERE `user_id` = $user_id AND $owhere")->fetch();
    
//oy ohiri, yil boshi
if ($yil == "avvalgi"){
    $yil = "avvalgi";
    $ywhere = "year(`expensedate`) = year(now())-1";
}else{
    $yil = "joriy";
    $ywhere = "year(`expensedate`) = year(now())";
}
    $yill = $conn->query("SELECT SUM(`expense`) as `expense` FROM `expenses` WHERE `user_id` = $user_id AND $ywhere")->fetch();
    
    
//<div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="bi bi-cart"></i></div>
echo '<section class="section dashboard">
<div class="row"><div class="col-lg-8"><div class="row">';
    
    echo '<div class="col-xxl-4 col-md-6"><div class="card info-card sales-card"><div class="filter"> <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a><ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"><li class="dropdown-header text-start"><h6>Filtrlash</h6></li><li><a class="dropdown-item" href="?kun=bugun">Bugun</a></li><li><a class="dropdown-item" href="?kun=kecha">Kecha</a></li></ul></div><div class="card-body"><h5 class="card-title">Kunlik<span> | '.$kun.'gi</span></h5><div class="d-flex align-items-center"><div class="ps-3"><h6>'.number_format($kunn['expense']).' SO\'M</h6>';
    if ($kunn['expense'] != 0){
    $k_top = $conn->query("SELECT * FROM `expenses` WHERE `user_id` = $user_id AND $kwhere ORDER BY `expense` DESC")->fetch();
    $k_t = ($kunn['expense']/100);
    $k_top_per = mb_substr($k_top['expense']/$k_t,0,4);
    echo '<span class="text-success small pt-1 fw-bold">'.$k_top_per.'%</span> <span class="text-muted small pt-2 ps-1">'.$k_top['expensecategory'].'</span>';
    }
    echo '</div></div><div class="d-grid gap-2 mt-3"> <a href="" class="btn btn-info">Batafsil</a></div></div></div></div>
    
    <div class="col-xxl-4 col-md-6"><div class="card info-card revenue-card"><div class="filter"> <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a><ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"><li class="dropdown-header text-start"><h6>Filtrlash</h6></li><li><a class="dropdown-item" href="?act=joriy">Joriy hafta</a></li><li><a class="dropdown-item" href="?hafta=avvalgi">Avvalgi hafta</a></li></ul></div><div class="card-body"><h5 class="card-title">Haftalik <span> | '.$hafta.' hafta</span></h5><div class="d-flex align-items-center"><div class="ps-3"><h6>'.number_format($haftaa['expense']).' SO\'M</h6>';
    if ($haftaa['expense'] != 0){
    $h_top = $conn->query("SELECT * FROM `expenses` WHERE `user_id` = $user_id AND $hwhere ORDER BY `expense` DESC")->fetch();
    $h_t = ($haftaa['expense']/100);
    $h_top_per = mb_substr($h_top['expense']/$h_t,0,4);
    echo '<span class="text-success small pt-1 fw-bold">'.$h_top_per.'%</span> <span class="text-muted small pt-2 ps-1">'.$h_top['expensecategory'].'</span>';
    }
    echo '</div></div><div class="d-grid gap-2 mt-3"> <a href="" class="btn btn-info">Batafsil</a></div></div></div></div>';
    
    echo '<div class="col-xxl-4 col-md-6"><div class="card info-card revenue-card"><div class="filter"> <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a><ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"><li class="dropdown-header text-start"><h6>Filtrlash</h6></li><li><a class="dropdown-item" href="?oy=joriy">Joriy oy</a></li><li><a class="dropdown-item" href="?oy=avvalgi">Avvalgi oy</a></li></ul></div><div class="card-body"><h5 class="card-title">Oylik <span> | '.$oy.' oy</span></h5><div class="d-flex align-items-center"><div class="ps-3"><h6>'.number_format($oyy['expense']).' SO\'M</h6>';
    if ($oyy['expense'] != 0){
    $o_top = $conn->query("SELECT * FROM `expenses` WHERE `user_id` = $user_id AND $owhere ORDER BY `expense` DESC")->fetch();
    $o_t = ($oyy['expense']/100);
    $o_top_per = mb_substr($o_top['expense']/$o_t,0,4);
    echo '<span class="text-success small pt-1 fw-bold">'.$o_top_per.'%</span> <span class="text-muted small pt-2 ps-1">'.$o_top['expensecategory'].'</span>';
    }
    echo '</div></div><div class="d-grid gap-2 mt-3"> <a href="" class="btn btn-info">Batafsil</a></div></div></div></div>';
    
    echo '<div class="col-xxl-4 col-md-6"><div class="card info-card revenue-card"><div class="filter"> <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a><ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"><li class="dropdown-header text-start"><h6>Filtrlash</h6></li><li><a class="dropdown-item" href="?yil=joriy">Joriy '.date('Y').'-yil</a></li><li><a class="dropdown-item" href="?yil=avvalgi">Avvalgi '.(date('Y')-1).'-yil</a></li></ul></div><div class="card-body"><h5 class="card-title">Yillik <span>| '.$yil.' yil</span></h5><div class="d-flex align-items-center"><div class="ps-3"><h6>'.number_format($yill['expense']).' SO\'M</h6>';
    if ($yill['expense'] != 0){
    $y_top = $conn->query("SELECT * FROM `expenses` WHERE `user_id` = $user_id AND $ywhere ORDER BY `expense` DESC")->fetch();
    $y_t = ($yill['expense']/100);
    $y_top_per = mb_substr($y_top['expense']/$y_t,0,4);
    echo '<span class="text-success small pt-1 fw-bold">'.$y_top_per.'%</span> <span class="text-muted small pt-2 ps-1">'.$y_top['expensecategory'].'</span>';
    }
    echo '</div></div><div class="d-grid gap-2 mt-3"> <a href="" class="btn btn-info">Batafsil</a></div></div></div></div>
    
</div></div><div class="col-lg-4"><div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show" role="alert"> Ushbu sahifada sizning shu vaqtgacha qilgan barcha harajatlaringizning davriy hisoboti keltirilgan!</div></div></div>
                </section>';
require "../includes/footer.php";