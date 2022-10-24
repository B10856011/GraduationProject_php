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

    <title>屏科學生獎勵兌換系統</title>

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
    </style>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="https://cop.npust.edu.tw/wp-content/uploads/2021/04/NPUSTLogo.svg-1024x564.png" alt="" width="45" height="24" class="d-inline-block align-text-top"> 屏科大學生獎勵兌換系統
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                    </ul>
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link" href="student_info.php"><?php echo $id?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- <div class="d-flex" style="height: 200px;">
            <div class="vr"> -->
        <div>
            第五條 學生有下列各款情形之一者，予以嘉獎：<br> 一、熱心參加公益及課外活動，表現優良者。<br> 二、擔任學生社團幹部或自治幹部，表現優良者。 <br>三、服務公勤，熱心公益，有具體優良事蹟者。 <br>四、規勸同學向善或協助同學解除危困，表現優良者。 <br>五、拾獲價值未達新臺幣壹萬元之金錢或物品並主動交還當事人、通報本校相關 單位或警察機關者。 <br>六、其他相當於以上各款情事者。 <br><br>第六條 學生有下列各款情形之一者，予以小功： <br>一、擔任學生社團幹部或自治幹部，績效優異者。
            <br>二、服務公勤，熱心公益，成效優異者。
            <br>三、協助同學解除危困，表現優異者。 <br>四、拾獲價值新臺幣壹萬元以上之金錢或物品並主動交還當事人、通報本校相關 單位或警察機關者。 <br>五、參加全國性或省各項比賽得前三名者。 <br>六、見義勇為，保護團體安全，或他人利益者。 <br>七、在校外行為有特殊表現，足以提昇校譽者。 <br>八、其他相當於以上各款情事者。 <br><br>第七條 學生有下列各款情形之一者，予以記大功，並得頒發獎狀： <br>一、有裨益國家、社會及增進校譽之特殊貢獻者。 <br>二、有特殊優異之表現，堪為青年模範者。
            <br>三、見義勇為，有具體特優事蹟者。
            <br>四、代表學校參加全國性競賽成績特優，足增進校譽者。 <br>五、其他相當以上各款情事者。
        </div>
        <!-- </div>
        </div> -->
        <a href="apply_reward_form.php" class="btn btn-primary">同意並前往填寫申請</a>
    </div>
</body>

</html>