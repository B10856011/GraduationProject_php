<?php
session_start();

if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == TRUE){
    $sId = $_SESSION['login_id'];
}else{
    header('Location: ../login.php?msg=請再次登入');
}

$pdo = null;
//連線資料庫
require_once('../connectDB.php');
$pdo = connectDB();


//if篩選回傳
if(isset($_POST["act"]) && $_POST["act"]=="postsomething") {
    $option = $_POST["option"];
    if($option==1){ //1=獎品兌換紀錄
        $sql = "SELECT `blockHeight` FROM `blockchainlogs` WHERE `type` = 1 ORDER BY `uploadTime` DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        $userData = $userData['blockHeight'];
        
        echo json_encode($userData,JSON_UNESCAPED_UNICODE);
        //在這取出所有需要的值，放入陣列，編輯成json檔，回傳json檔
    }
    else if($option==2){//2=獎品使用紀錄
        $sql = "SELECT * FROM `uselogs` WHERE `sId` = '$sId'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $userData=array(); 
        
        echo json_encode($userData,JSON_UNESCAPED_UNICODE);
    }
    else if($option==3){//3=獎懲紀錄
        $sql = "SELECT * FROM `rewardslogs` WHERE `sId` = '$sId'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $userData=array(); 
        
        echo json_encode($userData,JSON_UNESCAPED_UNICODE);
    }
}

die();
exit();//停止php
?>
