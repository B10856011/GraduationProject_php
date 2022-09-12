<?php
session_start();

if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == TRUE){
    header('Location: index.php');
}

$username = $_POST['username'];
$password = $_POST['password'];

//連線資料庫
try{
    $pdo = new PDO('mysql:host=localhost:3307;dbname=graduation_project',"root","466110");
    //echo "成功連線";
}catch (PDOException $e){
    echo $e->getMessage();
}

//取得帳號密碼
try{
    $sql = "SELECT * FROM `student` WHERE `stu_id`='{$username}';";
    $user_array = $pdo->query($sql);
}catch (PDOException $e){
    echo $e->getMessage();
}
$user = $user_array->fetch();

if(!empty($user) && $user['password'] == $password){
    //登入成功
    $_SESSION['is_login'] = true;
    $_SESSION['login_id'] = $user['stu_id'];
    header('Location: index.php');
}else{
    try{
        $sql = "SELECT * FROM `office` WHERE `office_id`='{$username}';";
        $user_array = $pdo->query($sql);
    }catch (PDOException $e){
        echo $e->getMessage();
    }
    $user = $user_array->fetch();
    if(!empty($user) && $user['office_pass'] == $password){
        //登入成功
        $_SESSION['is_login'] = true;
        $_SESSION['is_office'] = true;
        $_SESSION['login_id'] = $user['office_id'];
        header('Location: index.php');
    }else{
    //登入失敗
    header('Location: login.php?msg=帳號或密碼錯誤');
    }
}

//關閉連接
$pdo = null;

?>