<?php

include 'lib/define.php';
include 'lib/funcs.php';

if (isset($_SESSION['user'])) {
} else {
  echo wrongInput('通訊錯誤', 'index.php');
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Language" content="zh-tw">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/logout.css">
    <title>照片小站-登出確認</title>
  </head>
  <body class="backgroundColor">
    <script src="js/logout.js"></script>
    <div class="header">
      <a href="home.php"><img src="img/home.jpg" class="home_pic"></a>
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
      <p class="confirm">確定登出？</p> 
      <a href="logout2.php" class="logout">登出</a>
      <a href="home.php" class="cancel">取消</a>
    </div> 
  </body>  
</html>


