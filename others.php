<?php

include 'lib/define.php';
include 'lib/funcs.php';

$thisProjectPath = thisProjectPath();

?>



<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Language" content="zh-tw">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/others.css">
    <?php
      echo '<title>照片小站-' . getNameById($_GET['id']) . '的頁面</title>'
    ?>
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
    <p class="hall">使用者大廳</p>
    <div class="users_edge">
      <?php
      foreach(getUserAll() as $users) {
        echo '<a href="home.php?id=' . $users['id'] . '">';
        echo '<div class="img_edge">';
        $imgPath = $thisProjectPath . '/upload/' . $users['id'] . '/mainPhoto.jpg';
        if (file_exists($imgPath)) {
          echo '<img src="upload/' . $users['id'] . '/mainPhoto.jpg" class="img">';
        } else {
          echo '<p class="nomain">尚無頭像</p>';
        }
        echo '<p class="name">' . $users['name'] . '</p>';
        echo '</div>';
        echo '</a>';
      }
      ?>
    </div>
    
  </body>  
</html>


