<?php

include 'lib/define.php';
include 'lib/funcs.php';

if (!isset($_POST['account'], $_POST['password'])) {
  if (isset($_SESSION['user'])) {
    echo wrongInput('通訊錯誤', 'home.php?id=' . $_SESSION['user']['id']);
  }else {
    echo wrongInput('通訊錯誤', 'index.php');
  }
}

if (isset($_SESSION['user'])) {
  unset($_SESSION['user']);
}

$account  = trim($_POST['account']);
$password = trim($_POST['password']);

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
    <div class="header">
      <?php
        echo '<a href="home.php?id=' . $_SESSION['user']['id'] . '">';
        echo '<img src="img/home.jpg" class="home_pic"></a>';
      ?>
      <a href="logout.php" class="header_word">登出</a>
      <a href="others.php" class="header_word">看看其他人</a>
      <?php
      echo '<a href="home.php?id=' . $_SESSION['user']['id'] .'" class="header_word">我的首頁</a>'
      ?>
    </div> 
    <div class="notice_table">
      <div class="title_block">
        <img src="img/notice.jpg" class="notice">
      </div> 
      <p class="success">歡迎回來，親愛的<?php echo $_SESSION['user']['name'];?></p> 
      <?php
        echo '<a href="home.php?id=' . $_SESSION['user']['id'] . '" class="home">回我的首頁</a>';
      ?>
    </div> 
  </body>  
</html>


