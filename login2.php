<?php

include 'lib/define.php';
include 'lib/funcs.php';

if (!isset($_POST['account'], $_POST['password'])) {
  if (isset($_SESSION['user'])) {
    echo wrongInput('通訊錯誤', 'home.php');
  }else {
    echo wrongInput('通訊錯誤', 'index.php');
  }
}

if (isset($_SESSION['user'])) {
  unset($_SESSION['user']);
}

$account  = inputData($_POST['account']);
$password = inputData($_POST['password']);

if (login($account, $password)) {
  foreach (login($account, $password) as $user) {
    $_SESSION['user'] = [
      'id'       => $user['id'],
      'name'     => $user['name'],
      'account'  => $user['account'],
      'password' => $user['password']
    ];
  }
} else {
  echo wrongInput('帳號密碼有誤，請確認。', 'login.php');
}

?>





<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Language" content="zh-tw">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/login2.css">
    <title>照片小站-登入成功</title>
  </head>
  <body class="backgroundColor">
    <script src="js/login2.js"></script>
    <div class="header">
      <a href="home.php"><img src="img/home.jpg" class="home_pic"></a>
      <a href="logout.php" class="header_word" id="_logout" onmouseover="overHeader('_logout')" onmouseout="outHeader('_logout')">登出</a>
    </div> 
    <div class="notice_table">
      <div class="title_block">
        <img src="img/notice.jpg" class="notice">
      </div> 
      <p class="success">歡迎回來，親愛的<?php echo $_SESSION['user']['name'];?></p> 
      <a href="home.php" class="home" id="_home" onmouseover="overHome('_home')" onmouseout="outHome('_home')">回我的首頁</a>
    </div> 
  </body>  
</html>


