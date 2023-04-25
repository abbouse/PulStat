<?php
require('../config/config.php');
require('../includes/header.php');
echo bc($user['name'].' profili');
if ($user){
    if (isset($_POST['submitEditProfile'])) {
    if ($_POST['fullName'] == '' or $_POST['tg'] == '' or $_POST['maxExpense'] < 1) {
        
    } else {
        $name = isset($_POST['fullName']) ? trim(mb_substr($_POST['fullName'], 0, 40)) : '';
        $tg = isset($_POST['tg']) ? trim(mb_substr($_POST['tg'], 0, 22)) : '';
        $maxExpense = intval($_POST['maxExpense']);
        $insert = $conn->prepare("UPDATE `users` SET `name`=?, `telegram`=?, `maxExpense`=? WHERE `user_id` = $user_id");
        $insert->execute([$name,$tg,$maxExpense]);
        $abbous = ok;
// header('location: profile.php');
            // exit();
    }
}
echo '<section class="section profile"><div class="row"><div class="col-xl-4">';
if ($abbous == 'ok'){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Ma\'lumotlaringiz o\'zgardi, sahifani yangilang!</div>';
    }
    echo '<div class="card"><div class="card-body profile-card pt-4 d-flex flex-column align-items-center"> <img src="/assets/img/'.$user['photo'].'" alt="Profile" class="rounded-circle"><h2>'.$user['name'].'</h2><h3>';
if ($user['rights'] < 1) echo 'Foydalanuvchi';
else
echo 'Sayt yaratuvchisi';
echo '</h3></div></div></div>';

echo '<div class="col-xl-8"><div class="card"><div class="card-body pt-3"><ul class="nav nav-tabs nav-tabs-bordered" role="tablist"><li class="nav-item" role="presentation"> <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview" aria-selected="true" role="tab">Ma\'lumotlar</button></li><li class="nav-item" role="presentation"> <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit" aria-selected="false" role="tab" tabindex="-1">Sozlamalar</button></li><li class="nav-item" role="presentation"> <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password" aria-selected="false" role="tab" tabindex="-1">Parol o\'zg.</button></li></ul>';

echo '<div class="tab-content pt-2"><div class="tab-pane fade profile-overview active show" id="profile-overview" role="tabpanel"><h5 class="card-title">Shaxsiy ma\'lumotlar</h5><div class="row"><div class="col-lg-3 col-md-4 label ">Ism</div><div class="col-lg-9 col-md-8">'.$user['name'].'</div></div><div class="row"><div class="col-lg-3 col-md-4 label">A\'zo bo\'lgan sana</div><div class="col-lg-9 col-md-8">'.$user['reg_date'].'</div></div><div class="row"><div class="col-lg-3 col-md-4 label">Email</div><div class="col-lg-9 col-md-8">'.$user['email'].'</div></div><div class="row"><div class="col-lg-3 col-md-4 label">Maksimal harajat</div><div class="col-lg-9 col-md-8">'.number_format($user['maxExpense']).' SO\'M</div></div></div>';

echo '<div class="tab-pane fade profile-edit pt-3" id="profile-edit" role="tabpanel"><form action="" method="post"><div class="row mb-3"> <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto</label><div class="col-md-8 col-lg-9"> <img src="/assets/img/'.$user['photo'].'" alt="Profil"></div></div><div class="row mb-3"> <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Ism</label><div class="col-md-8 col-lg-9"> <input name="fullName" type="text" class="form-control" id="fullName" value="'.$user['name'].'"></div></div><div class="row mb-3"> <label for="tg" class="col-md-4 col-lg-3 col-form-label">Tg. @username</label><div class="col-md-8 col-lg-9"> <input name="tg" type="text" class="form-control" id="tg" value="'.$user['telegram'].'"><label for="tg"><small>*Telegram profilingizdan Foto avtomatik yuklab olinadi.</small></label></div></div>

<div class="row mb-3"> <label for="maxExpense" class="col-md-4 col-lg-3 col-form-label">Maksimal harajat</label><div class="col-md-8 col-lg-9"> <input name="maxExpense" type="number" class="form-control" id="maxExpense" value="'.$user['maxExpense'].'"><label for="maxExpense"><small>Bir martalik qilishingiz mumkin bo\'lgan maksimal harajatingiz.</small></label></div></div>';

echo '<div class="text-center"> <button type="submit" name="submitEditProfile" class="btn btn-primary"> O\'zgarishlarni saqlash </button></div></form></div>';

echo '<div class="tab-pane fade pt-3" id="profile-change-password" role="tabpanel"><form><div class="row mb-3"> <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Eski parol</label><div class="col-md-8 col-lg-9"> <input name="password" type="password" class="form-control" id="currentPassword"></div></div><div class="row mb-3"> <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Yangi parol</label><div class="col-md-8 col-lg-9"> <input name="newpassword" type="password" class="form-control" id="newPassword"></div></div><div class="row mb-3"> <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Yangi parolni tasdiqlang</label><div class="col-md-8 col-lg-9"> <input name="renewpassword" type="password" class="form-control" id="renewPassword"></div></div><div class="text-center"> <button type="submit" class="btn btn-primary"> Parolni o\'zgartirish </button></div></form></div></div></div></div></div></div></section>';
}
require('../includes/footer.php');