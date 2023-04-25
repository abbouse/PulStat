<?php
require 'config/config.php'; 
require "includes/header.php";

if (!$user_id){
    header('location: /auth/login.php');
    exit();
}
$posts = $conn->prepare("SELECT * FROM expenses WHERE user_id = $user_id ORDER BY expense_id DESC LIMIT 10");
$posts->execute();

$cats = $conn->prepare("SELECT SUM(expense), expensecategory FROM expenses WHERE user_id = $user_id GROUP BY expensecategory ORDER BY expense_id ASC;");
$cats->execute();

$col = $conn->prepare("select count(*) from expenses where user_id = $user_id");
$col->execute();
$col = $col->fetchColumn();
?>

<section class="section dashboard"><div class="row"><div class="col-lg-8"><div class="row"><div class="card-body">
    
    <div class="alert alert-primary alert-dismissible fade show" role="alert"> <i class="bi bi-star me-1"></i> Bazi bir bo'limlar ishlab chiqilmoqda, hozirda asosiy bo'limlar ishlab turibdi. <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
    
    <div class="d-grid gap-2 mt-3"> <a href="/modules/addExpense.php" class="btn btn-primary"><i class="bi bi-plus-square-dotted"></i> YANGI HARAJAT QO'SHISH</a></div></div>

<div class="col-12"><div class="recent-sales overflow-auto">
<?php
echo '<div class="card"><div class="card-body"><h5 class="card-title">So\'ngi harajatlar <span>| '.$col.'</span></h5>';
if ($col < 1){
    echo '<p>Hozircha sizda harajatlar yo\'q!</p>';
}else{
echo '<table class="table"><thead><tr><th scope="col">Turi</th><th scope="col">Summa (UZS)</th><th scope="col">Vaqti</th><th scope="col">Boshqaruv</th></tr></thead><tbody>';
    while ($row = $posts->fetch(PDO::FETCH_ASSOC)){
    echo '<tr';
    if ($row['expense'] >= $user['maxExpense']){
            echo ' class="table-danger"';
        }elseif ($row['expense'] >= ($user['maxExpense']/2)){
            echo ' class="table-warning"';
        }
    echo '><td>'.$row['expensecategory'].'</td><td>'.number_format($row['expense']).'</td><td>'.$row['expensedate'].'</td><td><a href="/modules/view.php?id='.$row['expense_id'].'"><i class="bi bi-eye-fill"></i></a> / <a href="/modules/delete.php?id='.$row['expense_id'].'"><i class="bi bi-trash-fill"></i></a></td></tr>';
    }
    echo '</tbody></table>';
    }
?></div></div></div></div></div></div>



<div class="col-lg-4"><div class="card"><div class="card-body pb-0"><h5 class="card-title">Statistika <span>| Umumiy</span></h5>
<?php
if ($col < 1){
    echo '<p>Hozircha sizda harajatlar yo\'q!</p>';
}else{
?>
<div id="trafficChart" style="min-height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;" class="echart" _echarts_instance_="ec_1674748853629"><div style="position: relative; width: 716px; height: 400px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas data-zr-dom-id="zr_0" width="716" height="400" style="position: absolute; left: 0px; top: 0px; width: 716px; height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div class=""></div></div> <script>document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#trafficChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      top: '5%',
                      left: 'center'
                    },
                    series: [{
                      name: 'Access From',
                      type: 'pie',
                      radius: ['40%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: true,
                          fontSize: '18',
                          fontWeight: 'bold'
                        }
                      },
                      labelLine: {
                        show: false
                      },
                      data: [<?php 
                      while ($cat = $cats->fetch(PDO::FETCH_ASSOC)){
                          echo "{
                          value: ".$cat['SUM(expense)'].",
                          name:'".str_replace("'","\'",$cat['expensecategory'])."',
                        },";
                          } ?>
                      ]
                    }]
                  });
                });</script> 
                <?php
}
                ?></div></div></div></div></section>

<?php require 'includes/footer.php'; ?>