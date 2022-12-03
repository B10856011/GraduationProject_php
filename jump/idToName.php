<?php
session_start();

if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == TRUE){
    $id = $_SESSION['login_id'];
}else{
    header('Location: ../login.php?msg=請再次登入');
}

$pdo = null;
//連線資料庫
require_once('../connectDB.php');
$pdo = connectDB();
$wAccount = $_SESSION['login_id'];

$oIdList = $_POST['oIdArray'];
$pIdList = $_POST['pIdArray'];
$nameData=array();

$sql = "SELECT DISTINCT `oName`,`oId` FROM `office` ";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$nameData['office'] = array_column($rows, 'oName', 'oId');

$sql = "SELECT DISTINCT `pName`,`pId` FROM `prize` ";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$nameData['prize'] = array_column($rows, 'pName', 'pId');

echo json_encode($nameData,JSON_UNESCAPED_UNICODE);

die();
exit();//停止php
?>