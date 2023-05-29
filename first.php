<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link rel="stylesheet" href="style.css">
    <script
  src="https://code.jquery.com/jquery-3.7.0.js"
  integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
  crossorigin="anonymous"></script>
    <title>Home</title>
</head>
<body>

<div id="container">
          <div class="logo"><img class="logo_img" src="img/logo1.jpeg" alt="Flourimist"></div>
          <div class="service_name">Flourimist</div>
    </div>
<div>
<h1 style="letter-spacing:1px;text-align:center;margin-top: 2em;color:white" class="h1_log">Login</h1>
   <form action="login.php" method="post" style="text-align:center;" >
     <input name="lid" placeholder="user ID"><br>
     <input type="password" name="lpw" placeholder="password"><br>
     <button class="button" type="submit" style="margin-top:10px;">Login</button>
   </form>
<h1 style="letter-spacing:1px;text-align:center;margin-top: 2em;color:white" class="h1_log">Signup</h1>
<form action="register.php" method="post" style="text-align:center;" enctype="multipart/form-data">
     <input name="user_id" placeholder="user ID"><br>
     <input name="user_name" placeholder="user name"><br>
     <input type="password" name="user_password" placeholder="password"><br>
     <div>
     <p style="color:white;margin-bottom:0;">Upload profile photo</p>
     <label><input type="file" name="fname" accept="image/*" style="margin-left:80px;"></label>
     <!-- <p id="filename" style="color:white;">選択されていません</p> -->
     </div>
     <!-- <p style="color:white;">好きな動物を選択（プロフィール画像になります）</p> -->
     <!-- <select name="animal">
      <option value="buta">ブタ</option>
      <option value="kuma">クマ</option>
      <option value="inu">イヌ</option>
      <option value="neko">ネコ</option>
      <option value="zou">ゾウ</option>
      <option value="uma">ウマ</option>
      <option value="lion">ライオン</option>
      <option value="sai">サイ</option>
      <option value="tora">トラ</option>
      <option value="usagi">ウサギ</option>
      <option value="panda">パンダ</option>
      <option value="saru">サル</option>
      <option value="pengin">ペンギン</option>
      <option value="hitsuji">ヒツジ</option>
      <option value="koara">コアラ</option>
      <option value="risu">リス</option>
     </select> -->
     <button class="button" id="register" type="submit" style="margin-top:10px;">Signup</button>
</form>
</div>

<script>
  $('#register').on('change', function () {
    var file = $(this).prop('files')[0];
    $('#filename').text(file.name);
});
</script>

</body>
</html>