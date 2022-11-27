<?php
session_start();

if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == TRUE){
<<<<<<< HEAD
    $id = $_SESSION['login_id'];
=======
    $sId = $_SESSION['login_id'];
>>>>>>> 22147d877f4a2dae9b69c1cb2f0abf6c2516aa03
}else{
    header('Location: ../login.php?msg=請再次登入');
}

$pdo = null;
//連線資料庫
require_once('../connectDB.php');
$pdo = connectDB();
<<<<<<< HEAD
$wAccount = $_SESSION['login_id'];
=======

>>>>>>> 22147d877f4a2dae9b69c1cb2f0abf6c2516aa03

//if篩選回傳
if(isset($_POST["act"]) && $_POST["act"]=="postsomething") {
    $option = $_POST["option"];
    if($option==1){ //1=獎品兌換紀錄
<<<<<<< HEAD
        $sql = "SELECT * FROM `prizelogs` ";
=======
        $sql = "SELECT * FROM `prizelogs`";
>>>>>>> 22147d877f4a2dae9b69c1cb2f0abf6c2516aa03
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $userData=array(); 
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $oId = $row['oId']; //查出oName
            $search_oName = $pdo->prepare("SELECT `oName` FROM `office` WHERE `oId` = '$oId'");
            $search_oName->execute();
            $oName = $search_oName->fetch(PDO::FETCH_ASSOC);
<<<<<<< HEAD

            $pId = $row['pId']; //查出pName
            $search_pName = $pdo->prepare("SELECT `pName` FROM `prize` WHERE `pId` = '$pId'");
            $search_pName->execute();
            $pName = $search_pName->fetch(PDO::FETCH_ASSOC);
=======
>>>>>>> 22147d877f4a2dae9b69c1cb2f0abf6c2516aa03
            
            $userData[]=array(
            'pId'=>$row['pId'],
            'sId'=>$row['sId'],
            'amount'=>$row['amount'],
            'price'=>$row['price'],
<<<<<<< HEAD
            'pName'=>$pName['pName'],
=======
            'pName'=>$row['pName'],
>>>>>>> 22147d877f4a2dae9b69c1cb2f0abf6c2516aa03
            'oName'=>$oName['oName'],
            'point'=>$row['point'],
            'transactionTime'=>$row['transactionTime']
            );
        }
        echo json_encode($userData,JSON_UNESCAPED_UNICODE);
        //在這取出所有需要的值，放入陣列，編輯成json檔，回傳json檔
    }
    else if($option==2){//2=獎品使用紀錄
<<<<<<< HEAD
        $sql = "SELECT * FROM `uselogs` ";
=======
        $sql = "SELECT * FROM `uselogs`";
>>>>>>> 22147d877f4a2dae9b69c1cb2f0abf6c2516aa03
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $userData=array(); 

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $pId = $row['pId']; //查出pName
            $search_pName = $pdo->prepare("SELECT `pName` FROM `prize` WHERE `pId` = '$pId'");
            $search_pName->execute();
            $pName = $search_pName->fetch(PDO::FETCH_ASSOC);

            $oId = $row['oId']; //查出oName
            $search_oName = $pdo->prepare("SELECT `oName` FROM `office` WHERE `oId` = '$oId'");
            $search_oName->execute();
            $oName = $search_oName->fetch(PDO::FETCH_ASSOC);
            
            $userData[]=array(
            'sId'=>$row['sId'],
            'amount'=>$row['amount'],
            'pName'=>$pName['pName'],
            'oName'=>$oName['oName'],
            'transactionTime'=>$row['transactionTime']
            );
        }
        echo json_encode($userData,JSON_UNESCAPED_UNICODE);
    }
    else if($option==3){//3=獎懲紀錄
<<<<<<< HEAD
        $sql = "SELECT * FROM `rewardslogs` ";
=======
        $sql = "SELECT * FROM `rewardslogs`";
>>>>>>> 22147d877f4a2dae9b69c1cb2f0abf6c2516aa03
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $userData=array(); 
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
<<<<<<< HEAD
        $wAccount = $row['wAccount']; //查出oName
        $search_wName = $pdo->prepare("SELECT `wName` FROM `worker` WHERE `wAccount` = '$wAccount'");
        $search_wName->execute();
        $wName = $search_wName->fetch(PDO::FETCH_ASSOC);
            $userData[]=array(
            'sId'=>$row['sId'],
=======
            $userData[]=array(
>>>>>>> 22147d877f4a2dae9b69c1cb2f0abf6c2516aa03
            'Commendation'=>$row['Commendation'],
            'MinorMerit'=>$row['MinorMerit'],
            'MajorMerit'=>$row['MajorMerit'],
            'Admonition'=>$row['Admonition'],
            'MinorDemerit'=>$row['MinorDemerit'],
            'MajorDemerit'=>$row['MajorDemerit'],
<<<<<<< HEAD
            'updateTime'=>$row['updateTime'],
            'wName'=>$wName['wName'],
=======
            'point'=>$row['point'],
            'updateTime'=>$row['updateTime'],
>>>>>>> 22147d877f4a2dae9b69c1cb2f0abf6c2516aa03
            'reason'=>$row['reason']
            );
        }
        echo json_encode($userData,JSON_UNESCAPED_UNICODE);
    }
}

die();
exit();//停止php
<<<<<<< HEAD
?>
=======
?>
>>>>>>> 22147d877f4a2dae9b69c1cb2f0abf6c2516aa03
