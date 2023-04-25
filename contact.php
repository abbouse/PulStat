<?php
require('config/config.php');
require('includes/header.php');
echo bc("Biz bilan aloqa");
if (isset($_POST['submit'])){
    echo 'yuborildi';
    exit();
}
?>
<section class="section contact"><div class="row gy-4"><div class="col-xl-6"><div class="row"><div class="col-lg-6"><div class="info-box card"> <i class="bi bi-geo-alt"></i><h3>Manzil</h3><p>Tashkent</p></div></div><div class="col-lg-6"><div class="info-box card"> <i class="bi bi-telephone"></i><h3>Telefon</h3><p>+998 33 3303034</p></div></div><div class="col-lg-6"><div class="info-box card"> <i class="bi bi-envelope"></i><h3>Pochta</h3><p><a href="mailto:abbosbey02@gmail.com" class="__cf_email__" data-cfemail="442d2a222b04213c25293428216a272b29">[email&#160;protected]</a></p></div></div><div class="col-lg-6"><div class="info-box card"> <i class="bi bi-clock"></i><h3>Ish kunlari</h3><p>Har kuni</p></div></div></div></div><div class="col-xl-6"><div class="card p-4"><form action="contact.php" method="post" class="php-email-form"><div class="row gy-4"><div class="col-md-6"> <input type="text" value="<?php echo $user['name'];?>" name="name" class="form-control" placeholder="Ismingiz" required></div><div class="col-md-6 "> <input type="email" value="<?php echo $user['email'];?>" class="form-control" name="email" placeholder="E-mailingiz" required></div><div class="col-md-12"> <input type="text" class="form-control" name="subject" placeholder="Xabar mavzusi" required></div><div class="col-md-12"><textarea class="form-control" name="message" rows="6" placeholder="Batafsil" required></textarea></div><div class="col-md-12 text-center"><div class="loading">Yuborilmoqda</div><div class="error-message"></div><div class="sent-message">Sizning xabaringizni qabul qildik, javob kuting!</div> <button name="submit" type="submit">Bog'lanish</button></div></div></form></div></div></div></section>
<?php
require('includes/footer.php');