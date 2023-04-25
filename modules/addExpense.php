<?php
require "../config/config.php";
require "../includes/header.php";

echo bc("Harajat qo'shish");

if (isset($_POST['submit'])) {
    if ($_POST['summa'] < 1 or $_POST['date'] == '' or $_POST['type'] == '') {
        echo "<center><h3 style='color:red;'>Please fill in all the fields correctly</h3></center>";
        // return;
    } else {



        $price = intval($_POST['summa']);
        $kom = isset($_POST['comment']) ? trim(mb_substr($_POST['comment'], 0, 500)) : '';
        $sana = isset($_POST['date']) ? trim(mb_substr($_POST['date'], 0, 15)) : '';
        $type = isset($_POST['type']) ? trim(mb_substr($_POST['type'], 0, 50)) : '';

        $insert = $conn->prepare("INSERT INTO `expenses`(`user_id`, `expense`, `expensedate`, `expensecategory`, `comm`) VALUES (?,?,?,?,?)");
        $insert->execute([$user_id,$price,$sana,$type,$kom]);


            header('location: /index.php');
    }
}
$cat = $conn->query("SELECT * FROM category");
$cat->execute();
?>
<section class="section dashboard"><div class="row"><div class="col-lg-8"><div class="row"><div class="col-xxl-4 col-xl-12"><div class="card info-card customers-card"><div class="card-body"><h5 class="card-title">Harajat <span>| Qo'shish</span></h5>

<form action="" method="post" class="row g-3"><div class="col-md-12"><div class="form-floating"> <input type="text" class="form-control" name="summa" id="price" placeholder="Your Name" required> <label for="price">Narxni kiriting</label></div></div><div class="col-12"><div class="form-floating"><textarea class="form-control" placeholder="Izoh" name="comment" id="comm" style="height: 100px;"></textarea><label for="comm">Izoh</label></div></div><div class="col-md-6"><div class="col-md-12"><div class="form-floating"> <input type="date" class="form-control" name="date" id="today" placeholder="Sana" required> <label for="today">Sana</label></div></div></div><div class="col-md-6"><div class="form-floating mb-2"> <select name="type" class="form-select" id="cat" aria-label="Turi">
    <?php 
    while ($a=$cat->fetch(PDO::FETCH_ASSOC)){
    echo '<option value="'.$a['name'].'">'.$a['name'].'</option>';
    }
    ?></select> <label for="cat">Turi</label></div></div><div class="text-center"> <button type="submit" name="submit" class="btn btn-primary"> Saqlash </button> <button type="reset" class="btn btn-secondary"> Tozalash </button></div></form>

</div></div></div></div></div>

<div class="col-lg-4">
    
    <div class="alert alert-dark bg-dark text-light border-0 alert-dismissible fade show" role="alert"> *Barcha bo'limlarni to'ldirish shart - faqat <b>izoh</b> maydonidan tashqari.<hr/>Savol: Izohga nima yozish mumkin?<br/>Javob: Misol uchun kelajakda bu harajatingiz aynan nimalarga bo'lganini unutib qo'ysangiz, sizga eslash uchun kerak bo'lishi mumkin! Shu sababli harajatni batafsil yoritib qo'ysangiz, foydadan holi emas!</div>
    
</div></section>

<?php require "../includes/footer.php"; ?>