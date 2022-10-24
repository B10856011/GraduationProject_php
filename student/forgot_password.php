<?php
session_start();

if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == TRUE){
    $id = $_SESSION['login_id'];
}else{
    header('Location: login.php?msg=請再次登入');
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>忘記密碼</title>

    <style>
        .navbar {
            background-color: white;
        }
        
        .main-footer {
            background-color: rgb(150, 150, 150);
        }
        
        .carousel {
            margin-bottom: 10px;
        }
        
        .h2 {
            text-align: center;
        }
        
        .clearer {
            background: transparent;
            border-width: 0;
            clear: both;
            display: block;
            height: 1px;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">
                    <img src="https://cop.npust.edu.tw/wp-content/uploads/2021/04/NPUSTLogo.svg-1024x564.png" alt="" width="45" height="24" class="d-inline-block align-text-top"> 屏科大學生獎勵兌換系統
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <?php if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == TRUE):?>
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link" href="jump/logout.php" id="portal_login_button">登出</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <!-- <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li> -->
                        <?php if(isset($_SESSION['is_office']) && $_SESSION['is_office'] == true):?>
                        <li class="nav-item">
                            <a class="nav-link" href="office/office_info.php">個人資訊(Office)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="confirm.php">待確認單</a>
                        </li>
                        <?php else:?>
                        <li class="nav-item">
                            <a class="nav-link" href="apply_reward_consent.php">獎勵申請</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">持有兌換券</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="student/student_info.php">個人資訊(Student)</a>
                        </li>
                        <?php endif;?>
                        <!-- <li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                        </li> -->
                    </ul>
                    <?php else:?>
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link" href="login.php" id="portal_login_button">登入</a>
                        </li>
                    </ul>
                    <?php endif;?>
                </div>
            </div>
        </nav>

    </div>
    <div class="container" center>
        <h2>
            忘記密碼
        </h2>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">姓名(Name)：</label>
            <input type="name" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">單位(Department)：</label>
            <div class="select">
                <select class="form-select form-select-lg mb-3" aria-label="Default select example">
                <option selected>請選擇單位</option>
                <option value="1">學務處</option>
                <option value="2">總務處</option>
                <option value="3">資訊管理系</option>

                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">帳號(Login Account)：</label>
            <input type="name" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">身分證號後四碼(The last four digits of the ID or passport)：</label>
            <input type="name" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">您的Email(Your Email)：</label>
            <input type="name" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">身分別(Identity)：</label>
            <div class="select">
                <select class="form-select form-select-lg mb-3" aria-label="Default select example">
                <option value="1">學生(Student)</option>
                <option value="2">教師(Teacher)</option>
                <option value="3">職員(Stuff)</option>
                <option value="4">其他(Other)</option>
                </select>
            </div>
        </div>
        <!-- </div> -->
        <center><a href="校方頁面.html" class="btn btn-primary">送出</a></center>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>