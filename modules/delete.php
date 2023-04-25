<?php
require('../config/config.php');
$id = intval($_GET['id']);
$info = $conn->query("SELECT * FROM `expenses` WHERE expense_id='$id'");
$info = $info->fetch();
if ($info){
$del = $conn->prepare("DELETE FROM `expenses` WHERE `expense_id` = $id");
        $del->execute();
}
header('location: /');
?>