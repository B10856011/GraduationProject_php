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
                <a class="navbar-brand" href="../index.php">
                    <img src="https://cop.npust.edu.tw/wp-content/uploads/2021/04/NPUSTLogo.svg-1024x564.png" alt="" width="45" height="24" class="d-inline-block align-text-top"> 屏科大學生獎勵兌換系統
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <!-- <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="apply_reward_consent.php">申請獎勵</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">持有兌換券</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                        </li> -->
                    </ul>
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link" href="#">登入</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- <div class="d-flex" style="height: 200px;">
            <div class="vr"> -->
        <div class="mb-3">
            <label for="formFileMultiple" class="form-label">相關證明的照片：</label>
            <input class="form-control" type="file" id="formFileMultiple" multiple placeholder="請上傳相關證明的照片">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">申請獎勵名稱：</label>
            <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="請輸入申請獎勵名稱">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">證明獲得單位：</label>
            <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="請說明證明獲得單位">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">詳細相關敘述：</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="請詳細敘述申請內容"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">申請數量：</label>
            <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="請輸入申請數量">
        </div>
        <!-- </div>
        </div> -->
        <a href="../index.html" class="btn btn-primary">確定送出申請</a>
    </div>
</body>

</html>