<?php
session_start();
if (isset($_POST['user_id_id'])) {
    $user_id_id = $_POST['user_id_id'];

    try {
        $pdo = new PDO('mysql:dbname=gs_db_525; charset=utf8;host=localhost', 'root', '');
    } catch (PDOException $e) {
        exit('DbConnectError:' . $e->getMessage());
    }

    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :user_id_id");
    $stmt->bindParam(':user_id_id', $user_id_id, PDO::PARAM_INT);
    $status = $stmt->execute();

    if ($status == false) {
        $error = $stmt->errorInfo();
        exit("ErrorQuery:" . $error[2]);
    }

    $prof = $stmt->fetch(PDO::FETCH_ASSOC);
    }
?>

<!DOCTYPE html>
<html lang="ja">
<!-- 最初の設定は終わっています　必要な方は触ってください -->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Home</title>
  <link rel="stylesheet" href="reset.css">
  <link rel="stylesheet" href="style2.css">
  <!-- <link rel="stylesheet" href="main.js"> -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> -->
</head>

<body>

<div class="header" style="display:flex; align-items:center;">
    <div id="logo" style="width:40%;height:100%; display:flex; align-items:center;">
          <img style="width:12%;margin:5px;" class="logo_img" src="img/logo1.jpeg" alt="Flourimist">
          <div class="service_name" style="margin-left:10px;font-size:60px;font-family: 'Chalkduster',sans-serif;">Flourimist</div>
    </div>
    <div id="logout" style="width:60%;text-align:right;">
        <a href="home.php">
        <div>
        <img style="width:5%;margin-right:30px;" class="logout" src="img/logout1.png" alt="Flourimist">
        </div>
        </a>
        <div style="font-size:16px;margin-right:36px;">back</div>
    </div>
</div>

<div class="content">
<div class="page" id="user_page">
        <div id="user_prof" style="display:flex;justify-content:center;align-items:center;">
            <div id="user_prof_img" style="width:30%;margin:5%;align-items:center;">
                <img src="./img/<?=$prof["prof_img_name"]?>" alt="プロフィール画像" style="padding-top:5px;width:110px;height:110px;border-radius:50%; object-fit: cover;">
            </div>
            <div style='width:70%;margin:0% 0% 1% 3%;'>
            <div style="margin-left:1%;font-size:100%;"><?="ID: ".$prof["user_id"]."<br> Name: ".$prof["name"]?></div>
            </div>
            </div>
        <div id="bio" style='margin:0% auto 10%;width: 80%;height: auto;border: 2px solid #79BD9A;'>
            <div style='padding:3%'><?=$prof['bio']?></div>
        </div>
        </div>

    <div class="page" id="timelin" style ="width:75%;border-left: 10px dotted #79BD9A;overflow: auto;">
        <?php
            try{
                $pdo = new PDO('mysql:dbname=gs_db_525; charset=utf8;host=localhost', 'root','');
            } catch(PDOException $e){
                exit('DbConnectError:'.$e->getMessage());
            }

            $stmt = $pdo->prepare("SELECT * FROM articles WHERE user_id_id = :user_id_id");
            $stmt->bindParam(':user_id_id', $user_id_id, PDO::PARAM_INT);
            $status = $stmt->execute();

            $vie = "";
            if($status == false){
                $error = $stmt->errorInfo();
                exit("ErrorQuery:".$error[2]);
            }else{
                while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $vie .= "<div style='font-size:20px; display:flex; justify-content:space-between; align-items: center;'>";
                    $vie .= "<div style='width:20%; margin-left:20px;font-size:80%;margin-bottom:5px;'><img src='./img/".$result["prof_img_name"]."' style='padding:5px;width:110px;height:110px;border-radius:50%; object-fit: cover;'><br>";
                    $vie .= $result["name"]."</div>";
                    $vie .= "<div style='width:56%; padding:20px;'><h5 style='font-weight:bold;'>タイトル：【";
                    $vie .= $result["title"]."】</h5>".$result["body"]."</div><br><br><div style='width:24%;margin-top:5px;'>";
                    $vie .= "<div id='post_time' style='padding:10px;font-size:14px;'>";
                    if(($result["created_at"]!=$result["updated_at"]) && ($result["updated_at"]!= NULL)){
                        $vie .= "Updated at<br>".$result["updated_at"];
                    }else{
                    $vie .= $result["created_at"];
                    }
                    $vie .= "</div></div></div>";?>
                    <div class="post">
                        <?=$vie?>
                    </div>
                    
              <?php $vie = "";
               }
            }
?>

    </div>
</div>
</div>

<div class="footer">
        <p>copyrights 2023 まるしぃ Tokyo All RIghts Reserved.</p>
</div>

</body>

</html>