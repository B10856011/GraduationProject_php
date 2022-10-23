<?php
session_start();

if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == true && $_SESSION['is_office'] == true){
    $id = $_SESSION['login_id'];
}else{
    $_SESSION['is_login'] = false;
    header('Location: login.php?msg=請再次登入');
}

//連線資料庫
try{
    $pdo = new PDO('mysql:host=localhost:3307;dbname=graduation_project',"root","466110");
    //echo "成功連線";
}catch (PDOException $e){
    echo $e->getMessage();
}
//管理員資訊
try{
    $sql = "SELECT * FROM `office` WHERE `office_id`='{$id}';";
    $user_array = $pdo->query($sql);

    $user = $user_array->fetch();
}catch (PDOException $e){
    echo $e->getMessage();
}
//取得待確認單
try{
    $sql = "SELECT * FROM `confirm`;";
    $confirms = $pdo->query($sql);
}catch (PDOException $e){
    echo $e->getMessage();
}

//關閉連接
$pdo = null;
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.6.0/web3.min.js"></script>
    <title>屏科學生獎勵兌換系統</title>

    <style>
        * {
            margin: 0;
            padding: 0;
        }
        
        .main-footer {
            background-color: rgb(150, 150, 150);
        }
        
        .carousel {
            margin-bottom: 10px;
        }
        
        .container .leftNav {
            width: 20%;
            float: left;
            padding-right: 10px;
        }
        
        .container .rightDiv {
            width: 80%;
            float: right;
        }
        
        .leftNav ul li {
            font-size: large;
            background: url('../images/leftNav_bg.jpg') repeat-x;
            list-style: none;
            border-bottom: 1px solid #c5c5c5;
            line-height: 40px;
        }
        
        .leftNav ul li a {
            color: #494949;
            display: block;
            text-decoration: none;
            background: rgb(255, 255, 255);
            /* Old browsers */
            background: url('../images/topNav_left.jpg') repeat-x;
        }
        
        .leftNav ul li a:hover {
            color: #494949;
            /*background: #fef68b url('../images/leftNav_bg_hover.jpg') repeat-x;*/
            background: url('../images/topNav_left_h.jpg') repeat-x;
            text-decoration: none;
        }
        
        .table,
        td,
        th {
            padding: 5px;
        }
        
        .rightDiv table td {
            font-size: large;
            font-family: verdana;
        }
        
        .rightDiv table th {
            font-size: large;
        }
        
        .rightDiv table thead {
            font-weight: bold;
            font-size: x-large;
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
                            <a class="nav-link" href="#" id="portal_login_button"><?php echo $user['office_id'] ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="http://picsum.photos/1200/200?random=21" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="http://picsum.photos/1200/200?random=22" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="http://picsum.photos/1200/200?random=23" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        <!--左邊的清單-->
        <div class="navbar-collapse ui-layout-west ui-layout-resizer-west-closed">
            <div class="leftNav">
                <ul class="jd_menu_vertical" style="margin-left: 0; padding-left:0;">
                    <li><a href="office_info.php"><span class="min-i-arrow"></span>管理員資訊</a></li>
                    <li><a href="confirm.php"><span class="min-i-arrow"></span>等待確認</a></li>
                </ul>
            </div>
        </div>
        <div class="rightDiv">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">首頁</a></li>
                    <li class="breadcrumb-item active" aria-current="page">等待確認</li>
                </ol>
            </nav>
            <!--js輸出table-->
            <div class="rightTable">
                <table style="text-align:center;">
                    <thead>
                        <tr>
                            <th>學生ID</th>
                            <th>商品ID</th>
                            <th>商品數量</th>
                            <th>購買時間</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach($confirms as $confirm):;?>
                        <tr>
                            <td id="stu_id_<?php echo $i;?>"><?php echo $confirm['stu_id'] ?></td>
                            <td id="com_id_<?php echo $i;?>"><?php echo $confirm['com_id'] ?></td>
                            <td id="buyNum_<?php echo $i;?>"><?php echo $confirm['buyNum'] ?></td>
                            <td id="buyTime_<?php echo $i;?>"><?php echo $confirm['buyTime'] ?></td>
                            <td>
                                <!--<button id="send" class="btn btn-primary">確認</button>-->
                                <input class="btn btn-primary" type="button" id="send" value="確認" onclick="getNum(<?php echo $i;?>)">
                                <a class="btn btn-primary">拒絕</a>
                            </td>
                        </tr>
                        <?php $i++; endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        console.log("script!!");
        var web3 = new Web3(window.web3.currentProvider);
        var num;
        var Contract;
        var abi = [{
                "inputs": [
                    {
                        "internalType": "string",
                        "name": "_stuId",
                        "type": "string"
                    },
                    {
                        "internalType": "string",
                        "name": "_officeId",
                        "type": "string"
                    },
                    {
                        "internalType": "string",
                        "name": "_buyTime",
                        "type": "string"
                    }
                ],
                "name": "addTranDetail",
                "outputs": [],
                "stateMutability": "nonpayable",
                "type": "function"
            },
            {
                "inputs": [],
                "name": "blockId",
                "outputs": [
                    {
                        "internalType": "uint256",
                        "name": "",
                        "type": "uint256"
                    }
                ],
                "stateMutability": "view",
                "type": "function"
            },
            {
                "inputs": [
                    {
                        "internalType": "string",
                        "name": "_stuId",
                        "type": "string"
                    }
                ],
                "name": "getBlock",
                "outputs": [
                    {
                        "internalType": "uint256[]",
                        "name": "",
                        "type": "uint256[]"
                    }
                ],
                "stateMutability": "view",
                "type": "function"
            }]
        var address = "0x94A705a006117FB894d3E81E230F363436428A5d";

        function getNum(i){
            num = i;
            console.log(num);
            init();
        }

        async function init() {
            Contract = await new web3.eth.Contract(abi, address);
            console.log(Contract);
            send();
        }

        async function send() {
            //console.log("click!!");
            const accounts = await window.ethereum.request({
                method: 'eth_requestAccounts'
            });
            user = accounts[0];
            //var accounts = await web3.eth.getAccounts().then(console.log);
            console.log(user);
            var stu_id = document.getElementById("stu_id_"+ num.toString()).innerHTML;
            console.log(stu_id);
            var office_id = "<?php echo $id?>";
            var buyTime = document.getElementById("buyTime_"+num.toString()).innerHTML;
            Contract.methods.addTranDetail(stu_id, office_id, buyTime).send({
                from: user
            }).then(function(data) {
                console.log(data);
            });
        }

        /*
            try {
                web3js = new Web3(window.ethereum); //建立web3連結
                const accounts = await window.ethereum.request({
                    method: 'eth_requestAccounts'
                });
                user = accounts[0];
                $("#username").html(user);

                test = new web3js.eth.Contract(abi, testAddress); //合約
                userAccount = web3js.currentProvider.selectedAddress; //不明用途，取自CrappyBird 893行
            } catch (error) {
                alert(error.message);
            }
        */
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
            crossorigin="anonymous">
    </script>
</body>

</html>